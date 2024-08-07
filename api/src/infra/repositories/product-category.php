<?php

namespace Src\Infra\Repositories\Postgres;

use Src\Domain\Contract\Repositories\ProductCategory\IRepositoryProductCategory;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;

class ProductCategoryRepository implements IRepositoryProductCategory
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
    return $productCategory->with('rates')->whereId($id)->first();
  }

  public function list(): array
  {
    $productCategory = new ProductCategory;
    return $productCategory->get()->toArray();
  }

  public function delete($id)
  {
    $productCategory = new ProductCategory;
    return $productCategory->whereId($id)->delete();
  }

  public function update($data): ?ProductCategory
  {
    $productCategory = ProductCategory::find($data['id']);
    $productCategory->fill($data)->save();
    return $productCategory;
  }
}
