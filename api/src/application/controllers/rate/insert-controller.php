<?php

namespace Src\Application\Controllers\Rate;


use Src\Application\Controllers\Controller;
use Src\Domain\Entities\Rate\IInsertRate;
use Src\Application\Helpers\Response;
use Throwable;

class InsertRateController extends Controller
{
  public function __construct(private IInsertRate $save)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->save->setupInsertRate($request);
      return Response::json($result, 200);
    } catch (Throwable $error) {
      return Response::json($error->getMessage(), 400);
    }
  }
}
