<?php

namespace Src\Domain\Usecases\ProductCategory;

use Error;
use Src\Domain\Contract\Repositories\ProductCategory\IListProductCategory as IList;
use Src\Domain\Entities\ProductCategory\IListProductCategory;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;

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
