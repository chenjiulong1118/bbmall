<template>
	<div class="mine">
		<div class="user_header">
			<div class="wid1200">
				<span>用户管理系统</span>
				<router-link class="usernav"  to="/customerscore">会员管理</router-link>
				<router-link class="usernav"  to="/customer">营业统计</router-link>
				<router-link class="usernav"  to="/customer">订单管理</router-link>
			</div>
		</div>
		<router-view></router-view>		
	</div>
</template>

<script>
export default {
	name: 'user',
	data () {
		return {
		}
	},
	mounted(){
	}
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
	font-weight: normal;
}

ul {
	list-style-type: none;
	padding: 0;
}

li {
	display: inline-block;
	margin: 0 10px;
}

a {
	color: #333;
}
.wid1200 {
	width : 1200px;
	margin: 0 auto;
}
.user_header{
	height: 50px;
	background: #148cca;
	font-size: 18px;
	line-height: 50px;
	color: #ffffff;
}
.user_header h2{
	font-size:18px;
}
.usernav {
	float: right;
	font-size: 14px;
	cursor: pointer;
	padding: 0 15px;
	border-left: 1px solid #FFFFFF;
	color: #FFFFFF;
}
.usernav:hover{
	color: #148cca;
	background: #ffffff;
}
</style>