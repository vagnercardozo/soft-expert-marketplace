<?php

namespace Src\Main\Factories\Infra\Repositories\Postgres;

use Src\Main\Factories\Factory;
use Src\Infra\Repositories\Postgres\ProductCategoryRepository;

class MakeProductCategoryRepository extends Factory
{
  public static function make()
  {
    return new ProductCategoryRepository();
  }
}
