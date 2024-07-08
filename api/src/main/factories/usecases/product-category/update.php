<?php

namespace Src\Main\Factories\Domain\Usecases\ProductCategory;

use Src\Domain\Usecases\ProductCategory\UpdateProductCategory;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeProductCategoryRepository;

class MakeSetupUpdateProductCategory extends Factory
{
  public static function make()
  {
    return new UpdateProductCategory(
      MakeProductCategoryRepository::make()
    );
  }
}
