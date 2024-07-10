<?php

namespace Src\Domain\Entities\ProductCategory;

use Src\Domain\Contract\Repositories\ProductCategory\IRepositoryProductCategory as ISave;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;

interface IInsertProductCategory
{
  public function __construct(ISave $repo);
  public function setupInsertProductCategory(mixed $params): ProductCategory;
}
