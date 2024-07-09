<?php

namespace Src\Infra\Repositories\Postgres\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
  protected $table = 'sales';
  protected $fillable = ['id', 'value'];
  protected $hidden = ['created_at', 'updated_at'];

  public function productsSales()
  {
    return $this->hasMany(ProductSale::class, 'sale_id');
  }
}
