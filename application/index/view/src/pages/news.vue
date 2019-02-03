<style lang="less">
	@import "../assets/css/news.less";
</style>
<template>
	<div class="hello">
		<div class="banner">
			<img src="../assets/img/bann_newslist.jpg" alt="">
		</div>
		<div class="h_title t1" title="新闻资讯">
			<div class="img"><img src="../assets/img/news.png" alt="为您打造 精湛品质" /></div>
			<div class="txt">
				<p>NEWS INFORMATION</p>
			</div>
			<h4>新闻资讯</h4>
		</div>
		<div class="newslist_list">
			<ul>
				<li class="newslist_list_li clearfix" v-for="(i, idx) in newList" :key="idx">
					<div class="newslist_time">
						<p><span>{{setTime(i.ctime,1)}}</span><br>{{setTime(i.ctime,0)}}</p>
					</div>
					<a :title="i.title" @click="pageRoute(i)">
						<h1>{{i.title}}</h1>
						<p>{{newP(i)}}</p>
					</a>
				</li>
			</ul>
		</div>
		<!-- 分页器 -->
					<div class="page">
						<div class="pagination">
								<a title="首页":class="current_page==1?'active':''" @click="jump(1)">首页</a>
								<a title="上一页" :class="current_page==1?'active':''" @click="jump(current_page-1)">上一页</a>
								<a v-for="item in last_page" :title='item' :class="current_page==item?'active':''" @click="jump(item)">{{item}}</a>
								<a title="下一页" :class="current_page==last_page?'active':''" @click="jump(current_page+1)">下一页</a>
								<a title="尾页" :class="current_page==last_page?'active':''" @click="jump(last_page)">尾页</a>
						</div>
						<div v-for="(item,index) in current_page"></div>
					</div>
	</div>
</template>

<script>
	import util from '@/assets/util.js';
	import Dataservice from '@/assets/DataService.js';
	import {API} from '@/assets/DataService.js';
	export default {
		name: 'news',
		data() {
			return {
				page:1,
				newList:'',
				caseList:[],    //当前页面数据
				current_page:'',  //当前页数
				last_page:''   //总页数
			}
		},
		methods: {
			async getNews(page,pagenum){
				let ret = await Dataservice.apiCall(API.NewsList+'?page='+page+'&page_num='+pagenum)
				if(ret.code === 0){
					this.newList=ret.data.data
					this.last_page=ret.data.last_page
					this.current_page=ret.data.current_page
				}
			},
			jump(num){
				if(num==this.current_page || num>this.last_page){
						return false
				}else{
						this.getNews(num,6)
				}		
			},
			newP(i) {
				let dff = i.content.split('</p>')[0];
				let ccc = dff.substr(47);
				return ccc;
			},
			setTime(time,num){
				let date = util.formatDate(time*1000);
				if(num == 0){
					return date.substr(0,7);
				}else if(num == 1){
					return date.substr(date.length-1,1);
				}
			},
			pageRoute(i){
				this.$router.push({
					name: 'newsDetails',
					query:{
						id:i.id
					}
				});
			},
			init(){
				this.getNews(1,6);
			}
		},
		mounted(){
			this.init()
			
		}
	}
</script>