<style lang="less">
	@import "../assets/css/about.less";
	.about{
		a{
			background:#2f435e;
			color:#f2f2f2;
			padding: 10px 30px 10px 30px;
			font-size:16px;
			font-weight:bold;
			border-radius:3px;
			-webkit-transition:all linear 0.30s;
			-moz-transition:all linear 0.30s;
			transition:all linear 0.30s;
		}
		a:hover{
			background:#385f9e;
		}
		.xz{
			text-align: center;
			padding:20px 0;
		}
	}
</style>
<template>
	<div class="about">
		<div class="banner">
			<img src="../assets/img/purchase.jpg" alt="">
		</div>
		<div class="h_title t1" title="合约下载">
			<div class="img"><img src="../assets/img/purchase.png"  /></div>
			<div class="txt"><p>CONTRACT DOWNLOADING</p></div>
			<h4>合约下载</h4>
		</div>
		<div class="xz" style="padding-bottom: 200px;">
			<a href="购销合同.doc">购销合同</a>
			<a href="开票信息.doc">开票信息</a>
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
