<?php

namespace Src\Domain\Usecases\Product;

use Error;
use Src\Domain\Contract\Repositories\Product\IListProduct as IList;
use Src\Domain\Entities\Product\IListProduct;

class ListProduct implements IListProduct
{
    public function __construct(private IList $repo)
    {
    }

    public function setupListProduct(): array
    {
        $categories = $this->repo->list();
        if (!$categories) return throw new Error('Error List Product');
        return $categories;
    }
}