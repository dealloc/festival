<?php

namespace Festival\Http\Controllers;

use Ichtus\Commands\Contracts\Dispatcher;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Ichtus\Commands\DispatchesCommands;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests, DispatchesCommands;

    public function __construct(Dispatcher $dispatcher)
    {
        $this->setDispatcher($dispatcher);
    }
}
