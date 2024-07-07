<?php

namespace Src\Infra\Repositories\Postgres\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
  protected $table = 'product_categories';
  protected $fillable = ['id', 'description'];
  protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
