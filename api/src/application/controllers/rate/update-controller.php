<?php

namespace Src\Application\Controllers\Rate;


use Src\Application\Controllers\Controller;
use Src\Domain\Entities\Rate\IUpdateRate;
use Src\Application\Helpers\Response;
use Throwable;

class UpdateRateController extends Controller
{
  public function __construct(private IUpdateRate $update)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->update->setupUpdateRate($request);
      return Response::json($result, 200);
    } catch (Throwable $error) {
      return Response::json($error->getMessage(), 400);
    }
  }
}
