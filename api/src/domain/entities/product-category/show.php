<?php

namespace Src\Domain\Entities\ProductCategory;

use Src\Domain\Contract\Repositories\ProductCategory\IRepositoryProductCategory as IShow;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;

interface IShowProductCategory
{
  public function __construct(IShow $repo);
  public function setupShowProductCategory($params): ProductCategory;
}
