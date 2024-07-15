<?php

namespace Src\Infra\Repositories\Postgres;

use Src\Domain\Contract\Repositories\Product\IInsertProduct;
use Src\Domain\Contract\Repositories\Product\IShowProduct;
use Src\Domain\Contract\Repositories\Product\IListProduct;
use Src\Domain\Contract\Repositories\Product\IDeleteProduct;
use Src\Domain\Contract\Repositories\Product\IUpdateProduct;
use Src\Infra\Repositories\Postgres\Models\Product;

class ProductRepository implements IInsertProduct, IShowProduct, IListProduct, IDeleteProduct, IUpdateProduct
{
  public function insert($data): ?Product
  {
    $productCategory = new Product;
    $productCategory->fill($data)->save();
    return $productCategory;
  }

  public function show($id): ?Product
  {
    $productCategory = new Product;
    return $productCategory->with(['productCategory' => function ($query) {
      $query->select('id', 'description');
    }])->whereId($id)->first();
  }

  public function list(): array
  {
    $productCategory = new Product;
    return $productCategory->with([
      'productCategory' => function ($query) {
        $query->select('id', 'description')->with(['rates' => function ($query) {
          $query->select('id', 'value');
        }]);
      }
    ])->get()->toArray();
  }

  public function delete($id)
  {
    $productCategory = new Product;
    return $productCategory->whereId($id)->delete();
  }

  public function update($data): ?Product
  {
    $productCategory = Product::find($data['id']);
    $productCategory->fill($data)->save();
    return $productCategory;
  }
}
