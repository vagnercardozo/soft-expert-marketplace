<?php

namespace Src\Main\Routes;


use Main\Config\Router;
use Src\Main\Factories\Application\Controllers\ProductCategory\MakeInsertProductCategoryController;
use Src\Main\Factories\Application\Controllers\ProductCategory\MakeShowProductCategoryController;


// Router::post('/product-category', app(MakeInsertProductCategoryController::class));
Router::get('/product-category', app(MakeShowProductCategoryController::class));
