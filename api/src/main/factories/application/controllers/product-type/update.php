<?php

namespace Src\Main\Factories\Application\Controllers\ProductCategory;

use Src\Application\Controllers\ProductCategory\UpdateProductCategoryController;
use Src\Main\Factories\Domain\Usecases\ProductCategory\MakeSetupUpdateProductCategory;
use Src\Main\Factories\Factory;

class MakeUpdateProductCategoryController extends Factory
{
  public static function make()
  {
    return new UpdateProductCategoryController(MakeSetupUpdateProductCategory::make());
  }
}
