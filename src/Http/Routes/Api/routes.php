<?php
// Created by dealloc. All rights reserved.

$router->post('news/create', [ 'uses' => 'NewsController@create', 'as' => 'api.news.create' ]);