<?php

namespace Src\Domain\Entities\Rate;

use Src\Domain\Contract\Repositories\Rate\IRepositoryRate as IList;

interface IListRate
{
  public function __construct(IList $repo);
  public function setupListRate(): array;
}
