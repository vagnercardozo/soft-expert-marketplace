<?php

namespace Src\Domain\Entities\Sale;

use Src\Domain\Contract\Repositories\Sale\IShowSale as IShow;
use Src\Infra\Repositories\Postgres\Models\Sale;

interface IShowSale
{
  public function __construct(IShow $repo);
  public function setupShowSale($params): Sale;
}
