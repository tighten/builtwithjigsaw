window._ = require('lodash');

import Vue from 'vue';
import VueLazyload from 'vue-lazyload';

Vue.use(VueLazyload, {
    preLoad: 1.80952381, // 380x210
});

window.Vue = Vue;
