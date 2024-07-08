<?php

namespace Src\Infra\Repositories\Postgres;

use Src\Domain\Contract\Repositories\ProductCategory\IInsertProductCategory;
use Src\Domain\Contract\Repositories\ProductCategory\IShowProductCategory;
use Src\Domain\Contract\Repositories\ProductCategory\IListProductCategory;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;

class ProductCategoryRepository implements IInsertProductCategory, IShowProductCategory, IListProductCategory
{
  public function insert($data): ?ProductCategory
  {
    $productCategory = new ProductCategory;
    $productCategory->fill($data)->save();
    return $productCategory;
  }

  public function show($id): ?ProductCategory
  {
    $productCategory = new ProductCategory;
    return $productCategory->whereId($id)->first();
  }

  public function list(): array
  {
    $productCategory = new ProductCategory;
    return $productCategory->get()->toArray();
  }
}
