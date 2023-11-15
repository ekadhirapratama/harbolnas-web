<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InitRole extends Model
{
  protected $table = 'init_role';

  protected $fillable = [
    'name',
  ];

  protected $casts = [
    'name' => 'string',
  ];

  public function user()
  {
    return $this->hasMany(\App\Promo::class, 'role');
  }
}
