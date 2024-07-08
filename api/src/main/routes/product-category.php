<?php

namespace Src\Main\Routes;


use Main\Config\Router;
use Src\Main\Factories\Application\Controllers\ProductCategory\MakeInsertProductCategoryController;
use Src\Main\Factories\Application\Controllers\ProductCategory\MakeShowProductCategoryController;
use Src\Main\Factories\Application\Controllers\ProductCategory\MakeListProductCategoryController;
use Src\Main\Factories\Application\Controllers\ProductCategory\MakeDeleteProductCategoryController;


Router::post('/product-category', app(MakeInsertProductCategoryController::class));
Router::get('/product-category/list', app(MakeListProductCategoryController::class));
Router::get('/product-category/show', app(MakeShowProductCategoryController::class));
Router::delete('/product-category/delete', app(MakeDeleteProductCategoryController::class));
