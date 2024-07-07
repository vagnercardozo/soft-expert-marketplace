<?php

namespace Src\Main\Factories\Application\Controllers\ProductCategory;

use Src\Application\Controllers\ProductCategory\InsertProductCategoryController;
use Src\Main\Factories\Domain\Usecases\ProductCategory\MakeSetupInsertProductCategory;
use Src\Main\Factories\Factory;

class MakeInsertProductCategoryController extends Factory
{
  public static function make()
  {
    return new InsertProductCategoryController(MakeSetupInsertProductCategory::make());
  }
}
