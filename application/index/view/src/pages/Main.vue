<style lang="less">
	@import "../assets/css/base.css";
	@import "../assets/css/Main.less";
</style>
<template>
  <div class="Main" id="Main" @click="show_small_nav=false">
	<h1 style="text-indent: 10000px;height: 0;width: 0;overflow: hidden;"><img src="../assets/img/logo.png" title='花箱,花钵,花器 - 买花盆就上花盆网' alt="花箱,花钵,花器 - 买花盆就上花盆网"></h1>
		<header class="hidden-xs">
			<ul class="clearfix">
				<!-- <li><router-link to="/">花盆网</router-link></li> -->
				<li @mouseover="subnav= true" @mouseout="subnav = false">
					<a @click="goProduct(0)" title='产品中心'>产品中心</a>
					<transition name="fade">
					<ul class="clearfix" v-show="subnav">
							<li v-for="item in productType" :key="item.id" @click="goProduct(item.id)"><a :title="item.name">{{item.name}}</a></li>
					</ul>
					</transition>
				</li>
				<li><router-link to="/engineeringCase"title='工程案例'>工程案例</router-link></li>
				<li><router-link to="/news"title='新闻资讯'>新闻资讯</router-link></li>
				<li class="logoa"><router-link to="/" title='首页'><img src="../assets/img/logo.png" width="65" height="102" /></router-link></li>
				
				<li><router-link to="/welfare" title='荣誉资质'>荣誉资质</router-link></li>
				<li><router-link to="/about" title='关于我们'>关于我们</router-link></li>
				<li><router-link to="/purchase" title='合约下载'>合约下载</router-link></li>
			</ul>			
		</header>
		<div class="min_header hidden-pc clearfix">
			<div class="logob">
				<router-link to="/">
					<img src="../assets/img/small_logo.png" alt="花盆网" title='花盆网'/>		
				</router-link>
			</div>			
			<div class="btn" @click="minheaderBlock"></div>
				<ul class="clearfix minHeadUl">
					<!-- <li><router-link to="/">花盆网</router-link></li> -->
					<li><a @click="goProduct(0)" title='产品中心'>产品中心</a></li>
					<li><router-link to="/engineeringCase" title='工程案例'>工程案例</router-link></li>
					<li><router-link to="/news" title='新闻资讯'>新闻资讯</router-link></li>
					<li><router-link to="/welfare" title='荣誉资质'>荣誉资质</router-link></li>
					<li><router-link to="/about" title='关于我们'>关于我们</router-link></li>
					<li><router-link to="/purchase" title='合约下载'>合约下载</router-link></li>
				</ul>
		</div>
    <div @click="clickAnimate">
			<router-view/>
			<footer>
				<div class="w1200 content">
						<h2><img src="../assets/img/logo.png" alt="花盆网" /></h2>
						<hr class="footer_hr" />
						<div class="footer_a">
								<!-- <router-link to="/">花盆网</router-link> -->
								<a @click="goProduct(0)" title='产品中心' style="cursor: pointer;">产品中心</a>
								<router-link to="/engineeringCase" title='工程案例'>工程案例</router-link>
								<router-link to="/news" title='新闻资讯'>新闻资讯</router-link>
								<router-link to="/welfare" title='荣誉资质'>荣誉资质</router-link>
								<router-link to="/about" title='关于我们'>关于我们</router-link>
								<router-link to="/purchase" title='合约下载'>合约下载</router-link>
						</div>
						<div class="footer_p" title='公司信息'>
								<span>公司地址：金坛区华城商业广场</span>
								<span>联系电话：0519-82825252</span>
								<span>技术支持：常州弥漫网络服务有限公司</span>
						</div>
				</div>
			</footer>
		</div>
		<ul class="suspension">
			<li class="suspension-tel" @mouseover="popDetail = true" @mouseout="popDetail = false">
				<transition name="fade">
				<div class="pop-detail" v-show="popDetail">
					<ul>
						<li>
							<a class="service-phone">
								<span class="info-name">客服热线</span>
								<span class="info-value">051982825252</span>
							</a>
						</li>
						<li>
							<a class="service-online" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=3026738283&site=qq&menu=yes">
								<span class="info-name">在线客服</span>
								<span class="info-value">3026738283</span>
							</a>
						</li>
					</ul>
				</div>
				</transition>
			</li>
			<li class="default-transition ewm" title="微信二维码" @mouseover="ewm = true" @mouseout="ewm = false">
				<transition name="fade">
					<div class="qrcode pop-detail" v-show="ewm">微信二维码</div>
				</transition>
			</li>
			<transition name="fade">
			<li class="default-transition" v-show="toTop">
				<span class="to-top" title="返回顶部" @click="top"></span>
			</li>
			</transition>
		</ul>
  </div>
