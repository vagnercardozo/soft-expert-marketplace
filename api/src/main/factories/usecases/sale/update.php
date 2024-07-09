<?php

namespace Src\Main\Factories\Domain\Usecases\Sale;

use Src\Domain\Usecases\Sale\UpdateSale;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeSaleRepository;

class MakeSetupUpdateSale extends Factory
{
  public static function make()
  {
    return new UpdateSale(
      MakeSaleRepository::make()
    );
  }
}
