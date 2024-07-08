<?php

namespace Src\Infra\Repositories\Postgres;

use Src\Domain\Contract\Repositories\ProductCategory\IInsertProductCategory;
use Src\Domain\Contract\Repositories\ProductCategory\IShowProductCategory;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;

class ProductCategoryRepository implements IInsertProductCategory, IShowProductCategory
{
  public function insert($data): ?ProductCategory
  {
    $productType = new ProductCategory;
    $productType->fill($data)->save();
    return $productType;
  }

  public function show($id): ?ProductCategory
  {
    $productType = new ProductCategory;
    return $productType->whereId($id)->first();
  }
}
