<?php

namespace Src\Domain\Entities\Sale;

use Src\Domain\Contract\Repositories\Sale\IInsertSale as ISave;
use Src\Infra\Repositories\Postgres\Models\Sale;

interface IInsertSale
{
  public function __construct(ISave $repo);
  public function setupInsertSale(mixed $params): Sale;
}
