<?php

namespace Src\Infra\Repositories\Postgres\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
  protected $table = 'rates';
  protected $fillable = ['id', 'value', 'description', 'updated_at'];
  protected $hidden = ['created_at'];
}
