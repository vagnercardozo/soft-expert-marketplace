<?php

namespace Src\Main\Factories\Application\Controllers\ProductCategory;

use Src\Application\Controllers\ProductCategory\DeleteProductCategoryController;
use Src\Main\Factories\Domain\Usecases\ProductCategory\MakeSetupDeleteProductCategory;
use Src\Main\Factories\Factory;

class MakeDeleteProductCategoryController extends Factory
{
  public static function make()
  {
    return new DeleteProductCategoryController(MakeSetupDeleteProductCategory::make());
  }
}
