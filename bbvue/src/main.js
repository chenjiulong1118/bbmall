
import Vue from 'vue';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';

import App from './App';
import Home from './components/home';
import User from './components/user';
import Customer from './components/customer';
import Customerlist from './components/customerlist';
import Customeradd from './components/customeradd';
import Customerscore from './components/customerscore';
//安装插件
Vue.use(VueRouter);
Vue.use(VueResource);

//定义路由规则
const routes = [
    { path: '/', component: Home },
    { path: '/home', component: Home },
    { 
    	path: '/user',
    	component: User,
    	children: [  //这里就是二级路由的配置
        {
          path: '/customer',
          name: 'Customer',
          component: Customer,
          children:[
  	        {
  		        path: '/customerlist',
  			    name: 'Customerlist',
  			    component: Customerlist,
  	        },
  	        {
  		        path: '/customeradd',
    			    name: 'Customeradd',
    			    component: Customeradd,
  	        },
            {
                path: '/customerscore',
                    name: 'Customerscore',
                    component: Customerscore,
            }
          		
          ]
        }
      ]
    },
];

//创建实例路由
const router = new VueRouter({
    routes
});

//路由实例
new Vue({
    el: '#app',
    template: '<App/>',
    components: {App},
    router
})