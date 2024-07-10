<?php

namespace Src\Domain\Usecases\Rate;

use Src\Domain\Contract\Repositories\Rate\IRepositoryRate as IList;
use Src\Domain\Entities\Rate\IListRate;

class ListRate implements IListRate
{
    public function __construct(private IList $repo)
    {
    }

    public function setupListRate(): array
    {
        return $this->repo->list();
    }
}
