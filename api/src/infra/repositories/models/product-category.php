<?php

namespace Src\Infra\Repositories\Postgres\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
  protected $table = 'product_categories';
  protected $fillable = ['id', 'description', 'updated_at'];
  protected $hidden = ['created_at', 'deleted_at'];

  public function rates()
  {
    return $this->belongsToMany(Rate::class, 'product_categories_rates',  'product_category_id', 'rate_id');
  }
}
