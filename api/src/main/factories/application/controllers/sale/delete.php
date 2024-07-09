<?php

namespace Src\Main\Factories\Application\Controllers\Sale;

use Src\Application\Controllers\Sale\DeleteSaleController;
use Src\Main\Factories\Domain\Usecases\Sale\MakeSetupDeleteSale;
use Src\Main\Factories\Factory;

class MakeDeleteSaleController extends Factory
{
  public static function make()
  {
    return new DeleteSaleController(MakeSetupDeleteSale::make());
  }
}
