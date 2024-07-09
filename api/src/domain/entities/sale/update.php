<?php

namespace Src\Domain\Entities\Sale;

use Src\Domain\Contract\Repositories\Sale\IUpdateSale as IUpdate;
use Src\Infra\Repositories\Postgres\Models\Sale;

interface IUpdateSale
{
  public function __construct(IUpdate $repo);
  public function setupUpdateSale(mixed $params): Sale;
}
