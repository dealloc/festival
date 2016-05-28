// Created by dealloc. All rights reserved.

import { SideMenu } from 'ui';
import UiSnackbarContainer from 'keen/UiSnackbarContainer.vue';
import { store, vuex } from 'Store';

export default {
	ready() {
		if (this.first_time)
		{
			this.$broadcast('ui-snackbar::create', { message: 'This website uses cookies to do awesome stuff!'});
			this.$store.dispatch('VISITED');
		}
	},
	components: {
		SideMenu,
		UiSnackbarContainer
	},
	events: {
		toast(prop) {
			this.$broadcast('ui-snackbar::create', prop);
		}
	},
	store, vuex
}