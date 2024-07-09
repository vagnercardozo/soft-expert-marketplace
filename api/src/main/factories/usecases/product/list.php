<?php

namespace Src\Main\Factories\Domain\Usecases\Product;

use Src\Domain\Usecases\Product\ListProduct;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeProductRepository;

class MakeSetupListProduct extends Factory
{
  public static function make()
  {
    return new ListProduct(
      MakeProductRepository::make()
    );
  }
}
