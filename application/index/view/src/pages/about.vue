<style lang="less">
	@import "../assets/css/about.less";
</style>
<template>
	<div class="about">
		<div class="banner">
			<img src="../assets/img/bann_aboutlist.jpg" alt="">
		</div>
		<div class="h_title t1" title="关于我们">
			<div class="img"><img src="../assets/img/about.png" alt="为您打造 精湛品质" /></div>
			<div class="txt"><p>ABOUT US</p></div>
			<h4>关于我们</h4>
		</div>
		<div class="about_list clearfix">
				<div class="bglist-box">
					<div class="bglist">
						<h5>江苏春霖环境建设有限公司</h5>
						<p>开户银行：中国工商银行金坛经济开发区支行<br>银行账号：1105060409000507941</p>
					</div>
				</div>
				<div class="bglist-box">
					<div class="about_list_text">
						<p>江苏春霖环境建设有限公司，资深服务于国内外园林景观，专业生产高品质花箱、花盆、花钵。为城市街道、学校、公园、景区、商场等工程项目提供绿化解决方案。独具匠心的设计，严谨求精的制造、一丝不苟的施工，巧夺天工出一件件精妙绝伦的园艺艺术品。</p>
						<p>花、草、园林，一个个简单浪漫的灵感，在我们的手中经过漫长时间的设计、创造，从而诞生。我们始终致力于将工艺技术与大自然相结合，给客户呈现绿色、环保、科技完美融合一体的感受。各式花盆琳琅满目，各色花品争奇斗艳，新颖别致装点出清新素雅的出尘气质！</p>
					</div>
				</div>
		</div>
		<div class="about_list clearfix twoAbout">
				<div class="bglist-box">
					<div class="about_list_text">
						<p>花箱系列，来自森林的精选木材，刻画出浑然天成、天作之合的美好景象。</p>
						<p>花钵系列，花与钵相得益彰、自成一派，勾画的是一方花香鸟语、尽善尽美。</p>
						<p>城市绿化带上，春霖花箱点缀环境更低碳，更环保，更健康；公共场所中，春霖花钵彰显环境与众不同、高雅华贵；住宅小区里，春霖花盆赋予环境生态宜居、别具一格，褪去了城市钢筋水泥的冰冷，还您一个温馨的港湾。创建现代都市中的花园秘境，高楼大厦里的芬芳馥郁。
						春霖传承大家风范，引领环境建设行业风向标！以人为本，以诚为重，商通四海，德行天下。</p>
					</div>
				</div>
				<div class="bglist-box">
					<img src="../assets/img/aboutlist_02.jpg" alt="">
				</div>
		</div>
		<!-- 百度地图 -->
		<div class="aboutlist_con_map" >
		<div id="dituContent"></div>
		</div>
	</div>
</template>

<script>
	import BMap from 'BMap';
	function createInfoWindow(i) {
		let json = markerArr[i];
		let iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title +
			"</b><div class='iw_poi_content'>" + json.content + "</div>");
		return iw;
	}
	let markerArr = [{
		title: "江苏春霖环境建设有限公司",
		content: "电话：13862683311<br/>地址：金坛区华城商业广场",
		point: "119.597215|31.747822",
		isOpen: 1,
		icon: {
			w: 23,
			h: 25,
			l: 46,
			t: 21,
			x: 9,
			lb: 12
		}
	}]
	export default {
		name: 'about',
		data() {
			return {
				msg: 'about',
				//标注点数组
				markerArr: [{
					title: "江苏春霖环境建设有限公司",
					content: "电话：13862683311<br/>地址：金坛区华城商业广场",
					point: "119.597215|31.747822",
					isOpen: 1,
					icon: {
						w: 23,
						h: 25,
						l: 46,
						t: 21,
						x: 9,
						lb: 12
					}
				}]
			}
		},
		methods: {
			initMap() {
				this.createMap(); //创建地图
				this.setMapEvent(); //设置地图事件
				this.addMapControl(); //向地图添加控件
				this.addMarker(); //向地图中添加marker
			},
			//创建地图函数：
			createMap() {
				let map = new BMap.Map("dituContent"); //在百度地图容器中创建一个地图
				let point = new BMap.Point(119.597264, 31.748044); //定义一个中心点坐标
				map.centerAndZoom(point, 18); //设定地图的中心点和坐标并将地图显示在地图容器中
				window.map = map; //将map变量存储在全局
			},

			//地图事件设置函数：
			setMapEvent() {
				map.enableDragging(); //启用地图拖拽事件，默认启用(可不写)
				map.enableScrollWheelZoom(); //启用地图滚轮放大缩小
				map.enableDoubleClickZoom(); //启用鼠标双击放大，默认启用(可不写)
				map.enableKeyboard(); //启用键盘上下左右键移动地图
			},
			//地图控件添加函数：
			addMapControl() {},

			//创建marker
			addMarker() {
				for (let i = 0; i < this.markerArr.length; i++) {
					let json = this.markerArr[i];
					let p0 = json.point.split("|")[0];
					let p1 = json.point.split("|")[1];
					let point = new BMap.Point(p0, p1);
					let iconImg = this.createIcon(json.icon);
					let marker = new BMap.Marker(point, {
						icon: iconImg
					});
					let iw =createInfoWindow(i);
					let label = new BMap.Label(json.title, {
						"offset": new BMap.Size(json.icon.lb - json.icon.x + 10, -20)
					});
					marker.setLabel(label);
					map.addOverlay(marker);
					label.setStyle({
						borderColor: "#808080",
						color: "#333",
						cursor: "pointer"
					});
					(function() {
						let index = i;
						let _iw = createInfoWindow(i);
						let _marker = marker;
						_marker.addEventListener("click", function() {
							this.openInfoWindow(_iw);
						});
						_iw.addEventListener("open", function() {
							_marker.getLabel().hide();
						});
						_iw.addEventListener("close", function() {
							_marker.getLabel().show();
						})
						label.addEventListener("click", function() {
							_marker.openInfoWindow(_iw);
						})
						if (!!json.isOpen) {
							label.hide();
							_marker.openInfoWindow(_iw);
						}
					})();
				}
			},
			createInfoWindow(i) {
				let json = this.markerArr[i];
				let iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title +
					"</b><div class='iw_poi_content'>" + json.content + "</div>");
				return iw;
			},
			//创建一个Icon
			createIcon(json) {
				let icon = new BMap.Icon("http://map.baidu.com/image/us_mk_icon.png", new BMap.Size(json.w, json.h), {
					imageOffset: new BMap.Size(-json.l, -json.t),
					infoWindowOffset: new BMap.Size(json.lb + 5, 1),
					offset: new BMap.Size(json.x, json.h)
				})
				return icon;
			},
		},
		mounted() {
			this.initMap();
		}
	}
</script>
