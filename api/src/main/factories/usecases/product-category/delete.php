<?php

namespace Src\Main\Factories\Domain\Usecases\ProductCategory;

use Src\Domain\Usecases\ProductCategory\DeleteProductCategory;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeProductCategoryRepository;

class MakeSetupDeleteProductCategory extends Factory
{
  public static function make()
  {
    return new DeleteProductCategory(
      MakeProductCategoryRepository::make()
    );
  }
}
