<?php

namespace Src\Main\Factories\Application\Controllers\Rate;

use Src\Application\Controllers\Rate\DeleteRateController;
use Src\Main\Factories\Domain\Usecases\Rate\MakeSetupDeleteRate;
use Src\Main\Factories\Factory;

class MakeDeleteRateController extends Factory
{
  public static function make()
  {
    return new DeleteRateController(MakeSetupDeleteRate::make());
  }
}
