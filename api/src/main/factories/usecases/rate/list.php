<?php

namespace Src\Main\Factories\Domain\Usecases\Rate;

use Src\Domain\Usecases\Rate\ListRate;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeRateRepository;

class MakeSetupListRate extends Factory
{
  public static function make()
  {
    return new ListRate(
      MakeRateRepository::make()
    );
  }
}
