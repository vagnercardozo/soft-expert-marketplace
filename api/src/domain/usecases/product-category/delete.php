<?php

namespace Src\Domain\Usecases\ProductCategory;

use Src\Domain\Contract\Repositories\ProductCategory\IRepositoryProductCategory as IDelete;
use Src\Domain\Entities\ProductCategory\IDeleteProductCategory;

class DeleteProductCategory implements IDeleteProductCategory
{
    public function __construct(private IDelete $repo)
    {
    }

    public function setupDeleteProductCategory($params)
    {
        $this->repo->delete($params);
    }
}
