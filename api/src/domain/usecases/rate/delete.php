<?php

namespace Src\Domain\Usecases\Rate;

use Src\Domain\Contract\Repositories\Rate\IRepositoryRate as IDelete;
use Src\Domain\Entities\Rate\IDeleteRate;

class DeleteRate implements IDeleteRate
{
    public function __construct(private IDelete $repo)
    {
    }

    public function setupDeleteRate($params)
    {
        $this->repo->delete($params);
    }
}
