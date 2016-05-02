<?php
// Created by dealloc. All rights reserved.

$router->post('news/create', [ 'uses' => 'NewsController@create', 'as' => 'api.news.create' ]);

$router->post('news/{article}/comment', [ 'uses' => 'CommentController@create', 'as' => 'api.comments.create' ]);

$router->post('lineup/create', [ 'uses' => 'ArtistController@create', 'as' => 'api.lineup.create' ]);