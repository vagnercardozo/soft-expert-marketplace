<?php

namespace Src\Domain\Entities\ProductType;

use Src\Domain\Contract\Repositories\ProductCategory\IInsertProductCategory as ISave;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;

interface IInsertProductCategory
{
  public function __construct(ISave $repo);
  public function setupInsertProductCategory(?array $params): ProductCategory;
}
