<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InitType extends Model
{
  protected $table = 'init_types';

  protected $fillable = [
    'name',
  ];

  public function promo()
  {
    return $this->hasMany(\App\Promo::class, 'type_id');
  }
}
