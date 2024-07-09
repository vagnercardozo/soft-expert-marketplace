<?php

namespace Src\Main\Factories\Domain\Usecases\Sale;

use Src\Domain\Usecases\Sale\ListSale;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeSaleRepository;

class MakeSetupListSale extends Factory
{
  public static function make()
  {
    return new ListSale(
      MakeSaleRepository::make()
    );
  }
}
