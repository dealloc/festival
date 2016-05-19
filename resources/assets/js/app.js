// Created by dealloc. All rights reserved.

let Vue = require('vue');
let App = require('pages/App.vue');
let Store = require('Store');

new Vue({
	el: 'body',
	components: {
		app: App
	},
	store: Store
});