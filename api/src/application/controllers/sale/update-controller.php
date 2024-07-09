<?php

namespace Src\Application\Controllers\Sale;


use Src\Application\Controllers\Controller;
use Src\Domain\Entities\Sale\IUpdateSale;
use Src\Application\Helpers\Response;
use Throwable;

class UpdateSaleController extends Controller
{
  public function __construct(private IUpdateSale $update)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->update->setupUpdateSale($request);
      return Response::json($result, 200);
    } catch (Throwable $error) {
      return Response::json($error->getMessage(), 400);
    }
  }
}
