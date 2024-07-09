<?php

namespace Src\Domain\Entities\Sale;

use Src\Domain\Contract\Repositories\Sale\IRepositorySale as IList;

interface IListSale
{
  public function __construct(IList $repo);
  public function setupListSale(): array;
}
