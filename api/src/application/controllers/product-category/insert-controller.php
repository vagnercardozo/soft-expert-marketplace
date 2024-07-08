<?php

namespace Src\Application\Controllers\ProductCategory;


use Src\Application\Controllers\Controller;
use Src\Domain\Entities\ProductCategory\IInsertProductCategory;
use Src\Application\Helpers\Response;
use Throwable;

class InsertProductCategoryController extends Controller
{
  public function __construct(private IInsertProductCategory $save)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->save->setupInsertProductCategory($request);
      return Response::json($result, 200);
    } catch (Throwable $error) {
      return Response::json($error, 400);
    }
  }
}
