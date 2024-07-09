<?php

namespace Src\Infra\Repositories\Postgres;

use Src\Domain\Contract\Repositories\ProductSale\IRepositoryProductSale;
use Src\Infra\Repositories\Postgres\Models\ProductSale;

class ProductSaleRepository implements IRepositoryProductSale
{
  public function insert($data): ?ProductSale
  {
    $productCategory = new ProductSale;
    $productCategory->fill($data)->save();
    return $productCategory;
  }
}
