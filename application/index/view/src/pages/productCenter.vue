<style lang="less">
	@import "../assets/css/productCenter.less";
</style>
<template>
  <div class="product">
			<div class="banner">
				<img src="../assets/img/bann_procon.jpg" />
			</div>
			<div class="product_inner">
				<div class="wrap">
						<div class="h_title t5" title="产品中心">
							<div class="img"><img src="../assets/img/product.png" alt="为您打造 精湛品质" /></div>
							<div class="txt"><p>PRODUCTS</p></div>
							<h4>产品中心</h4>
						</div>
						<div class="pro_type clearfix">
							<a v-for="item in productType" :key='item.id' :class="{active:item.id==active}" @click="classify(item.id)" :title="item.name">{{item.name}}</a>
						</div>
						<div class="list">
							<ul class="clearfix">
								<li v-for="item in productList" @click="layerShow(item.id)" :title="item.name">
									<div><img v-lazy="item.image" /></div>
									<p class="pp">{{item.name}}</p>
									<span><div><a @click="details(item.id)">查看详情</a><a href="http://wpa.qq.com/msgrd?v=3&uin=3026738283&site=qq&menu=yes" target="_blank">咨询客服</a></div></span>
								</li> 
							</ul>
						</div>
				</div>
			</div>
			<div class="zzc hidden-pc" v-if="zzcShow" @click="layerHide"></div><!--遮罩层-->
			<div class="propup hidden-pc">
					<ul class="clearfix">
						<li @click="details(detailsId)">查看详情</li>
						<li @click="goConsult">咨询客服</li>
					</ul>
			</div>
  </div>
</template>

<script>
import Dataservice from '@/assets/DataService.js';
import {API} from '@/assets/DataService.js';
export default {
  name: 'product',
  data () {
    return {
			productType:[],   //所有商品类型
      productList:[],  //所有商品数据
			active:'',
			zzcShow:false,
			detailsId:''
    }
  },
	methods:{
		async getProductType () {  //获取商品类型
			let ret = await Dataservice.apiCall(API.ProductType);
			if(ret.code==0){
					this.productType=ret.data
			}
		},
		async getGoods () {  //获取商品数据
			let ret = await Dataservice.apiCall(API.Goods+'?page=1&page_num=1000');
			if(ret.code==0){
					this.productList=ret.data.data
			}
		},
		async getGoodsType (id) {  //获取商品分类数据
			this.productList=[];
			let ret = await Dataservice.apiCall(API.Goods+'?page=1&page_num=1000&category_id='+id);
			if(ret.code==0){
					this.productList=ret.data.data
			}
		},
		classify(type){   //产品分类
			this.$router.push({
				name: 'productCenter',
				query:{
					id:type
				}
			});
		},
		details(id){   //跳转产品详情
			this.$router.push({
				name: 'productDetails',
				query:{
					id:id
				}
			});
		},
		layerShow(id){
			this.detailsId=id;
			this.zzcShow=true;
			$(".propup").animate({bottom:"-2px"},300)
		},
		layerHide(){
			this.zzcShow=false;
			$(".propup").animate({bottom:"-141px"},300)
		},
		goConsult(){
			this.layerHide();
			window.open("http://wpa.qq.com/msgrd?v=3&uin=3026738283&site=qq&menu=yes")
		}
	},
	watch:{
		'$route'(to){
			let toId=to.query.id
			if(toId==0){
				this.active='';
				this.getGoods()
			}else{
				this.active=toId
				this.getGoodsType(toId)
			}
		}
	},
	mounted(){
		this.getProductType()
		if(this.$route.query.id!=0){
			this.active=this.$route.query.id
			this.getGoodsType(this.$route.query.id)
		}else{
			this.getProductType();
			this.getGoods()
		}
	}
}
</script>
