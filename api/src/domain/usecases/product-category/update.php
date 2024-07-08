<?php

namespace Src\Domain\Usecases\ProductCategory;

use Error;
use Src\Domain\Contract\Repositories\ProductCategory\IUpdateProductCategory as IUpdate;
use Src\Domain\Entities\ProductCategory\IUpdateProductCategory;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;

class UpdateProductCategory implements IUpdateProductCategory
{
    public function __construct(private IUpdate $repo)
    {
    }

    public function setupUpdateProductCategory($params): ProductCategory
    {
        $category = $this->repo->update($params);
        if (!$category) {
            return throw new Error('Error Update Product Category');
        }
        return $category;
    }
}
