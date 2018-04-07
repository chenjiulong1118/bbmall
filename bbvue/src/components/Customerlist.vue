<template>
	<div class="user_cusomer_main">
		<table border="0" cellpadding=0 cellspacing=0> 
			<tr class="user_customer_tr">
				<td class="user_customer_title_td1">序号</td>
				<td class="user_customer_title_td1">姓名</td>
				<td class="user_customer_title_td1">手机号</td>
				<td class="user_customer_title_td1">性别</td>
				<td class="user_customer_title_td1">宝宝生日</td>
				<td class="user_customer_title_td1">宝宝性别</td>
				<td class="user_customer_title_td1">积分</td>
				<td class="user_customer_title_td1">详细地址</td>
				<td class="user_customer_title_td1">操作</td>
			</tr>
			<tr v-for="(customer, key) in customerList">
				<td>{{key+1}}</td>
				<td :title="customer.name">{{customer.name}}</td>
				<td :title="customer.mobilephone">{{customer.mobilephone}}</td>
				<td :title="customer.sex">{{customer.sex}}</td>
				<td :title="customer.babybirthday">{{customer.babybirthday}}</td>
				<td :title="customer.babysex">{{customer.babysex}}</td>
				<td :title="customer.score">{{customer.score}}</td>
				<td :title="customer.address">{{customer.address}}</td>
				<td><span class="btn" @click="delectCustomer(customer.id)">删除</span><span class="btn" @click="fnShowCustomer(customer)">修改</span></td>
			</tr>
		</table>
		<div class="updatacustomer" v-show="isUpdata">
			<div class="updatacustomer_main">
				<h3>用户信息更新</h3>
				<span class="updataclose" @click="fnUpdataClose()">&times;</span>
				<div class="updatacustomer_group">
					<span>用户姓名：</span><input type="text" v-model="upDataCustomer.name"/>
				</div>
				<div class="updatacustomer_group">
					<span>用户性别：</span>男<input type="radio" name="sex" value="男" v-model="upDataCustomer.sex"/>女<input type="radio" name="sex" value="女" v-model="upDataCustomer.sex"/>
				</div>
				<div class="updatacustomer_group">
					<span>手机号码：</span><input type="text" v-model="upDataCustomer.mobilephone"/>
				</div>
				<div class="updatacustomer_group">
					<span>宝宝生日：</span><input type="date" v-model="upDataCustomer.babybirthday"/>
				</div>
				<div class="updatacustomer_group">
					<span>宝宝性别：</span>男<input type="radio" name="babysex" value="男" v-model="upDataCustomer.babysex"/>女<input type="radio" name="babysex" value="女" v-model="upDataCustomer.babysex"/>
				</div>
				<div class="updatacustomer_group">
					<span>会员积分：</span><input type="text" v-model="upDataCustomer.score"/>
				</div>
				<div class="updatacustomer_group">
					<span>详细地址：</span><input type="text" v-model="upDataCustomer.address"/>
				</div>
				<input type="button" @click="fnUpdataCustomer()" class="updatacustomerbtn" value="更新" />
			</div>
			
		</div>
	</div>
</template>

<script>
export default {
	name: 'customerlist',
	data () {
		return {
			customerList:[],
			upDataCustomer:{},
			isUpdata:false
		}
	},
	methods: {
		delectCustomer : function(dataId){
				if(confirm("您确定要删除会员信息？")){
					this.$http.get(window.APIURL+'/controller/delCustomer.php?id='+dataId+'&v='+Math.random()).then(function (res){
						if(res.body=="success"){
							this.getAllCustomer();
						}
					})
				}else{
					console.log("取消删除！")
				}
				
		},
		getAllCustomer : function(){
			this.$http.get(window.APIURL+'/controller/getCustomer.php?shopno=1'+'&v='+Math.random()).then(function (res){
				this.customerList = JSON.parse(res.body);
			})
		},
		fnShowCustomer : function(obj){
			console.log(obj);
			this.upDataCustomer = obj;
			this.isUpdata = true;
		},
		fnUpdataCustomer : function(){
			console.log(this.upDataCustomer);
			var aCustomer = this.customerList;
			var isHave = false;
			for(var i=0; i<aCustomer.length; i++){
				if(this.upDataCustomer.mobilephone == aCustomer[i].mobilephone && this.upDataCustomer.id != aCustomer[i].id){
					isHave = true;
					break;
				}
			}
			if(isHave){
				alert("手机号已注册");
				this.getAllCustomer();
				return;
			}
			this.$http.post(window.APIURL+'/controller/updataCustomer.php',this.upDataCustomer).then(function (res){
				console.log(res);
	    		if(res.body=="success"){
					alert("更新成功！");
					this.getAllCustomer();
				}
	    		this.isUpdata = false;
			})
			
		},
		fnUpdataClose : function(){
			this.isUpdata = false;
		}
	},
	mounted(){
		this.getAllCustomer();

	}
}
</script>
<style>
	.user_cusomer_main{
		margin-left:135px;
		font-size:20px;
		background:#f9fafc;
		padding:20px 0 0 0;
		min-height:500px;
	}
	.user_cusomer_main tr{
		height:40px;
		font-size:12px;
	}
	.user_cusomer_main td{
		text-align:center;
		border:1px solid #fff;
	}
	.user_customer_tr td{
		width:133px;
	}
	.user_cusomer_main tr:nth-of-type(2n+1) td{
		background:#e8ecf5;
	}
	.user_cusomer_main tr .btn{
		background: #148cca;
	    padding: 3px 5px;
	    margin: 0 5px;
	    border-radius: 5px;
	    color: #fff;
	    cursor: pointer;
	}
	.updatacustomer{
		position: fixed;
	    top: 70px;
	    left: 50%;
	    background: #F0F0F0;
	    width: 600px;
	    margin-left: -300px;
	    /* height: 500px; */
	    border: 2px solid #14b5af;
	    border-radius: 5px;
	    padding: 30px;
	}
	.updatacustomer h3{
		font-size: 16px;
	    color: #148cca;
	    text-align: center;
	}
	.updatacustomer div span{
		font-size:14px;
		width:110px;
		display:inline-block;
		text-align:center;
	}
	.updatacustomer_main{
		padding:10px;
		background:#fff;
	}
	.updatacustomer_group{
		padding:5px 0;
		font-size:14px;
	}
	.updatacustomer_group input[type=text],.updatacustomer_group input[type=date]{
		background: #ffffff;
	    height: 34px;
	    width: 282px;
	    font-size: 12px;
	    outline: none;
	    color: #333333;
	    letter-spacing: 1px;
	    font-weight: bold;
	    width: 330px;
	    border: 1px solid #DDDDDD;
	    text-indent: 10px;
	    padding: 5px 30px 5px 5px;
	}
	.updatacustomer_group input[type=radio]{
		margin:0 10px;
	}
	.updatacustomerbtn{
		background: #148cca;
	    border: none;
	    padding: 15px 80px;
	    color: #fff;
	    font-size: 12px;
	    border-radius: 5px;
	    margin: 20px auto;
	    display: block;
	}
	.updatacustomer div .updataclose{
		position: absolute;
	    top: 0;
	    right: 10px;
	    font-size: 30px;
	    width: 40px;
	    height: 30px;
	    cursor: pointer;
	}
</style>