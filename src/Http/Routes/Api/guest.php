<?php
// Created by dealloc. All rights reserved.

$router->get('/', function ()
{
	return [
		'name'   => 'Evento API v1',
		'author' => 'Wannes Gennar',
	];
});

$router->post('register', [ 'uses' => 'AuthController@register', 'as' => 'api.register' ]);

$router->post('login', [ 'uses' => 'AuthController@login', 'as' => 'api.login' ]);

$router->get('news', [ 'uses' => 'NewsController@all', 'as' => 'api.news' ]);
$router->get('news/{article}', [ 'uses' => 'NewsController@get', 'as' => 'api.news.article' ]);

$router->post('contact', [ 'uses' => 'ContactController@create', 'as' => 'api.contact' ]);

$router->get('lineup', [ 'uses' => 'ArtistController@lineup', 'as' => 'api.lineup' ]);