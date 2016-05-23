// Created by dealloc. All rights reserved.

import Router from 'Routing';
import App from 'App';

Router.start(App, 'body', () =>
{
	$('.ui.sidebar').sidebar('attach events', 'a[data-menu-toggle]');
});