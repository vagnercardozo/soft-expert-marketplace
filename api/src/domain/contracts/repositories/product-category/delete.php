<?php

namespace Src\Domain\Contract\Repositories\ProductCategory;

interface IDeleteProductCategory
{
  public function delete(int $id);
}
