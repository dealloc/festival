// Created by dealloc. All rights reserved.

import Vue from 'vue';
import Router from 'vue-router';
import { Home, Login, NewsDetail } from 'pages';

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
	},
	'/news/:id': {
		name: 'news',
		component: NewsDetail
	}
});

export default router;