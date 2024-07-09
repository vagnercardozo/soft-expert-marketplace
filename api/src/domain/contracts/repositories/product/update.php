<?php

namespace Src\Domain\Contract\Repositories\Product;

use Src\Infra\Repositories\Postgres\Models\Product;

interface IUpdateProduct
{
  public function update(mixed $data): ?Product;
}
