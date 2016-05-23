// Created by dealloc. All rights reserved.

import Router from 'Routing';
import SideMenu from 'components/Menu.vue';

Router.start({
	components: {
		SideMenu
	}
}, 'body', () =>
{
	$('.ui.sidebar').sidebar('attach events', 'a[data-menu-toggle]');
});