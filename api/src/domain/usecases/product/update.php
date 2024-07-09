<?php

namespace Src\Domain\Usecases\Product;

use Error;
use Src\Domain\Contract\Repositories\Product\IUpdateProduct as IUpdate;
use Src\Domain\Entities\Product\IUpdateProduct;
use Src\Infra\Repositories\Postgres\Models\Product;

class UpdateProduct implements IUpdateProduct
{
    public function __construct(private IUpdate $repo)
    {
    }

    public function setupUpdateProduct($params): Product
    {
        $category = $this->repo->update($params);
        if (!$category) {
            return throw new Error('Error Update Product');
        }
        return $category;
    }
}
