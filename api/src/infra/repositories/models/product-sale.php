<?php

namespace Src\Infra\Repositories\Postgres\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
  protected $table = 'product_sales';
  protected $fillable = ['id', 'value', 'quantity', 'tax', 'product_id', 'sales_id'];
  protected $hidden = ['created_at', 'updated_at'];
}
