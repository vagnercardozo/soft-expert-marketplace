<?php

namespace Src\Main\Routes;


use Main\Config\Router;
use Src\Main\Factories\Application\Controllers\Rate\MakeInsertRateController;
use Src\Main\Factories\Application\Controllers\Rate\MakeShowRateController;
use Src\Main\Factories\Application\Controllers\Rate\MakeListRateController;
use Src\Main\Factories\Application\Controllers\Rate\MakeDeleteRateController;
use Src\Main\Factories\Application\Controllers\Rate\MakeUpdateRateController;


Router::post('/rate/insert', app(MakeInsertRateController::class));
Router::get('/rate/list', app(MakeListRateController::class));
Router::post('/rate/show', app(MakeShowRateController::class));
Router::delete('/rate/delete', app(MakeDeleteRateController::class));
Router::put('/rate/update', app(MakeUpdateRateController::class));
