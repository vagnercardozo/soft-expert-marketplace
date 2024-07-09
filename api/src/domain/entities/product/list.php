<?php

namespace Src\Domain\Entities\Product;

use Src\Domain\Contract\Repositories\Product\IListProduct as IList;

interface IListProduct
{
  public function __construct(IList $repo);
  public function setupListProduct(): array;
}
