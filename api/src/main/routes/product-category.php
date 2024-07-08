<?php

namespace Src\Main\Routes;


use Main\Config\Router;
use Src\Main\Factories\Application\Controllers\ProductCategory\MakeInsertProductCategoryController;
use Src\Main\Factories\Application\Controllers\ProductCategory\MakeShowProductCategoryController;
use Src\Main\Factories\Application\Controllers\ProductCategory\MakeListProductCategoryController;


Router::post('/product-category', app(MakeInsertProductCategoryController::class));
Router::get('/product-category/list', app(MakeListProductCategoryController::class));
Router::get('/product-category/show', app(MakeShowProductCategoryController::class));
