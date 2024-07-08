<?php

namespace Src\Domain\Usecases\ProductCategory;

use Error;
use Src\Domain\Contract\Repositories\ProductCategory\IInsertProductCategory as IInsert;
use Src\Domain\Entities\ProductType\IInsertProductCategory;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;

class InsertProductCategory implements IInsertProductCategory
{
    public function __construct(private IInsert $repo)
    {
    }

    public function setupInsertProductCategory($params): ProductCategory
    {
        $category = $this->repo->insert($params);
        if (!$category) {
            return throw new Error('Error Insert Product Category');
        }
        return $category;
    }
}
