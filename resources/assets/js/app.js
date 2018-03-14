require('./bootstrap');
require('./funciones')
require('./offcanvas')

Vue.component(
    'list-administrative',
    require('./components/list/Administrative.vue')
);

const app = new Vue({
    el: '#app'
});