<?php

namespace Src\Application\Controllers\Sale;


use Src\Application\Controllers\Controller;
use Src\Domain\Entities\Sale\IInsertSale;
use Src\Application\Helpers\Response;
use Throwable;

class InsertSaleController extends Controller
{
  public function __construct(private IInsertSale $save)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->save->setupInsertSale($request);
      return Response::json($result, 200);
    } catch (Throwable $error) {
      return Response::json($error->getMessage(), 400);
    }
  }
}
