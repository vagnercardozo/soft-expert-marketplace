<?php

namespace Src\Domain\Entities\Product;

use Src\Domain\Contract\Repositories\Product\IUpdateProduct as IUpdate;
use Src\Infra\Repositories\Postgres\Models\Product;

interface IUpdateProduct
{
  public function __construct(IUpdate $repo);
  public function setupUpdateProduct(mixed $params): Product;
}
