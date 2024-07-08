<?php

namespace Src\Domain\Contract\Repositories\ProductCategory;

use Src\Infra\Repositories\Postgres\Models\ProductCategory;

interface IShowProductCategory
{
  public function show(int $id): ?ProductCategory;
}
