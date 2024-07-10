<?php

namespace Src\Domain\Contract\Repositories\ProductCategory;

use Src\Infra\Repositories\Postgres\Models\ProductCategory;

interface IRepositoryProductCategory
{
  public function insert(mixed $data): ?ProductCategory;
  public function delete(int $id);
  public function list(): array;
  public function show(int $id): ?ProductCategory;
  public function update(mixed $data): ?ProductCategory;
}
