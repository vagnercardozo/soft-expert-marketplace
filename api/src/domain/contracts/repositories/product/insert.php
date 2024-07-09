<?php

namespace Src\Domain\Contract\Repositories\Product;

use Src\Infra\Repositories\Postgres\Models\Product;

interface IInsertProduct
{
  public function insert(mixed $data): ?Product;
}
