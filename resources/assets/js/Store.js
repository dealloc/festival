// Created by dealloc. All rights reserved.

import Vue from 'vue';
import Vuex from 'vuex';
import PersistenceMiddleware from 'middlewares/PersistenceMiddleware';

const state = {
	authenticated: false,
	user: null
};

const mutations = {
	LOGIN(state, user) {
		state.authenticated = true;
		state.user = user;
	},
	LOGOUT(state) {
		state.authenticated = false;
		state.user = null;
	}
};

Vue.use( Vuex );
export default new Vuex.Store( { state, mutations, middlewares: [PersistenceMiddleware] } );