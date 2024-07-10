<?php

namespace Src\Domain\Entities\Sale;

use Src\Domain\Contract\Repositories\Sale\IRepositorySale;
use Src\Domain\Contract\Repositories\ProductSale\IRepositoryProductSale;
use Src\Infra\Repositories\Postgres\Models\Sale;

interface IInsertSale
{
  public function __construct(IRepositorySale $repo, IRepositoryProductSale $repoDetails);
  public function setupInsertSale(mixed $params): Sale;
}
