<?php

namespace Src\Infra\Repositories\Postgres;

use Src\Domain\Contract\Repositories\Sale\IInsertSale;
use Src\Domain\Contract\Repositories\Sale\IShowSale;
use Src\Domain\Contract\Repositories\Sale\IListSale;
use Src\Domain\Contract\Repositories\Sale\IDeleteSale;
use Src\Domain\Contract\Repositories\Sale\IUpdateSale;
use Src\Infra\Repositories\Postgres\Models\Sale;

class SaleRepository implements IInsertSale, IShowSale, IListSale, IDeleteSale, IUpdateSale
{
  public function insert($data): ?Sale
  {
    $sale = new Sale;
    $sale->fill($data)->save();
    return $sale;
  }

  public function show($id): ?Sale
  {
    $sale = new Sale;
    return $sale->whereId($id)->first();
  }

  public function list(): array
  {
    $sale = new Sale;
    return $sale->get()->toArray();
  }

  public function delete($id)
  {
    $sale = new Sale;
    return $sale->whereId($id)->delete();
  }

  public function update($data): ?Sale
  {
    $sale = Sale::find($data['id']);
    $sale->fill($data)->save();
    return $sale;
  }
}
