<?php

namespace Src\Application\Controllers\Product;


use Src\Application\Controllers\Controller;
use Src\Domain\Entities\Product\IUpdateProduct;
use Src\Application\Helpers\Response;
use Throwable;

class UpdateProductController extends Controller
{
  public function __construct(private IUpdateProduct $update)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->update->setupUpdateProduct($request);
      return Response::json($result, 200);
    } catch (Throwable $error) {
      return Response::json($error, 400);
    }
  }
}
