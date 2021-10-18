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

const routes = [
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
    component: AdminCreatePizza
  },
  {
    path: '/admin-create-addition',
    name: 'admin-create-addition',
    component: AdminCreateAddition
  },

  {
    path: '/admin-orders',
    name: 'admin-orders',
    component: AdminOrders
  },

  {
    path: '/admin-banners',
    name: 'admin-banners',
    component: AdminBanners
  },

];

export default new vueRouter({
    mode: 'history',
    routes
});
