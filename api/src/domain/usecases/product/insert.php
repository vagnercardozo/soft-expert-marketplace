<?php

namespace Src\Domain\Usecases\Product;

use Error;
use Src\Domain\Contract\Repositories\Product\IInsertProduct as IInsert;
use Src\Domain\Entities\Product\IInsertProduct;
use Src\Infra\Repositories\Postgres\Models\Product;

class InsertProduct implements IInsertProduct
{
    public function __construct(private IInsert $repo)
    {
    }

    public function setupInsertProduct($params): Product
    {
        $category = $this->repo->insert($params);
        if (!$category) {
            return throw new Error('Error Insert Product');
        }
        return $category;
    }
}
