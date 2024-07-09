<?php

namespace Src\Domain\Usecases\Sale;

use Error;
use Src\Domain\Contract\Repositories\Sale\IUpdateSale as IUpdate;
use Src\Domain\Entities\Sale\IUpdateSale;
use Src\Infra\Repositories\Postgres\Models\Sale;

class UpdateSale implements IUpdateSale
{
    public function __construct(private IUpdate $repo)
    {
    }

    public function setupUpdateSale($params): Sale
    {
        $category = $this->repo->update($params);
        if (!$category) {
            return throw new Error('Error Update Sale Category');
        }
        return $category;
    }
}
