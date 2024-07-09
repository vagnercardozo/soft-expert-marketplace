<?php

namespace Src\Main\Factories\Domain\Usecases\Product;

use Src\Domain\Usecases\Product\InsertProduct;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeProductRepository;

class MakeSetupInsertProduct extends Factory
{
  public static function make()
  {
    return new InsertProduct(
      MakeProductRepository::make()
    );
  }
}
