<?php

namespace Src\Main\Factories\Application\Controllers\Rate;

use Src\Application\Controllers\Rate\ShowRateController;
use Src\Main\Factories\Domain\Usecases\Rate\MakeSetupShowRate;
use Src\Main\Factories\Factory;

class MakeShowRateController extends Factory
{
  public static function make()
  {
    return new ShowRateController(MakeSetupShowRate::make());
  }
}
