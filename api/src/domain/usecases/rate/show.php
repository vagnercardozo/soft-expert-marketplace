<?php

namespace Src\Domain\Usecases\Rate;

use Error;
use Src\Domain\Contract\Repositories\Rate\IRepositoryRate;
use Src\Domain\Entities\Rate\IShowRate;
use Src\Infra\Repositories\Postgres\Models\Rate;

class ShowRate implements IShowRate
{
    public function __construct(private IRepositoryRate $repo)
    {
    }

    public function setupShowRate($params): Rate
    {
        $category = $this->repo->show($params);
        if (!$category) return throw new Error('Error Show Rate');
        return $category;
    }
}
