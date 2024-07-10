<?php

namespace Src\Domain\Contract\Repositories\Rate;

use Src\Infra\Repositories\Postgres\Models\Rate;

interface IRepositoryRate
{
  public function insert(mixed $data): ?Rate;
  public function show(int $id): ?Rate;
  public function delete(int $id);
  public function list(): array;
  public function update(mixed $data): ?Rate;
}
