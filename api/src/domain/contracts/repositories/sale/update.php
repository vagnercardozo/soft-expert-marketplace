<?php

namespace Src\Domain\Contract\Repositories\Sale;

use Src\Infra\Repositories\Postgres\Models\Sale;

interface IUpdateSale
{
  public function update(mixed $data): ?Sale;
}
