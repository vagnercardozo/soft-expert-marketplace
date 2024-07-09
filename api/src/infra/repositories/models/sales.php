<?php

namespace Src\Infra\Repositories\Postgres\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
  protected $table = 'sales';
  protected $fillable = ['id', 'value'];
  protected $hidden = ['created_at', 'updated_at'];
}