</template>
<script>
import util from '@/assets/util.js';
import Dataservice from '@/assets/DataService.js';
import {API} from '@/assets/DataService.js';
export default {
  name: 'Main',
  data () {
    return {
			popDetail:false,
			subnav:false,
			ewm:false,
			toTop:false,
			a_idx:0,
			num:0,
			productType:'',
    }
  },
  methods:{
		clickAnimate(e){
			var a = new Array("富强", "民主", "文明", "和谐", "自由", "平等", "公正" ,"法治", "爱国", "敬业", "诚信", "友善");  
				var $i = $("<span/>").text(a[this.a_idx]);  
				this.a_idx = (this.a_idx + 1) % a.length;  
				var x = e.pageX,  
				y = e.pageY;  
				$i.css({  
						"z-index": 9999,  
						"top": y - 20,  
						"left": x,  
						"position": "absolute",  
						"font-weight": "bold",  
						"color": "#ff6651" ,
						 "font-size":"12px",
						 "-webkit-user-select":"none",
						 "-moz-user-select":"none",
						 "-ms-user-select":"none",
						 "user-select":"none",
				});  
				$("body").append($i);  
				$i.animate({  
						"top": y - 180,  
						"opacity": 0  
				},  
				1500,  
				function() {  
						$i.remove();  
				});  
		},
		handleScroll() {
				var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
				this.toTop = scrollTop> 300 ? true : false;
		},
		top(){
			$('html , body').animate({scrollTop: 0},'slow');
		},
		freeTel(){
			var _hmt = _hmt || [];
			var hm = document.createElement("script");
			hm.src = "https://hm.baidu.com/hm.js?a6d609eb8fcb89ee7204b235ccce98e2";
			var s = document.getElementsByTagName("script")[0]; 
			s.parentNode.insertBefore(hm, s);
		},
		minheaderBlock(){
			$('.minHeadUl').slideToggle(300);
			this.num++;
			if(this.num % 2 == 1){
				$('.min_header').addClass('bgcolor')
				document.body.style.overflow='hidden';        
				document.addEventListener("touchmove",(e)=>{e.preventDefault()},false);
			}else{
				setTimeout(()=>{
					$('.min_header').removeClass('bgcolor')
					},300)
				document.body.style.overflow='';
				document.removeEventListener("touchmove",(e)=>{e.preventDefault()},false); 
			}
		},
		mo(e){
			e.preventDefault();
		},
		async getProductType () {  //获取商品类型
			let ret = await Dataservice.apiCall(API.ProductType);
			if(ret.code==0){
					this.productType=ret.data
			}
		},
		goProduct(id){
			this.$router.push({
				name: 'productCenter',
				query:{
					id:id
				}
			});
		},
		init(){
			window.addEventListener('scroll', this.handleScroll, true)
			$('.minHeadUl li').click(()=>{
				$('.minHeadUl').slideUp(300);
				this.num++;
				document.body.style.overflow='';
				// document.removeEventListener("touchmove",(e)=>{e.preventDefault()},false);        
			})
		}
  },
	mounted(){
		this.freeTel()
		this.init();
		this.getProductType();
	}
}
</script>

