<?php

namespace Src\Domain\Entities\Rate;

use Src\Domain\Contract\Repositories\Rate\IRepositoryRate as IShow;
use Src\Infra\Repositories\Postgres\Models\Rate;

interface IShowRate
{
  public function __construct(IShow $repo);
  public function setupShowRate($params): Rate;
}
