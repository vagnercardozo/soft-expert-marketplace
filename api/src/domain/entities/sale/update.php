<?php

namespace Src\Domain\Entities\Sale;

use Src\Domain\Contract\Repositories\ProductSale\IRepositoryProductSale;
use Src\Domain\Contract\Repositories\Sale\IRepositorySale as IUpdate;
use Src\Infra\Repositories\Postgres\Models\Sale;

interface IUpdateSale
{
  public function __construct(IUpdate $repo, IRepositoryProductSale $repoDetails);
  public function setupUpdateSale(mixed $params): Sale;
}
