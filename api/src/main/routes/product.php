<?php

namespace Src\Main\Routes;


use Main\Config\Router;
use Src\Main\Factories\Application\Controllers\Product\MakeInsertProductController;
use Src\Main\Factories\Application\Controllers\Product\MakeShowProductController;
use Src\Main\Factories\Application\Controllers\Product\MakeListProductController;
use Src\Main\Factories\Application\Controllers\Product\MakeDeleteProductController;
use Src\Main\Factories\Application\Controllers\Product\MakeUpdateProductController;


Router::post('/product/insert', app(MakeInsertProductController::class));
Router::get('/product/list', app(MakeListProductController::class));
Router::get('/product/show', app(MakeShowProductController::class));
Router::delete('/product/delete', app(MakeDeleteProductController::class));
Router::put('/product/update', app(MakeUpdateProductController::class));
