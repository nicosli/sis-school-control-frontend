
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
import swal from 'sweetalert';
window.moment = require('moment');
window.Noty = require('noty');
Noty.overrideDefaults({
    layout: 'topRight',
    theme: 'metroui',
    timeout: 2500,
    animation:{
        open: function(promise){
            var n = this;
            var Timeline = new mojs.Timeline();
            var body = new mojs.Html({
                el: n.barDom,
                x: { 500: 0, delay: 0, duration: 500, easing: 'elastic.out' },
                isForce3d: true,
                onComplete: function () {
                    promise(function (resolve) {
                        resolve();
                    })
                }
            });

            var parent = new mojs.Shape({
                parent: n.barDom,
                width: 200,
                height: n.barDom.getBoundingClientRect().height,
                radius: 0,
                x: { [150]: -150 },
                duration: 1.2 * 500,
                isShowStart: true
            });

            n.barDom.style['overflow'] = 'visible';
            parent.el.style['overflow'] = 'hidden';

            var burst = new mojs.Burst({
                parent: parent.el,
                count: 10,
                top: n.barDom.getBoundingClientRect().height + 75,
                degree: 90,
                radius: 75,
                angle: { [-90]: 40 },
                children: {
                    fill: '#EBD761',
                    delay: 'stagger(500, -50)',
                    radius: 'rand(8, 25)',
                    direction: -1,
                    isSwirl: true
                }
            });

            var fadeBurst = new mojs.Burst({
                parent: parent.el,
                count: 2,
                degree: 0,
                angle: 75,
                radius: { 0: 100 },
                top: '90%',
                children: {
                    fill: '#EBD761',
                    pathScale: [.65, 1],
                    radius: 'rand(12, 15)',
                    direction: [-1, 1],
                    delay: .8 * 500,
                    isSwirl: true
                }
            });

            Timeline.add(body, burst, fadeBurst, parent);
            Timeline.play();
        }
    }
});

window.mojs = require('mo-js');