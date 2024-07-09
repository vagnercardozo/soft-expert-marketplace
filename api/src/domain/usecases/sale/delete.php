<?php

namespace Src\Domain\Usecases\Sale;

use Src\Domain\Contract\Repositories\Sale\IRepositorySale as IDelete;
use Src\Domain\Entities\Sale\IDeleteSale;

class DeleteSale implements IDeleteSale
{
    public function __construct(private IDelete $repo)
    {
    }

    public function setupDeleteSale($params)
    {
        $this->repo->delete($params);
    }
}
