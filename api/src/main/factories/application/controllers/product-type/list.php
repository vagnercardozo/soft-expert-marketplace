<?php

namespace Src\Main\Factories\Application\Controllers\ProductCategory;

use Src\Application\Controllers\ProductCategory\ListProductCategoryController;
use Src\Main\Factories\Domain\Usecases\ProductCategory\MakeSetupListProductCategory;
use Src\Main\Factories\Factory;

class MakeListProductCategoryController extends Factory
{
  public static function make()
  {
    return new ListProductCategoryController(MakeSetupListProductCategory::make());
  }
}
