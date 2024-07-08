<?php

namespace Src\Domain\Usecases\ProductCategory;

use Error;
use Src\Domain\Contract\Repositories\ProductCategory\IDeleteProductCategory as IDelete;
use Src\Domain\Entities\ProductCategory\IDeleteProductCategory;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;

class DeleteProductCategory implements IDeleteProductCategory
{
    public function __construct(private IDelete $repo)
    {
    }

    public function setupDeleteProductCategory($params): ProductCategory
    {
        return $this->repo->delete($params);
    }
}
