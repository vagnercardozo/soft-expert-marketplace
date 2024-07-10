<?php

namespace Src\Domain\Usecases\Rate;

use Error;
use Src\Domain\Contract\Repositories\Rate\IRepositoryRate as IUpdate;
use Src\Domain\Entities\Rate\IUpdateRate;
use Src\Infra\Repositories\Postgres\Models\Rate;

class UpdateRate implements IUpdateRate
{
    public function __construct(private IUpdate $repo)
    {
    }

    public function setupUpdateRate($params): Rate
    {
        $category = $this->repo->update($params);
        if (!$category) {
            return throw new Error('Error Update Rate');
        }
        return $category;
    }
}
