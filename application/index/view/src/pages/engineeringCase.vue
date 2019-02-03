<style lang="less">
	@import "../assets/css/engineeringCase.less";
</style>
<template>
  <div class="enginerringCase">
    <div class="banner">
			<img src="../assets/img/bann_caselist.jpg" />
		</div>
		<div class="case">
			<div class="wrap">
					<div class="h_title t5" title="工程案例">
						<div class="img"><img src="../assets/img/case.png" alt="为您打造 精湛品质" /></div>
						<div class="txt"><p>CASES</p></div>
						<h4>工程案例</h4>
					</div>
					<div class="list">
							<ul class="clearfix">
								<li v-for="item in caseList" :title="item.title">
									<div class="img">
										<img v-lazy="item.image" />
										<p class="hidden-xs">{{item.title}}</p>
									</div>
									<p class="pp hidden-pc">{{item.title}}</p>
								</li>
							</ul>
					</div>
					<!-- 分页器 -->
					<div class="page">
						<div class="pagination">
								<a title="首页" :class="current_page==1?'active':''" @click="jump(1)">首页</a> 
								<a title="上一页" :class="current_page==1?'active':''" @click="jump(current_page-1)">上一页</a> 
								<a v-for="item in last_page" :title='item' :class="current_page==item?'active':''" @click="jump(item)">{{item}}</a>
								<a title="下一页" :class="current_page==last_page?'active':''" @click="jump(current_page+1)">下一页</a>
								<a title="尾页" :class="current_page==last_page?'active':''" @click="jump(last_page)">尾页</a>
						</div>
						<div v-for="(item,index) in current_page"></div>
					</div>

			</div>
		</div>
  </div>
</template>

<script>
import Dataservice from '@/assets/DataService.js';
import {API} from '@/assets/DataService.js';
export default {
  name: 'enginerringCase',
  data () {
    return {
      caseList:[],    //当前页面数据
			current_page:'',  //当前页数
			last_page:''   //总页数
    }
  },
	methods:{
		async getcase (page,pagenum) {//page当前页数，，pagenum每页显示数量
			let ret = await Dataservice.apiCall(API.Case+'?page='+page+'&page_num='+pagenum);
			if(ret.code==0){
				this.caseList=ret.data.data
				this.last_page=ret.data.last_page
				this.current_page=ret.data.current_page
			}
		},
		jump(num){
			if(num==this.current_page||num>this.last_page){
					return false
			}else{
					this.getcase(num,20)
			}		
		}
	},
	mounted(){
		this.getcase(1,20);
	}
}
</script>
