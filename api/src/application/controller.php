<?php

namespace Src\Application\Controllers;

use Error;
use Throwable;

abstract class Controller
{
  abstract protected function perform(mixed $request);

  public function handle($request)
  {
    try {
      return $this->perform($request);
    } catch (Throwable $error) {
      return new Error($error->getMessage(), $error->getCode());
    }
  }
}
