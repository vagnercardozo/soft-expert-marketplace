<?php

namespace Src\Domain\Entities\Rate;

use Src\Domain\Contract\Repositories\Rate\IRepositoryRate as IUpdate;
use Src\Infra\Repositories\Postgres\Models\Rate;

interface IUpdateRate
{
  public function __construct(IUpdate $repo);
  public function setupUpdateRate(mixed $params): Rate;
}
