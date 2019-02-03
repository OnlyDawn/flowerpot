import axios from 'axios';
import util from '@/assets/util';
let instance = null;
export const API = {
	Carousel: 'carousel/data', //轮播接口
	NewsList:'news/dataList',  //新闻列表
	Goods:'goods/DataList',    //产品列表
	SubNewsList:'news/NewsFind',  //新闻详情
	Case:'project_case/dataList',  //工程案例
	ProductType:'category/Data',    //产品类别
	GoodsFind:'goods/GoodsFind'    //产品详情
};
class DataService {
	async apiCall(api, method = 'GET', args = {}) {
		let url = 'http://www.huapen.com/api/' + api;
		return this.apiCallAxios(url, method, args);
		//return this.apiCallEx(url, args, method);
	}

	// call api with full url path
	async apiCallAxios(api, method = 'GET' ,args = {}) {
		// console.log('apiCall[' + api + '] with ' + JSON.stringify(args));
		// if (!args.api) {
		//   args.api = API_VERSION;
		// }
		let props = {
			url: api,
			method: method,
			headers: {
				Accept: 'application/json',
				'Content-Type': 'application/json',
			},
			data: args
		};
		// console.log(this.token, props.headers);
		return axios(props).then((response) => {
				if(response.status !== 200) {
					return null;
				}
				if(response.data.code && response.data.code === 401) {}
				return response.data;
			})
			.catch(error => console.log(error));
	}
}
instance = new DataService();
export default instance;