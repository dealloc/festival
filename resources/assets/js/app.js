// Created by dealloc. All rights reserved.

import Vue from 'vue';
import Router from 'vue-router';
import App from 'pages/App.vue';
import Store from 'Store';

Vue.use( Router );
let router = new Router( { history: true } );
// TODO add router mappings..

router.start( App, '#root' );