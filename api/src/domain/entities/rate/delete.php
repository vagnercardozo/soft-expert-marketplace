<?php

namespace Src\Domain\Entities\Rate;

use Src\Domain\Contract\Repositories\Rate\IRepositoryRate as IDelete;

interface IDeleteRate
{
  public function __construct(IDelete $repo);
  public function setupDeleteRate($params);
}
