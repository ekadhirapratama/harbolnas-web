<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InitCategory extends Model
{
  protected $table = 'init_categories';

  protected $fillable = [
    'name',
    'url_cover'
  ];

  public function promo()
  {
    return $this->hasMany(\App\Promo::class, 'category_id');
  }
}
