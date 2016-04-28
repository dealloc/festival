<?php
// Created by dealloc. All rights reserved.

$router->get('/', function ()
{
	return [
		'name' => 'Evento API v1',
		'author' => 'Wannes Gennar'
	];
});

$router->post('register', [ 'uses' => 'AuthController@register', 'as' => 'api.register' ]);