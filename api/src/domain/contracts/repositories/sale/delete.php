<?php

namespace Src\Domain\Contract\Repositories\Sale;

interface IDeleteSale
{
  public function delete(int $id);
}
