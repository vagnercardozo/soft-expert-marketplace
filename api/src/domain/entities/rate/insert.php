<?php

namespace Src\Domain\Entities\Rate;

use Src\Domain\Contract\Repositories\Rate\IRepositoryRate;
use Src\Infra\Repositories\Postgres\Models\Rate;

interface IInsertRate
{
  public function __construct(IRepositoryRate $repo);
  public function setupInsertRate(array $params): Rate;
}
