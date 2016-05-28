// Created by dealloc. All rights reserved.

import Vue from 'vue';
import Vuex from 'vuex';
import PersistenceMiddleware from 'middlewares/PersistenceMiddleware';

Vue.use(Vuex);
let store = new Vuex.Store({
	state      : {
		authenticated: false,
		user         : null,
		first_time   : true
	},
	mutations  : {
		LOGIN(state, user) {
			state.authenticated = true;
			state.user = user;
		},
		LOGOUT(state) {
			state.authenticated = false;
			state.user = null;
		},
		VISITED(state) {
			state.first_time = false;
		}
	},
	middlewares: [PersistenceMiddleware]
});

let vuex = {
	getters: {
		auth: function (state)
		{
			return (state.authenticated);
		},
		first_time: function(state)
		{
			return state.first_time;
		}
	},
	actions: {
		logout({dispatch}) {
			dispatch('LOGOUT');
			this.close();
			this.$router.go({name: 'login'});
		}
	}
};

let Memory = {};

export {
	store,
	vuex,
	Memory
}