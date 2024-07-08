<?php

namespace Src\Main\Routes;


use Main\Config\Router;
use Src\Main\Factories\Application\Controllers\ProductCategory\MakeInsertProductCategoryController;


Router::post('/product-category', app(MakeInsertProductCategoryController::class));
