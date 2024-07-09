<?php

namespace Src\Main\Factories\Application\Controllers\Sale;

use Src\Application\Controllers\Sale\InsertSaleController;
use Src\Main\Factories\Domain\Usecases\Sale\MakeSetupInsertSale;
use Src\Main\Factories\Factory;

class MakeInsertSaleController extends Factory
{
  public static function make()
  {
    return new InsertSaleController(MakeSetupInsertSale::make());
  }
}
