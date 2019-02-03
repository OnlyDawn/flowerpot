<style lang="less">
	@import "../assets/css/news.less";
	.location{
		max-width: 1200px;margin: 30px auto 0 auto;
		width: calc(~"100% - 60px");
		height: 80px;
		line-height: 80px;
		font-size: 16px;
		color: #545454;
		overflow: hidden;
		border-bottom: 1px #B6B3B4 dashed;
		.local_fr {
			text-align: right;
		}
		.fr {
			float: right;
			img{
				margin-bottom: -2px;
			}
			a{
				color: #545454;
			}
		}
		.fl {
			float: left;
			text-align: left;
			color: #168301;
		}
	}
	.title{
		max-width: 1260px;margin: 0 auto;
		h2{
			font-size: 36px;
			width: 100%;
			text-align: center;
			line-height: 300%;
			font-weight: normal;
			color: #333;
		}
		.small_t02 {
			width: calc(~"100% - 60px");
			margin:0 30px;
			text-align: center;
			font-size: 16px;
			line-height: 100%;
			margin-top: -10px;
			padding-bottom: 33px;
			border-bottom: 1px #B6B3B4 dashed;
			span{
				margin: 0 20px;
				color: #545454;
			}
		}
	}
	#content{
		max-width: 1200px;margin: 0 auto;
		// margin:0 20px;
		.nei_con_txt {
			padding: 45px 0;
			font-size: 18px;
			color: #545454;
			line-height: 200%;
			p{
				text-indent: 36px;
				img{
					display: block;
					width: 100%;
					max-width: 600px;
					margin: 0 auto;
				}
			}
		}
	}
	@media (max-width:768px){
		.location{
			width: calc(~"100% - 40px");
			height: 50px;
			line-height: 50px;
			margin: 10px 20px 0 20px;
			font-size: 12px;
			color: #545454;
			overflow: hidden;
			border-bottom: 1px #B6B3B4 dashed;
			.fr {
				img{
					width: 16px;
					margin-bottom: -1px;
				}
			}
		}
		.title{
			h2{
				font-size:20px;
			}
			.small_t02 {
				width: calc(~"100% - 40px");
				margin:0 20px;
				font-size: 12px;
				line-height: 100%;
				margin-top: -10px;
				padding-bottom: 13px;
				span{
					margin: 0 6px;
				}
			}
		}
		#content{
			margin:0 20px;
			.nei_con_txt {
				padding: 10px 0;
				font-size: 14px;
				color: #545454;
				p{
					text-indent: 28px;
					img{
						display: block;
						width: 100%;
						max-width: 600px;
						margin: 0 auto;
					}
				}
			}
		}
	}
</style>
<template>
	<div class="hello">
		<div class="banner">
			<img src="../assets/img/bann_newslist.jpg" alt="">
		</div>
		<div class="location" >
			<div class="local_fl fl">
				<p>{{newListData.title}}</p>
			</div>
			<div class="local_fr fr">
				<p>
					<img src="../assets/img/location.jpg" alt="当前位置">
					<router-link to="/">首页</router-link>» <router-link to="/news">新闻资讯</router-link>
				</p>
			</div>
		</div>
		<div class="title" >
			<h2>{{newListData.title}}</h2>
			<p class="small_t02"><span>发布时间：{{setTime}}</span><span>作者：{{newListData.author}}</span></p>
		</div>
		<div id='content' >

		</div>
	</div>
</template>

<script>
	import util from '@/assets/util.js';
	import Dataservice from '@/assets/DataService.js';
	import {
		API
	} from '@/assets/DataService.js';
	export default {
		name: 'newsList',
		data() {
			return {
				newListData:'',
			}
		},
		methods: {
			async getNews(){
				let ret = await Dataservice.apiCall(API.SubNewsList+'?id='+this.$route.query.id)
				if(ret.code === 0){
					this.newListData = ret.data;
					$(ret.data.content).appendTo($('#content'))
				}
			},
			init(){
				this.getNews();
			},
		},
		mounted() {
			this.init()
		},
		computed: {
			setTime() {
				return util.formatDate(this.newListData.ctime*1000);
			}
		},
	}
</script>
