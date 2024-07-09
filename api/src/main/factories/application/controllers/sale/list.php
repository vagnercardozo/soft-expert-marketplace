<?php

namespace Src\Main\Factories\Application\Controllers\Sale;

use Src\Application\Controllers\Sale\ListSaleController;
use Src\Main\Factories\Domain\Usecases\Sale\MakeSetupListSale;
use Src\Main\Factories\Factory;

class MakeListSaleController extends Factory
{
  public static function make()
  {
    return new ListSaleController(MakeSetupListSale::make());
  }
}
