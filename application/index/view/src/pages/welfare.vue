<style lang="less">
	@import "../assets/css/about.less";
	.img_col3{
		margin: 20px;
	}
	.img_col3 .div_img{
		width: 33.333%;
		display: block;
		float: left;
		padding:0 20px;
	}
	.div_img img{
		width: 100%;
		border: 1px solid #ccc;
		border-radius: 4px;
	}
	@media(max-width:768px){
		.img_col3 .div_img{
			width: 100%;
			padding: 0;
			margin-bottom: 10px;
		}
	}
</style>
<template>
	<div class="about">
		<div class="banner">
			<img src="../assets/img/honor.jpg" alt="">
		</div>
		<div class="h_title t1" title="荣誉资质">
			<div class="img"><img src="../assets/img/welfare.png" alt="为您打造 精湛品质" /></div>
			<div class="txt"><p>HONOR</p></div>
			<h4>荣誉资质</h4>
		</div>
		<div class="img_col3 clearfix">
			<div class="div_img"><img src="../assets/img/honor_1.jpg" alt=""></div>
			<div class="div_img"><img src="../assets/img/honor_2.jpg" alt=""></div>
			<div class="div_img"><img src="../assets/img/honor_3.jpg" alt=""></div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'about',
		data() {
			return {
			}
		},
		methods: {
		},
		mounted() {
		}
	}
</script>
