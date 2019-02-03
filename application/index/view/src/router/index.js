import Vue from 'vue'
import Router from 'vue-router'
import Main from '@/pages/Main'
import Index from '@/pages/index'
import ProductCenter from '@/pages/productCenter'
import EngineeringCase from '@/pages/engineeringCase'
import News from '@/pages/news'
import NewsDetails from '@/pages/newsDetails'
import Welfare from '@/pages/welfare'
import About from '@/pages/about'
import Purchase from '@/pages/purchase'
import ProductDetails from '@/pages/productDetails'


Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'home',
      component: Main,
      children: [
        {path: '/', title: '花盆网', name: 'index', component: Index},
        {path: 'productCenter', title: '产品中心', name: 'productCenter', component: ProductCenter},
        {path: 'engineeringCase', title: '工程案例', name: 'engineeringCase', component: EngineeringCase},
        {path: 'news', title: '新闻资讯', name: 'news', component: News,},
        {path: 'welfare', title: '公益在线', name: 'welfare', component: Welfare},
        {path: 'about', title: '关于我们', name: 'about', component: About},
        {path: 'purchase', title: '采购返红', name: 'purchase', component: Purchase},
		{path: 'newsDetails', title: '新闻资讯子页面', name: 'newsDetails', component: NewsDetails},
		{path: 'productDetails', title: '产品详情页面', name: 'productDetails', component: ProductDetails,}
      ]
    },
		
  ]
})
