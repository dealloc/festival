<?php
// Created by dealloc. All rights reserved.

$router->get('/{route}', [ 'uses' => 'ViewController@home', 'as' => 'home' ]);