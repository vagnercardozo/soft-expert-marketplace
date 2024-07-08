<?php

namespace Src\Domain\Entities\ProductCategory;

use Src\Domain\Contract\Repositories\ProductCategory\IDeleteProductCategory as IDelete;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;

interface IDeleteProductCategory
{
  public function __construct(IDelete $repo);
  public function setupDeleteProductCategory($params);
}
