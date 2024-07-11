<?php
require_once __DIR__ . '/config/http.php';
include_once __DIR__ . "../../../vendor/autoload.php";
include_once 'config/global.php';
include_once 'config/database.php';


cors();
include_once __DIR__ . '../../main/routes/product-category.php';
include_once __DIR__ . '../../main/routes/product.php';
include_once __DIR__ . '../../main/routes/sale.php';
include_once __DIR__ . '../../main/routes/rate.php';
