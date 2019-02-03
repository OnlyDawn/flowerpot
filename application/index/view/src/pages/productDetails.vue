<style lang="less">
.productDetails{
	.neicontent{
		width: 100%;
		padding-bottom: 4.5%;
		.wrap{
			max-width: 1200px;
			margin: 0 auto;
			width: 100%;
			.location{
				width: 100%;
				height: 80px;
				line-height: 80px;
				margin-top: 30px;
				font-size: 16px;
				color: #545454;
				overflow: hidden;
				border-bottom: 1px #B6B3B4 dashed;
				.local_fl{
					width: 330px;
					text-align: left;
					color: #168301;
					float: left;
					img{
						margin-top: 25px;
					}
				}
				.local_fr{
					width: 800px;
					text-align: right;
					float: right;
					img{
						margin-right: 7px;
						margin-bottom: -3px;
					}
					a{
						color: #545454;
					}
				}
			}
			.nei_con{
				width: 100%;
				overflow: hidden;
				color: #545454;
				h2{
					font-size: 36px;
					width: 100%;
					text-align: center;
					line-height: 300%;
					font-weight: normal;
					color: #333;
					border-bottom: 1px #B6B3B4 dashed;
				}
				.nei_con_txt{
					padding: 45px 0;
					font-size: 18px;
					color: #545454;
					line-height: 200%;
					p{
						img{
							margin: 0 auto;
							display: block;
						}
					}
				}				    
			}
		}
	}
}
@media (min-width:769px) and (max-width:1220px){
	.productDetails{
		.neicontent{
			padding: 0 20px 30px 20px;
			.wrap{
				.location{
					width: 100%;
					line-height: 80px;
					font-size: 16px;
					color: #545454;
					overflow: hidden;
					border-bottom: 1px #B6B3B4 dashed;
					.local_fl{
						width: 50%;
					}
					.local_fr{
						width:50%;
					}
				}
				.nei_con{
					h2{
						font-size: 24px;
						line-height: 300%;
					}
					.nei_con_txt{
						padding: 25px 0;
						p{
							img{
								width: 760px;
							}
						}
					}	
				}
			}
		}
	}
}
@media (max-width:768px){
	.productDetails{
		.neicontent{
			padding: 0 15px;
			.wrap{
				.nei_con{
					padding-top: 20px;
					h2{
						font-size: 24px;
						line-height: 300%;
					}
					.nei_con_txt{
						padding: 25px 0;
						p{
							img{
								width: 100%;
							}
						}
					}	
				}
			}
		}
	}
}
</style>
<template>
	<div class="productDetails">
		<div class="banner">
			<img src="../assets/img/bann_procon.jpg" />
		</div>
		<div class="neicontent">
		<!--内页开始-->
			<div class="wrap">
				<div class="location hidden-xs">
					<div class="local_fl">
						<p><img src="../assets/img/logo-new.png" width="266" height="30" alt="买花盆就上花盆网！" /></p>
					</div>
					<div class="local_fr">
						<p>
							<img src="../assets/img/location.jpg" alt="当前位置" />
							<span><router-link to="/">首页</router-link> » <a @click="goProduct(0)">产品中心</a> » <a>组合花箱</a></span>			
						</p>
					</div>
				</div>
				<div class="nei_con">
					<h2>{{goodsFind.name}}</h2>
					<div class="nei_con_txt">
						
						<!-- <p><img style="display: block; margin: 0 auto;" src="../assets/img/20180108084729_262.jpg" alt="" /></p>      -->
					</div>
				</div>
			</div>
		<!--内页结束-->  
		</div>

	</div>
</template>
<script>
import Dataservice from '@/assets/DataService.js';
import {API} from '@/assets/DataService.js';
export default {
	name: 'producDetails',
	data () {
		return {
			goodsFind:''
		}
	},
	methods:{
		async getGoodsFind (id) {  //获取商品详情
			let ret = await Dataservice.apiCall(API.GoodsFind+'?id='+id);
			if(ret.code==0){
				this.goodsFind=ret.data
				$(ret.data.content).appendTo($('.nei_con_txt'))
			}
		},
		goProduct(id){
			this.$router.push({
				name: 'productCenter',
				query:{
					id:id
				}
			});
		}
	},
	mounted(){
		this.getGoodsFind(this.$route.query.id)
	}
}
</script>