<?php

namespace Src\Application\Controllers\ProductCategory;

use Error;
use Illuminate\Support\Facades\Response;
use Src\Application\Controllers\Controller;
use Src\Domain\Entities\ProductType\IInsertProductCategory;
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
      return Response::json($result, 201);
    } catch (Throwable $error) {
      return new Error($error, 400);
    }
  }
}
