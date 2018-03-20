require('./bootstrap');
require('./funciones')
require('./offcanvas')


Vue.component(
    'list-person',
    require('./components/list/listPerson.vue')
);

Vue.component(
    'dashboard',
    require('./components/Dashboard.vue')
);

const app = new Vue({
    el: '#app'
});