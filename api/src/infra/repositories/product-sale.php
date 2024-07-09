<?php

namespace Src\Infra\Repositories\Postgres;

use Src\Domain\Contract\Repositories\ProductSale\IRepositoryProductSale;
use Src\Infra\Repositories\Postgres\Models\ProductSale;

class ProductSaleRepository implements IRepositoryProductSale
{
  public function insert($data): array
  {
    return array_map(fn ($detail) => ProductSale::create($detail), $data);
  }
}
