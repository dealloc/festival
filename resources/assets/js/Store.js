// Created by dealloc. All rights reserved.

import Vue from 'vue';
import Vuex from 'vuex';

const state = {
	authenticated: false
};

const mutations = {
	LOGIN(state) {
		state.authenticated = true;
	},
	LOGOUT(state) {
		state.authenticated = false;
	}
};

Vue.use( Vuex );
export default new Vuex.Store( { state, mutations } );