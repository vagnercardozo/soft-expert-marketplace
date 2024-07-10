<?php

namespace Src\Application\Controllers\ProductCategory;


use Src\Application\Controllers\Controller;
use Src\Domain\Entities\ProductCategory\IUpdateProductCategory;
use Src\Application\Helpers\Response;
use Throwable;

class UpdateProductCategoryController extends Controller
{
  public function __construct(private IUpdateProductCategory $update)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->update->setupUpdateProductCategory($request);
      return Response::json($result, 200);
    } catch (Throwable $error) {
      return Response::json($error->getMessage(), 400);
    }
  }
}
