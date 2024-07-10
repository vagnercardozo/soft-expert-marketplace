<?php

namespace Src\Infra\Repositories\Postgres\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
  protected $table = 'products_sales';
  protected $fillable = ['id', 'value', 'quantity', 'rate', 'product_id', 'sale_id'];
  protected $hidden = ['created_at', 'updated_at'];

  public function product()
  {
    return $this->belongsTo(Product::class, 'product_id');
  }
}
