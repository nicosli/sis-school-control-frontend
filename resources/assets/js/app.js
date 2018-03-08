require('./bootstrap');

Vue.component(
    'login-component',
    require('./components/login/logincomponent.vue')
);

const app = new Vue({
    el: '#app'
});