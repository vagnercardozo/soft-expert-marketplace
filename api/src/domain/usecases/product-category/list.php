<?php

namespace Src\Domain\Usecases\ProductCategory;

use Src\Domain\Contract\Repositories\ProductCategory\IListProductCategory as IList;
use Src\Domain\Entities\ProductCategory\IListProductCategory;

class ListProductCategory implements IListProductCategory
{
    public function __construct(private IList $repo)
    {
    }

    public function setupListProductCategory(): array
    {
        return $this->repo->list();
    }
}
