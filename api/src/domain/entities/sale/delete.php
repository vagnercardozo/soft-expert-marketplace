<?php

namespace Src\Domain\Entities\Sale;

use Src\Domain\Contract\Repositories\Sale\IDeleteSale as IDelete;

interface IDeleteSale
{
  public function __construct(IDelete $repo);
  public function setupDeleteSale($params);
}
