<?php

namespace Src\Domain\Entities\ProductCategory;

use Src\Domain\Contract\Repositories\ProductCategory\IRepositoryProductCategory as IList;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;

interface IListProductCategory
{
  public function __construct(IList $repo);
  public function setupListProductCategory(): array;
}
