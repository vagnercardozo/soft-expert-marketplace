<?php

namespace Src\Application\Controllers\ProductCategory;

use Error;
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
      return json_encode($result);
    } catch (Throwable $error) {
      return new Error($error, 400);
    }
  }
}
