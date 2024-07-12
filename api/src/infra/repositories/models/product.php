<?php

namespace Src\Infra\Repositories\Postgres\Models;

use Src\Infra\Repositories\Postgres\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'products';
  protected $fillable = ['id', 'description', 'value', 'category_id', 'updated_at'];
  protected $hidden = ['created_at'];

  public function productCategory()
  {
    return $this->belongsTo(ProductCategory::class, 'category_id');
  }
}
