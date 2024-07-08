<?php

namespace Src\Domain\Usecases\ProductCategory;

use Error;
use Src\Domain\Contract\Repositories\ProductCategory\IShowProductCategory as IShow;
use Src\Domain\Entities\ProductCategory\IShowProductCategory;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;

class ShowProductCategory implements IShowProductCategory
{
    public function __construct(private IShow $repo)
    {
    }

    public function setupShowProductCategory($params): ProductCategory
    {
        $category = $this->repo->show($params);
        if (!$category) return throw new Error('Error Show Product Category');
        return $category;
    }
}
