// Created by dealloc. All rights reserved.

import Vue from 'vue';
import Router from 'vue-router';
import Home from 'pages/Home.vue';

Vue.use( Router );
let router = new Router( { history: true } );

router.map({
	'/': {
		component: Home
	}
});

export default router;