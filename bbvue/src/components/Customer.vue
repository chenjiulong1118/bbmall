<template>
	<div class="user_main wid1200">
		<div class="user_nav">
			<ul>
				<li><router-link to="/customerscore">会员管理</router-link></li>
				<li><router-link to="/customeradd">会员注册</router-link></li>
				<li><router-link to="/customerlist">会员列表</router-link></li>
				
			</ul>
		</div>
		<router-view></router-view>
	</div>
</template>

<script>
export default {
	name: 'customer',
	data () {
		return {
			activeLi : ''
		}
	},
	methods: {
	    tabActiveLi: function (i) {
	    	this.activeLi = i;
	    }
	},
	mounted(){
		var sHref = window.location.href
		if(/customeradd/.test(sHref)){
			this.activeLi = "1";
		}else if(/customerlist/.test(sHref)){
			this.activeLi = "2";
		}else if(/customerscore/.test(sHref)){
			this.activeLi = "3";
		}else{
			this.activeLi = "2";
		}
	}
}
</script>
<style>
	.user_main{
		position:relative;
	}
	.user_nav{
		position:absolute;
		top:0;
		left:0;
		width: 135px;
	    font-size: 16px;
	    border-right:1px solid #e6e6e6;
	    min-height:500px;
	    color:#333;
	}
	.user_nav li{
		height: 54px;
	    line-height: 54px;
	    color: #333333;
	    cursor: pointer;
	    width: 100%;
	    text-align: center;
	}
	.user_nav li a{
		color:#333;
		width: 100%;
	    height: 100%;
	    display: inline-block;
	}
	.user_nav li .active{
		color:#148cca;
	}
</style>