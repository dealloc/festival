// Created by dealloc. All rights reserved.

import Vue from 'vue';
import Router from 'vue-router';
import Home from 'pages/Home.vue';
import Login from 'pages/Login.vue';

Vue.use( Router );
let router = new Router( { history: true } );

router.map({
	'/': {
		name: 'home',
		component: Home
	},
	'/login': {
		name: 'login',
		component: Login
	}
});

export default router;