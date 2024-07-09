<?php

namespace Src\Domain\Contract\Repositories\Sale;

use Src\Infra\Repositories\Postgres\Models\Sale;

interface IRepositorySale
{
  public function insert(mixed $data): ?Sale;
  public function show(int $id): ?Sale;
  public function delete(int $id);
  public function list(): array;
  public function update(mixed $data): ?Sale;
}
