<?php

namespace Src\Domain\Usecases\ProductCategory;

use Error;
use Src\Domain\Contract\Repositories\ProductCategory\IListProductCategory as IList;
use Src\Domain\Entities\ProductType\IListProductCategory;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;

class ListProductCategory implements IListProductCategory
{
    public function __construct(private IList $repo)
    {
    }

    public function setupListProductCategory(): ProductCategory
    {
        $categories = $this->repo->list();
        if (!$categories) return throw new Error('Error List Product Category');
        return $categories;
    }
}
