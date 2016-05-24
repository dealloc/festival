// Created by dealloc. All rights reserved.

import Vue from 'vue';
import Vuex from 'vuex';

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
		state.user = false;
	}
};

Vue.use( Vuex );
export default new Vuex.Store( { state, mutations } );