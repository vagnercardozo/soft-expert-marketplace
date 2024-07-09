<?php

namespace Src\Domain\Usecases\Sale;

use Error;
use Src\Domain\Contract\Repositories\Sale\IShowSale as IShow;
use Src\Domain\Entities\Sale\IShowSale;
use Src\Infra\Repositories\Postgres\Models\Sale;

class ShowSale implements IShowSale
{
    public function __construct(private IShow $repo)
    {
    }

    public function setupShowSale($params): Sale
    {
        $category = $this->repo->show($params);
        if (!$category) return throw new Error('Error Show Sale Category');
        return $category;
    }
}
