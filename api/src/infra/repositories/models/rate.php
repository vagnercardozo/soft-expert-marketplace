<?php

namespace Src\Infra\Repositories\Postgres\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
  protected $table = 'rates';
  protected $fillable = ['id', 'value'];
  protected $hidden = ['created_at', 'updated_at'];
}
