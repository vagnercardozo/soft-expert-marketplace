<?php

namespace Src\Main\Factories\Domain\Usecases\ProductCategory;

use Src\Domain\Usecases\ProductCategory\ShowProductCategory;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeProductCategoryRepository;

class MakeSetupShowProductCategory extends Factory
{
  public static function make()
  {
    return new ShowProductCategory(
      MakeProductCategoryRepository::make()
    );
  }
}
