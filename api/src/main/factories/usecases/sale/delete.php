<?php

namespace Src\Main\Factories\Domain\Usecases\Sale;

use Src\Domain\Usecases\Sale\DeleteSale;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeSaleRepository;

class MakeSetupDeleteSale extends Factory
{
  public static function make()
  {
    return new DeleteSale(
      MakeSaleRepository::make()
    );
  }
}
