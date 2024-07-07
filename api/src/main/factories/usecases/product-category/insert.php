<?php

namespace Src\Main\Factories\Domain\Usecases\ProductCategory;

use Src\Domain\Usecases\ProductCategory\InsertProductCategory;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeProductCategoryRepository;

class MakeSetupInsertProductCategory extends Factory
{
  public static function make()
  {
    return new InsertProductCategory(
      MakeProductCategoryRepository::make()
    );
  }
}
