<?php

namespace Src\Domain\Contract\Repositories\Sale;

use Src\Infra\Repositories\Postgres\Models\Sale;

interface IShowSale
{
  public function show(int $id): ?Sale;
}
