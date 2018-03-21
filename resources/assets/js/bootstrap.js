
window._ = require('lodash');

window.$ = window.jQuery = require('jquery');
require('bootstrap');

window.Vue = require('vue');
require('vue-resource');

Vue.http.interceptors.push((request, next) => {
    if (parseFloat(window.timestamp_token) <= Math.floor(Date.now() / 1000)) {
        window.location.href = '/';
    }else{
        next();
    }
});

import { apiHost } from './config.js'
Vue.http.options.root = apiHost
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);

window.moment = require('moment');