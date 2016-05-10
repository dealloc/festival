<?php
// Created by dealloc. All rights reserved.

$router->get('user', [ 'uses' => 'UserController@get', 'as' => 'api.users.me' ]);

$router->post('news', [ 'uses' => 'NewsController@create', 'as' => 'api.news.create' ]);

$router->post('news/{article}/comment', [ 'uses' => 'CommentController@create', 'as' => 'api.comments.create' ]);

$router->post('lineup', [ 'uses' => 'ArtistController@create', 'as' => 'api.lineup.create' ]);

$router->get('tickets', [ 'uses' => 'TicketsController@index', 'as' => 'api.tickets' ]);

$router->post('tickets', [ 'uses' => 'TicketsController@create', 'as' => 'api.tickets.create' ]);