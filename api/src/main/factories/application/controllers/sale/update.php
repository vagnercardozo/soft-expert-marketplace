<?php

namespace Src\Main\Factories\Application\Controllers\Sale;

use Src\Application\Controllers\Sale\UpdateSaleController;
use Src\Main\Factories\Domain\Usecases\Sale\MakeSetupUpdateSale;
use Src\Main\Factories\Factory;

class MakeUpdateSaleController extends Factory
{
  public static function make()
  {
    return new UpdateSaleController(MakeSetupUpdateSale::make());
  }
}
