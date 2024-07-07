<?php

namespace Src\Infra\Repositories\Postgres;

use Src\Domain\Contract\Repositories\ProductCategory\IInsertProductCategory;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;

class ProductCategoryRepository implements IInsertProductCategory
{
  public function insert($data): ?ProductCategory
  {
    $productType = new ProductCategory;
    $productType->fill($data)->save();
    return $productType;
  }
}
