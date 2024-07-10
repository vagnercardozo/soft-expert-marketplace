<?php

namespace Src\Main\Factories\Domain\Usecases\Rate;

use Src\Domain\Usecases\Rate\InsertRate;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeProductRateRepository;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeRateRepository;

class MakeSetupInsertRate extends Factory
{
  public static function make()
  {
    return new InsertRate(
      MakeRateRepository::make()
    );
  }
}
