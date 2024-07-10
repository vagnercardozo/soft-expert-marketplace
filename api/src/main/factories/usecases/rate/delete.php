<?php

namespace Src\Main\Factories\Domain\Usecases\Rate;

use Src\Domain\Usecases\Rate\DeleteRate;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeRateRepository;

class MakeSetupDeleteRate extends Factory
{
  public static function make()
  {
    return new DeleteRate(
      MakeRateRepository::make()
    );
  }
}
