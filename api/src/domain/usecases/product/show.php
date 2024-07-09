<?php

namespace Src\Domain\Usecases\Product;

use Error;
use Src\Domain\Contract\Repositories\Product\IShowProduct as IShow;
use Src\Domain\Entities\Product\IShowProduct;
use Src\Infra\Repositories\Postgres\Models\Product;

class ShowProduct implements IShowProduct
{
    public function __construct(private IShow $repo)
    {
    }

    public function setupShowProduct($params): Product
    {
        $category = $this->repo->show($params);
        if (!$category) return throw new Error('Error Show Product');
        return $category;
    }
}
