<?php

namespace Src\Domain\Entities\ProductCategory;

use Src\Domain\Contract\Repositories\ProductCategory\IRepositoryProductCategory as IUpdate;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;

interface IUpdateProductCategory
{
  public function __construct(IUpdate $repo);
  public function setupUpdateProductCategory(mixed $params): ProductCategory;
}
