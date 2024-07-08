<?php

namespace Src\Domain\Contract\Repositories\ProductCategory;

use Src\Infra\Repositories\Postgres\Models\ProductCategory;

interface IListProductCategory
{
  public function list(): array;
}
