<?php

namespace Src\Main\Factories\Application\Controllers\Sale;

use Src\Application\Controllers\Sale\ShowSaleController;
use Src\Main\Factories\Domain\Usecases\Sale\MakeSetupShowSale;
use Src\Main\Factories\Factory;

class MakeShowSaleController extends Factory
{
  public static function make()
  {
    return new ShowSaleController(MakeSetupShowSale::make());
  }
}
