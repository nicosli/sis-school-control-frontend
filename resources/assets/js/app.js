require('./bootstrap');
require('./funciones')
require('./offcanvas')


Vue.component(
    'list-person',
    require('./components/person/listPerson.vue')
);

Vue.component(
    'school-year',
    require('./components/academic/listSchoolYear.vue')
);

Vue.component(
    'dashboard',
    require('./components/home/Dashboard.vue')
);

const app = new Vue({
    el: '#app'
});