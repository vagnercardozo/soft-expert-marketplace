<?php

namespace Src\Domain\Contract\Repositories\ProductSale;

use Src\Infra\Repositories\Postgres\Models\ProductSale;

interface IRepositoryProductSale
{
  public function insert(array $data): ?ProductSale;
}
