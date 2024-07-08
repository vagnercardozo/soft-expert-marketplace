<?php

namespace Src\Domain\Contract\Repositories\ProductCategory;

use Src\Infra\Repositories\Postgres\Models\ProductCategory;

interface IUpdateProductCategory
{
  public function update(mixed $data): ?ProductCategory;
}
