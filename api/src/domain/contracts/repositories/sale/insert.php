<?php

namespace Src\Domain\Contract\Repositories\Sale;

use Src\Infra\Repositories\Postgres\Models\Sale;

interface IInsertSale
{
  public function insert(mixed $data): ?Sale;
}
