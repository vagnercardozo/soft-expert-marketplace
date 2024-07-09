<?php

namespace Src\Domain\Usecases\Sale;

use Error;
use Src\Domain\Contract\Repositories\Sale\IInsertSale as IInsert;
use Src\Domain\Entities\Sale\IInsertSale;
use Src\Infra\Repositories\Postgres\Models\Sale;

class InsertSale implements IInsertSale
{
    public function __construct(private IInsert $repo)
    {
    }

    public function setupInsertSale($params): Sale
    {
        $category = $this->repo->insert($params);
        if (!$category) {
            return throw new Error('Error Insert Sale Category');
        }
        return $category;
    }
}
