<?php

namespace Src\Domain\Contract\Repositories\ProductCategory;

use Src\Infra\Repositories\Postgres\Models\ProductCategory;

interface IInsertProductCategory
{
  public function insert(mixed $data): ?ProductCategory;
}
