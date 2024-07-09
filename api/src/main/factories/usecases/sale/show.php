<?php

namespace Src\Main\Factories\Domain\Usecases\Sale;

use Src\Domain\Usecases\Sale\ShowSale;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeSaleRepository;

class MakeSetupShowSale extends Factory
{
  public static function make()
  {
    return new ShowSale(
      MakeSaleRepository::make()
    );
  }
}
