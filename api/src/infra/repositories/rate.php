<?php

namespace Src\Infra\Repositories\Postgres;

use Src\Domain\Contract\Repositories\Rate\IRepositoryRate;
use Src\Infra\Repositories\Postgres\Models\Rate;

class RateRepository implements IRepositoryRate
{
  public function insert($data): ?Rate
  {
    $rate = new Rate;
    $rate->fill($data)->save();
    return $rate;
  }

  public function show($id): ?Rate
  {
    $rate = new Rate;
    return $rate->whereId($id)->first();
  }

  public function list(): array
  {
    $rate = new Rate;
    return $rate->get()->toArray();
  }

  public function delete($id)
  {
    $rate = new Rate;
    return $rate->whereId($id)->delete();
  }

  public function update($data): ?Rate
  {
    $rate = Rate::find($data['id']);
    $rate->fill($data)->save();
    return $rate;
  }
}
