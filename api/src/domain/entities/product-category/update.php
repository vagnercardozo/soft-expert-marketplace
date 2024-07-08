<?php

namespace Src\Domain\Entities\ProductCategory;

use Src\Domain\Contract\Repositories\ProductCategory\IUpdateProductCategory as IUpdate;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;

interface IUpdateProductCategory
{
  public function __construct(IUpdate $repo);
  public function setupUpdateProductCategory(?array $params): ProductCategory;
}
