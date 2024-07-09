<?php

namespace Src\Main\Factories\Domain\Usecases\Product;

use Src\Domain\Usecases\Product\UpdateProduct;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeProductRepository;

class MakeSetupUpdateProduct extends Factory
{
  public static function make()
  {
    return new UpdateProduct(
      MakeProductRepository::make()
    );
  }
}
