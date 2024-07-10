<?php

namespace Src\Main\Factories\Application\Controllers\Rate;

use Src\Application\Controllers\Rate\UpdateRateController;
use Src\Main\Factories\Domain\Usecases\Rate\MakeSetupUpdateRate;
use Src\Main\Factories\Factory;

class MakeUpdateRateController extends Factory
{
  public static function make()
  {
    return new UpdateRateController(MakeSetupUpdateRate::make());
  }
}
