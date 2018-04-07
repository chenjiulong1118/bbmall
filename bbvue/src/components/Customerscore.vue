<template>
	<div class="user_cusomer_score">
		<div class="updatacustomer_group">
				<div class="updatacustomer_group">
					<h3 class="updata_title">会员信息维护</h3>
				</div>
				<div class
			<span>会员编号：</span><input type="text" maxlength="11" v-model="customerPhone"/><span class="errmsg">{{errMsg}}</span>
			<label class="score"><span v-show="upDataCustomer.name" class="add" @click="ctrlScore('add')">增加积分</span><span class="sub" v-show="upDataCustomer.name" @click="ctrlScore('sub')">消费积分</span></label>
		</div>
		<div class="customerscore_list" v-show="upDataCustomer.name">
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
				<input type="button" class="customerbtn" @click="fnUpdataCustomer()" value="更新"/>
			</div>
	</div>
</template>

<script>
export default {
	name: 'customerscore',
	data () {
		return {
			customerList:[],
			customerPhone:"",
			upDataCustomer:{},
			errMsg:""
		}
	},
	watch : {
		customerPhone : function(newValue, oldValue){
			if(newValue.length>=11){
				this.getCustomer();
			}else{
				this.upDataCustomer={};
				this.errMsg = "";
			}
		}

	},
	methods: {
		getAllCustomer : function(){
			this.$http.get(window.APIURL+'/controller/getCustomer.php?shopno=1'+'&v='+Math.random()).then(function (res){
				this.customerList = JSON.parse(res.body);
			})
		},
		getCustomer : function(){
			console.log(this.customerList);
			var aCustomer = this.customerList;
			var isHave = false;
			for(var i=0; i<aCustomer.length; i++){
				if(this.customerPhone == aCustomer[i].mobilephone){
					isHave = true;
					console.log(aCustomer[i].mobilephone);
					this.upDataCustomer = aCustomer[i];
					break;
				}
			}
			if(!isHave){
				this.errMsg = "查询结果为空";
			}
			
		},
		ctrlScore : function(fn){
			var a = prompt();
			if(!a){
				alert("请输入数字");
				return;
			}
			if(isNaN(a)){
				alert("请输入数字");
				return;
			}else{
				if(fn=="add"){
					this.upDataCustomer.score = Number(this.upDataCustomer.score) + Number(a) + '';
				}else{
					this.upDataCustomer.score = Number(this.upDataCustomer.score) - Number(a) + '';
				}
				console.log(this.upDataCustomer);
				this.$http.post(window.APIURL+'/controller/updataCustomer.php',this.upDataCustomer).then(function (res){
					console.log(res);
		    		if(res.body=="success"){
						alert("更新成功！");
						this.getAllCustomer();
					}
		    		this.isUpdata = false;
				})
			}
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
			})
			
		},
	},
	mounted(){
		//先获取所有客户信息
		this.getAllCustomer();
	},
	computed(){}
}
</script>
<style>
	.user_cusomer_score{
		margin-left: 135px;
	    font-size: 20px;
	    background: #f9fafc;
	    padding: 20px 0 0 0;
	    min-height: 500px;
	}
	.user_cusomer_score>div{
		width:500px;
		margin:0 auto;
	}
	.score_search span{
		font-size:14px;
	}
	.score_search input{
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
	.errmsg{
		color:red;
		margin:0 0 0 10px;
	}
	.updata_title{
		text-align: center;
	    height: 45px;
	    line-height: 45px;
	    font-size: 20px;
	}
	.score{
		position: absolute;
	}
	.add, .sub{
	    padding: 2px 5px;
	    color: #148cca;
	    cursor: pointer;
	    line-height: 34px;
	}
</style>