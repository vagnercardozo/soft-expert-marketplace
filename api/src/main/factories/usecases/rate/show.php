<?php

namespace Src\Main\Factories\Domain\Usecases\Rate;

use Src\Domain\Usecases\Rate\ShowRate;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeRateRepository;

class MakeSetupShowRate extends Factory
{
  public static function make()
  {
    return new ShowRate(
      MakeRateRepository::make()
    );
  }
}
