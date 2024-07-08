<?php

namespace Src\Domain\Entities\ProductType;

use Src\Domain\Contract\Repositories\ProductCategory\IListProductCategory as IList;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;

interface IListProductCategory
{
  public function __construct(IList $repo);
  public function setupListProductCategory(): ProductCategory;
}
