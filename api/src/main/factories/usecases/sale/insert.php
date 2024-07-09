<?php

namespace Src\Main\Factories\Domain\Usecases\Sale;

use Src\Domain\Usecases\Sale\InsertSale;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeProductSaleRepository;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeSaleRepository;

class MakeSetupInsertSale extends Factory
{
  public static function make()
  {
    return new InsertSale(
      MakeSaleRepository::make(),
      MakeProductSaleRepository::make()
    );
  }
}
