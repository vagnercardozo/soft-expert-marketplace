<?php

namespace Src\Domain\Entities\ProductType;

use Src\Domain\Contract\Repositories\ProductCategory\IShowProductCategory as IShow;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;

interface IShowProductCategory
{
  public function __construct(IShow $repo);
  public function setupShowProductCategory($params): ProductCategory;
}
