<?php

namespace Src\Main\Factories\Domain\Usecases\Rate;

use Src\Domain\Usecases\Rate\UpdateRate;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeRateRepository;

class MakeSetupUpdateRate extends Factory
{
  public static function make()
  {
    return new UpdateRate(
      MakeRateRepository::make()
    );
  }
}
