<?php

namespace Src\Main\Factories\Application\Controllers\Rate;

use Src\Application\Controllers\Rate\InsertRateController;
use Src\Main\Factories\Domain\Usecases\Rate\MakeSetupInsertRate;
use Src\Main\Factories\Factory;

class MakeInsertRateController extends Factory
{
  public static function make()
  {
    return new InsertRateController(MakeSetupInsertRate::make());
  }
}
