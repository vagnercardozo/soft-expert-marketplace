<?php

namespace Src\Domain\Entities\Product;

use Src\Domain\Contract\Repositories\Product\IInsertProduct as ISave;
use Src\Infra\Repositories\Postgres\Models\Product;

interface IInsertProduct
{
  public function __construct(ISave $repo);
  public function setupInsertProduct(mixed $params): Product;
}
