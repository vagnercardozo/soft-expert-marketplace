<?php

namespace Src\Domain\Usecases\Rate;

use Error;
use Src\Domain\Contract\Repositories\Rate\IRepositoryRate as IInsert;
use Src\Domain\Entities\Rate\IInsertRate;
use Src\Infra\Repositories\Postgres\Models\Rate;

class InsertRate implements IInsertRate
{
    public function __construct(private IInsert $repo)
    {
    }

    public function setupInsertRate($params): Rate
    {
        $category = $this->repo->insert($params);
        if (!$category) {
            return throw new Error('Error Insert Rate');
        }
        return $category;
    }
}
