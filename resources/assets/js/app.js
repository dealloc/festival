// Created by dealloc. All rights reserved.

let App = require('vue/App.vue');
let Store = require('Store');

new Vue({
	el: 'body',
	components: {
		app: App
	},
	store: Store
});