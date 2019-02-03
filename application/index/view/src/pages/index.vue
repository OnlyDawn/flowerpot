<style lang="less">
	@import "../assets/css/index.less";
	@import "../assets/css/logo.css";
</style>
<template>
	<div class="index">
		<!--  swiperbanner图 -->
		<swiper :options="pcswiperOption" class='hidden-xs'>
			<swiper-slide v-for="(slide, index) in pcSwiperSlides" :key="index">
				<img :src="slide" />
			</swiper-slide>
			<div class="swiper-pagination" slot="pagination"></div>
		</swiper>
		<swiper :options="appswiperOption" class='hidden-pc'>
			<swiper-slide v-for="(slide, index) in appSwiperSlides" :key="index">
				<img v-lazy="slide" style="height: 100vh;" />
			</swiper-slide>
			<div class="swiper-pagination" slot="pagination"></div>
		</swiper>
		<div class="indexcontent">
			<!--第一部分 为您打造 精湛品质 -->
			<div class="quality_type">
				<div class="wrap">
					<div class="h_title t1" title="为您打造 精湛品质">
						<div class="img"><img src="../assets/img/index_02_img01.png" alt="为您打造 精湛品质" /></div>
						<div class="txt">
							<p>The exquisite quality for you</p>
						</div>
						<h4>为您打造 精湛品质</h4>
					</div>
					<div class="list">
						<ul class="clearfix">
							<li title="组合花箱">
								<div class="bg_wrap">
									<div>
										<p>组合花箱</p>
										<h3>自然&nbsp;&nbsp;环保&nbsp;&nbsp;安全</h3>
										<p>防腐、防蛀、防裂、防潮、防霉、<br />防菌等</p>
									</div>
								</div>
							</li>
							<li title="PVC微发泡花箱">
								<div class="bg_wrap">
									<div>
										<p>PVC微发泡花箱</p>
										<h3>可塑性强&nbsp;&nbsp;耐酸碱</h3>
										<p>防水、防火、低碳、环保、保温、<br />质轻等</p>
									</div>
								</div>
							</li>
							<li title="不锈钢花箱">
								<div class="bg_wrap">
									<div>
										<p>不锈钢花箱</p>
										<h3>精致美观&nbsp;&nbsp;时尚大气</h3>
										<p>经久、坚固、减震、隔音、阻燃、<br />抗蚀等</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- 第二部分 我们最引以为豪的，是一直以来的"专注" -->
			<div class="programme">
				<div class="wrap">
					<div class="h_title t2">
						<h4>我们最引以为豪的，是一直以来的"专注"</h4>
						<div class="txt">
							<p>WE ARE MOST PROUD OF,IT IS HAS BEEN "FOCUS"</p>
						</div>
					</div>
					<div class="list">
						<ul class="clearfix">
							<li title="组合花箱解决方案">
								<div class="img"><img src="../assets/img/index_03_img01.jpg" /></div>
								<div class="txt">
									<h4>组合花箱解决方案</h4>
									<hr class="hrline" />
									<p>组合方式灵活多样，立体层次感强，适用于城市街道、学校、公园、景区、商场等</p>
								</div>
							</li>
							<li title="PVC微发泡花箱解决方案">
								<div class="img"><img src="../assets/img/index_03_img02.jpg" /></div>
								<div class="txt">
									<h4>PVC微发泡花箱解决方案</h4>
									<hr class="hrline" />
									<p>微发泡注塑一次成型，采用高分子材料合成，外观新颖不褪色，路桥绿化工程首选</p>
								</div>
							<li title="不锈钢花箱解决方案">
								<div class="img"><img src="../assets/img/index_03_img03.jpg" /></div>
								<div class="txt">
									<h4>不锈钢花箱解决方案</h4>
									<hr class="hrline" />
									<p>一般采用201或304不锈钢，表面可做拉丝处理，厚度按需求定制，造型雅观别致</p>
								</div>
							</li>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- 第三部分 专业提供优质产品 -->
			<div class="products">
				<div class="wrap">
					<div class="h_title t3" title="专业提供优质产品">
						<h4>专业提供优质产品</h4>
						<div class="txt">
							<p>PROFESSIONAL TO PROVIDE QUALITY PRODUCTS</p>
						</div>
					</div>
					<div class="list">
						<ul>
							<!--组合花箱-->
							<li @click="goProduct(11)" title="组合花箱" style="opacity: 0.6;">
								<div><img src="../assets/img/20180108084713_874.jpg" width="288" height="202" /></div>
								<p class="pp">Z000有容乃大</p>
								<!--上面的div与p是为了撑起盒子大小-->
								<div class="overburden">
									<p><a href="" title="查看更多">更多<br />组合花箱</a></p>
								</div>
							</li>
							<li v-for="item in productList1.slice(0,7)" @click="layerShow(item.id)" :title="item.name">
								<div><img v-lazy="item.image" width="288" height="202" /></div>
								<p class="pp">{{item.name}}</p>
								<span>
									<div><a @click="details(item.id)">查看详情</a><a href="http://wpa.qq.com/msgrd?v=3&uin=3026738283&site=qq&menu=yes"
										 target="_blank">咨询客服</a></div>
								</span>
							</li>
						</ul>
						<ul>
							<!--防锈木花箱-->
							<li @click="goProduct(9)" title="防锈木花箱" style="opacity: 0.6;">
								<div><img src="../assets/img/20180108084713_874.jpg" width="288" height="202" /></div>
								<p class="pp">Z000有容乃大</p>
								<div class="overburden">
									<p><a href="" title="查看更多">更多<br />防锈木花箱</a></p>
								</div>
							</li>
							<li v-for="item in productList2.slice(0,7)" @click="layerShow(item.id)" :title="item.name">
								<div><img v-lazy="item.image" width="288" height="202" /></div>
								<p class="pp">{{item.name}}</p>
								<span>
									<div><a @click="details(item.id)">查看详情</a><a href="http://wpa.qq.com/msgrd?v=3&uin=3026738283&site=qq&menu=yes"
										 target="_blank">咨询客服</a></div>
								</span>
							</li>
						</ul>
						<ul>
							<!--不锈钢花箱-->
							<li @click="goProduct(10)" title="不锈钢花箱" style="opacity: 0.6;">
								<div><img src="../assets/img/20180108084713_874.jpg" width="288" height="202" /></div>
								<p class="pp">Z000有容乃大</p>
								<div class="overburden">
									<p><a href="" title="查看更多">更多<br />不锈钢花箱</a></p>
								</div>
							</li>
							<li v-for="item in productList3.slice(0,7)" @click="layerShow(item.id)" :title="item.name">
								<div><img v-lazy="item.image" width="288" height="202" /></div>
								<p class="pp">{{item.name}}</p>
								<span>
									<div><a @click="details(item.id)">查看详情</a><a href="http://wpa.qq.com/msgrd?v=3&uin=3026738283&site=qq&menu=yes"
										 target="_blank">咨询客服</a></div>
								</span>
							</li>
						</ul>
					</div>
					<!-- <div class="more"><a @click="goProduct(0)">查看全部</a></div> -->
					<div class="products_big_img"><img src="../assets/img/index_05.jpg" title="花箱" alt="花箱" /></div>
				</div>
			</div>
			<!-- 第四部分 新闻中心 -->
			<div class="news">
				<div class="wrap">
					<div class="h_title t4">
						<h4>新闻中心</h4>
						<div class="txt">
							<p>NEWS INFORMATION</p>
						</div>
					</div>
					<div class="list">
						<ul class="clearfix">
							<li v-for="item in newsList">
								<a @click="pageRoute(item)" :title="item.title">
									<dt>
										<p class="fl">{{item.title}}</p>
										<p class="fr">{{setTime(item.ctime)}}</p>
									</dt>
									<dd>{{newP(item.content)}}</dd>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="partner">
				<div class="wrapper">
					<div class="h_title t1" style="max-width: 250px;">
						<h4>合作伙伴</h4>
						<div class="txt">
							<p>COOPERATIVE PARTNER</p>
						</div>
					</div>
					<ul class="hidden-pc sss">
						<li>
							<img src='../assets/img/p1.png' />
						</li>
						<li>
							<img src='../assets/img/p2.png' />
						</li>
						<li>
							<img src='../assets/img/p3.png' />
						</li>
						<li>
							<img src='../assets/img/p4.png' />
						</li>
						<li>
							<img src='../assets/img/p5.png' />
						</li>
						<li>
							<img src='../assets/img/p6.png' />
						</li>
						<li>
							<img src='../assets/img/p7.png' />
						</li>
						<li>
							<img src='../assets/img/p8.png' />
						</li>
					</ul>

					<ul class="hidden-xs bbb">
						<li class="partner_li">
							<div class='picBox'>
								<div class='show'>
									<img src='../assets/img/p1.png' />
								</div>
								<div class='hide'>
								</div>
							</div>
						</li>
						<li>
							<div class='picBox'>
								<div class='show'>
									<img src='../assets/img/p2.png' />
								</div>
								<div class='hide'>
								</div>
							</div>
						</li>
						<li>
							<div class='picBox'>
								<div class='show'>
									<img src='../assets/img/p3.png' />
								</div>
								<div class='hide'>
								</div>
							</div>
						</li>
						<li>
							<div class='picBox'>
								<div class='show'>
									<img src='../assets/img/p4.png' />
								</div>
								<div class='hide'>
								</div>
							</div>
						</li>
						<li>
							<div class='picBox'>
								<div class='show'>
									<img src='../assets/img/p5.png' />
								</div>
								<div class='hide'>
								</div>
							</div>
						</li>
						<li>
							<div class='picBox'>
								<div class='show'>
									<img src='../assets/img/p6.png' />
								</div>
								<div class='hide'>
									
								</div>
							</div>
						</li>
						<li>
							<div class='picBox'>
								<div class='show'>
									<img src='../assets/img/p7.png' />
								</div>
								<div class='hide'>
									
								</div>
							</div>
						</li>
						<li>
							<div class='picBox'>
								<div class='show'>
									<img src='../assets/img/p8.png' />
								</div>
								<div class='hide'>
									
								</div>
							</div>
						</li>
					</ul>

				</div>
			</div>
		</div>
		<div class="zzc hidden-pc" v-if="zzcShow" @click="layerHide"></div>
		<!--遮罩层-->
		<div class="propup hidden-pc">
			<ul class="clearfix">
				<li @click="details(productDetailsId)">查看详情</li>
				<li @click="goConsult">咨询客服</li>
			</ul>
		</div>
	</div>
