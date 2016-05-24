// Created by dealloc. All rights reserved.

import SideMenu from 'ui/SideMenu.vue';
import UiSnackbarContainer from 'keen/UiSnackbarContainer.vue';
import store from 'Store';

export default {
	components: {
		SideMenu,
		UiSnackbarContainer
	},
	events: {
		toast(prop) {
			this.$broadcast('ui-snackbar::create', prop);
		}
	},
	store
}