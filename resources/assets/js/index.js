// Created by dealloc. All rights reserved.

import Router from 'Routing';
import App from 'App';

Router.start(App, 'body', () =>
{
	$('.ui.sidebar').sidebar('attach events', 'a[data-menu-toggle]');
});

if ('serviceWorker' in navigator)
{
	navigator.serviceWorker.register('/cacher.min.js').then(function (registration)
	{
		// Registration was successful
		console.log('ServiceWorker registration successful with scope: ', registration.scope);
	}).catch(function (err)
	{
		// registration failed :(
		console.log('ServiceWorker registration failed: ', err);
	});
}