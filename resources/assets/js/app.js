/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue';
import store from "./store";
import VueFeatherIcon from 'vue-feather-icon';

require('./bootstrap');

Vue.use(VueFeatherIcon);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('buy-button-component', require('./components/BuyButtonComponent.vue'));
Vue.component('payment-component', require('./components/CheckoutComponent.vue'));
Vue.component('cart-component', require('./components/CartComponent.vue'));


const app = new Vue({
    el: '#app',
    store
});
