<template>
	<div class="user_cusomer_add">
		<h3 class="registertitle">用户注册</h3>
		<table border=0 cellpadding=0 cellspacing=0 class="customertable">
			<tr>
				<td>用户姓名:</td>
				<td><input type="text" v-model="oCustomer.name"/></td>
			</tr>
			<tr>
				<td>用户性别:</td>
				<td>男<input type="radio" name="sex" value="男" v-model="oCustomer.sex"/>女<input type="radio" name="sex" value="女" v-model="oCustomer.sex"/></td>
			</tr>
			<tr>
				<td>手机号码:</td>
				<td><input type="text" v-model="oCustomer.mobilephone"/></td>
			</tr>
			<tr>
				<td>宝宝生日:</td>
				<td><input type="date" v-model="oCustomer.babybirthday"/></td>
			</tr>
			<tr>
				<td>宝宝性别:</td>
				<td>男<input type="radio" name="babysex" value="男" v-model="oCustomer.babysex"/>女<input type="radio" name="babysex" value="女" v-model="oCustomer.babysex"/></td>
			</tr>
			<tr>
				<td>会员积分:</td>
				<td><input type="text" v-model="oCustomer.score"/></td>
			</tr>
			<tr>
				<td>详细地址:</td>
				<td><input type="text" v-model="oCustomer.address"/></td>
			</tr>
		</table>
		<input type="button" class="customerbtn" @click="fnCustomerAdd()" value="提交"/>
	</div>
</template>

<script>
export default {
	name: 'customerlist',
	data () {
		return {
			oCustomer:{
				name:"",
				sex:"",
				mobilephone:'',
				babybirthday:'',
				babysex:'',
				address:'',
				score:"",
				shopno:'1'
			},
			customerList:[]
		}
	},
	methods: {
		getAllCustomer : function(){
			this.$http.get(window.APIURL+'/controller/getCustomer.php?shopno=1'+'&v='+Math.random()).then(function (res){
				this.customerList = JSON.parse(res.body);
			})
		},
	    fnCustomerAdd: function () {
	   		console.log("开始提交");
	    	if(!this.oCustomer.name){
	    		alert("姓名不能为空");
	    		return;
	    	}
	    	if(!/\d{11}/.test(this.oCustomer.mobilephone)){
	    		alert("手机号不正确");
	    		return;
	    	}
	    	var aCustomer = this.customerList;
			var isHave = false;
			for(var i=0; i<aCustomer.length; i++){
				if(this.oCustomer.mobilephone == aCustomer[i].mobilephone){
					isHave = true;
					break;
				}
			}
			if(isHave){
				alert("手机号已注册");
				return;
			}
	    	this.$http.post(window.APIURL+'/controller/addCustomer.php',this.oCustomer).then(function (res){
						console.log(res);
			    		if(res.body=="success"){
							this.oCustomer = {
								name:"",
								sex:"",
								mobilephone:'',
								babybirthday:'',
								babysex:'',
								address:'',
								score:"",
								shopno:'1'
							}
							alert("添加成功！");
						}
					})
	    }
	},
	mounted(){
		this.getAllCustomer();
	},
	computed(){}
}
</script>
<style>
	.user_cusomer_add{
		margin-left:135px;
		font-size:14px;
		background:#f9fafc;
		padding:20px 0 0 0;
		min-height:500px;
	}
	.user_cusomer_add td{
		width:300px;
		height:45px;
	}
	.user_cusomer_add tr td:nth-of-type(2){
		text-align: left;
		width:400px;
		padding:0 0 0 30px;
	}
	.user_cusomer_add tr td:first-of-type{
		text-align: right;
		width:200px;
	}
	.user_cusomer_add tr td input[type=text],.user_cusomer_add tr td input[type=date]{
		background:#ffffff;
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
	.user_cusomer_add tr td input[type=radio]{
		width: 15px;
	    height: 15px;
	    vertical-align: middle;
	    margin: 0 15px;
	}
	.customerbtn{
		    background: #148cca;
	    border: none;
	    padding: 15px 80px;
	    color: #fff;
	    font-size: 12px;
	    border-radius: 5px;
	    margin: 20px auto;
	    display: block;
	}
	.registertitle{
	    text-align: center;
	    height: 45px;
	    line-height: 45px;
	    font-size: 20px;
		}
	.customertable{
	    margin: 0 auto;
	}
</style>