<?php

namespace Src\Domain\Usecases\Sale;

use Src\Domain\Contract\Repositories\Sale\IRepositorySale as IList;
use Src\Domain\Entities\Sale\IListSale;

class ListSale implements IListSale
{
    public function __construct(private IList $repo)
    {
    }

    public function setupListSale(): array
    {
        return $this->repo->list();
    }
}