</template>

<script>
	import util from '@/assets/util.js';
	import Dataservice from '@/assets/DataService.js';
	import {
		API
	} from '@/assets/DataService.js';
	import {
		swiper,
		swiperSlide
	} from 'vue-awesome-swiper'
	export default {
		name: 'index',
		data() {
			return {
				pcswiperOption: {
					loop: false, //是否循环
					autoplay: true,
					effect: 'fade',
					setWrapperSize: true,
					pagination: {
						el: '.swiper-pagination',
						clickable: true
					}
				},
				appswiperOption: {
					loop: true, //是否循环
					autoplay: true,
					setWrapperSize: true,
					pagination: {
						el: '.swiper-pagination',
						clickable: true
					}
				},
				pcSwiperSlides: [],
				appSwiperSlides: [],
				productList1: [], //组合花箱
				productList2: [], //防锈木花箱
				productList3: [], //不锈钢花箱
				newsList: [],
				zzcShow: false,
				productDetailsId: ''
			}
		},
		components: {
			swiper,
			swiperSlide
		},
		methods: {
			async getbannerweb() {
				let ret = await Dataservice.apiCall(API.Carousel + '?type=web');
				if (ret.code == 0) {
					for (let i in ret.data) {
						this.pcSwiperSlides.push(ret.data[i].image)
					}
				}
			},
			async getbannerapp() {
				let ret = await Dataservice.apiCall(API.Carousel + '?type=app');
				if (ret.code == 0) {
					for (let i in ret.data) {
						this.appSwiperSlides.push(ret.data[i].image)
					}
				}
			},
			async getNews(page, pagenum) { //获取新闻数据
				let ret = await Dataservice.apiCall(API.NewsList + '?page=' + page + '&page_num=' + pagenum)
				if (ret.code === 0) {
					this.newsList = ret.data.data
				}
			},
			async getGoodsType(id) { //获取商品分类数据
				let ret = await Dataservice.apiCall(API.Goods + '?page=1&page_num=1000&category_id=' + id);
				if (ret.code == 0) {
					if (id == 9) { //防锈木花箱数据
						this.productList2 = ret.data.data
					} else if (id == 10) { //不锈钢花箱数据
						this.productList3 = ret.data.data
					} else if (id == 11) { //组合花箱数据
						this.productList1 = ret.data.data
					}
				}
			},
			newP(i) {
				let dff = i.split('</p>')[0];
				let ccc = dff.substr(47);
				return ccc;
			},
			setTime(time, num) {
				let date = util.formatDate(time * 1000);
				return date;
			},
			details(id) { //跳转产品详情
				this.$router.push({
					name: 'productDetails',
					query: {
						id: id
					}
				});
			},
			goProduct(id) { //跳转产品分类
				this.$router.push({
					name: 'productCenter',
					query: {
						id: id
					}
				});
			},
			pageRoute(i) { //跳转新闻详情
				this.$router.push({
					name: 'newsDetails',
					query: {
						id: i.id
					}
				});
			},
			layerShow(id) {
				this.productDetailsId = id;
				this.zzcShow = true;
				$(".propup").animate({
					bottom: "-2px"
				}, 300)
			},
			layerHide() {
				this.zzcShow = false;
				$(".propup").animate({
					bottom: "-141px"
				}, 300)
			},
			goConsult() {
				this.layerHide();
				window.open("http://wpa.qq.com/msgrd?v=3&uin=3026738283&site=qq&menu=yes")
			}
		},
		mounted() {
			this.getbannerweb();
			this.getbannerapp();
			this.getNews(1, 6);
			this.getGoodsType(9)
			this.getGoodsType(10)
			this.getGoodsType(11)
		}
	}
</script>
