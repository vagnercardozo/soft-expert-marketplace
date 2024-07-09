<?php

namespace Src\Application\Controllers\Product;


use Src\Application\Controllers\Controller;
use Src\Domain\Entities\Product\IInsertProduct;
use Src\Application\Helpers\Response;
use Throwable;

class InsertProductController extends Controller
{
  public function __construct(private IInsertProduct $save)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->save->setupInsertProduct($request);
      return Response::json($result, 200);
    } catch (Throwable $error) {
      return Response::json($error->getMessage(), 400);
    }
  }
}
