// Created by dealloc. All rights reserved.

import Router from 'Routing';

Router.start({}, 'body', () =>
{
	$('.ui.sidebar').sidebar('attach events', 'a[data-menu-toggle]');
});