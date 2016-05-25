<?php
// Created by dealloc. All rights reserved.

$router->get('/{route?}/{param?}', [ 'uses' => 'ViewController@app', 'as' => 'app' ]);