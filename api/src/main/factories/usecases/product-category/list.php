<?php

namespace Src\Main\Factories\Domain\Usecases\ProductCategory;

use Src\Domain\Usecases\ProductCategory\ListProductCategory;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeProductCategoryRepository;

class MakeSetupListProductCategory extends Factory
{
  public static function make()
  {
    return new ListProductCategory(
      MakeProductCategoryRepository::make()
    );
  }
}
