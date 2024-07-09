<?php

namespace Src\Main\Factories\Application\Controllers\Product;

use Src\Application\Controllers\Product\ListProductController;
use Src\Main\Factories\Domain\Usecases\Product\MakeSetupListProduct;
use Src\Main\Factories\Factory;

class MakeListProductController extends Factory
{
  public static function make()
  {
    return new ListProductController(MakeSetupListProduct::make());
  }
}
