<?php

namespace Src\Main\Factories\Application\Controllers\Rate;

use Src\Application\Controllers\Rate\ListRateController;
use Src\Main\Factories\Domain\Usecases\Rate\MakeSetupListRate;
use Src\Main\Factories\Factory;

class MakeListRateController extends Factory
{
  public static function make()
  {
    return new ListRateController(MakeSetupListRate::make());
  }
}
