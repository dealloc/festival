// Created by dealloc. All rights reserved.

import Vue from 'vue';
import Vuex from 'vuex';
import PersistenceMiddleware from 'middlewares/PersistenceMiddleware';

Vue.use(Vuex);
let store = new Vuex.Store({
	state      : {
		authenticated: false,
		user         : null
	},
	mutations  : {
		LOGIN(state, user) {
			state.authenticated = true;
			state.user = user;
		},
		LOGOUT(state) {
			state.authenticated = false;
			state.user = null;
		}
	},
	middlewares: [PersistenceMiddleware]
});

let vuex = {
	getters: {
		auth: function(state) {
			return (state.authenticated);
		}
	},
	actions: {
		logout({dispatch}) {
			dispatch('LOGOUT');
			this.close();
			this.$router.go({ name: 'login' });
		}
	}
};

let Memory = {};

export {
	store,
	vuex,
	Memory
}