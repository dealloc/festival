// Created by dealloc. All rights reserved.

import Vue from 'vue';
import Router from 'vue-router';
import { Home, Login, NewsDetail, PurchaseTicket, Registration, Contact } from 'pages';

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
	'/register': {
		name: 'registration',
		component: Registration
	},
	'/news/:id': {
		name: 'news',
		component: NewsDetail
	},
	'/tickets': {
		name: 'tickets',
		component: PurchaseTicket
	},
	'contact': {
		name: 'contact',
		component: Contact
	}
});

export default router;