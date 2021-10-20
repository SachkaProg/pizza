import Vue from 'vue';
import vueRouter from 'vue-router';

Vue.use(vueRouter);

// import Example from './components/ExampleComponent'

import Main from './views/Main.vue'
import Cart from './views/Cart.vue'
import Order from './views/Order.vue'
import OrderSuccess from './views/OrderSuccess.vue'

import AdminOrders from './views/AdminOrders.vue'
import AdminCreatePizza from './views/AdminCreatePizza.vue'
import AdminCreateAddition from './views/AdminCreateAddition.vue'
import AdminBanners from './views/AdminBanners.vue'

const router = new vueRouter({
    mode: 'history',
    routes:[
        {
          path: '/',
          name: 'main',
          component: Main
        },
        {
          path: '/cart',
          name: 'cart',
          component: Cart
        },
        {
          path: '/order',
          name: 'order',
          component: Order
        },
        {
          path: '/order-success',
          name: 'order-success',
          component: OrderSuccess
        },
        {
          path: '/admin-create-pizza',
          name: 'admin-create-pizza',
          component: AdminCreatePizza,
          meta: {
            role: "admin",
          },
        },
        {
          path: '/admin-create-addition',
          name: 'admin-create-addition',
          component: AdminCreateAddition,
          meta: {
            role: "admin",
          },
        },

        {
          path: '/admin-orders',
          name: 'admin-orders',
          component: AdminOrders,
          meta: {
            role: "admin",
          },
        },

        {
          path: '/admin-banners',
          name: 'admin-banners',
          component: AdminBanners,
          meta: {
            role: "admin",
          },
        },
    ]
});


router.beforeEach((to, from, next)=>{
    let userRole = window.Laravel.user?.role;
    if(to.meta == undefined) next();
    else if(to.meta.role=="admin"){
        if(userRole=="admin") {
            next();
        } else
          next({
            name: "main"
          });
    }
    next();
});

export default router;
