<?php

namespace Src\Main\Factories\Application\Controllers\ProductCategory;

use Src\Application\Controllers\ProductCategory\ShowProductCategoryController;
use Src\Main\Factories\Domain\Usecases\ProductCategory\MakeSetupShowProductCategory;
use Src\Main\Factories\Factory;

class MakeShowProductCategoryController extends Factory
{
  public static function make()
  {
    return new ShowProductCategoryController(MakeSetupShowProductCategory::make());
  }
}
