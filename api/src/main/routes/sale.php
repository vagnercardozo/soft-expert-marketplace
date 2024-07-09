<?php

namespace Src\Main\Routes;


use Main\Config\Router;
use Src\Main\Factories\Application\Controllers\Sale\MakeInsertSaleController;
use Src\Main\Factories\Application\Controllers\Sale\MakeShowSaleController;
use Src\Main\Factories\Application\Controllers\Sale\MakeListSaleController;
use Src\Main\Factories\Application\Controllers\Sale\MakeDeleteSaleController;
use Src\Main\Factories\Application\Controllers\Sale\MakeUpdateSaleController;


Router::post('/sale/insert', app(MakeInsertSaleController::class));
Router::get('/sale/list', app(MakeListSaleController::class));
Router::get('/sale/show', app(MakeShowSaleController::class));
Router::delete('/sale/delete', app(MakeDeleteSaleController::class));
Router::put('/sale/update', app(MakeUpdateSaleController::class));
