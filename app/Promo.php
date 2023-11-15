<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
  protected $table = 'promo';

  protected $fillable = [
    'user_id',
    'type_id',
    'category_id',
    'url',
    'url_banner',
    'status'
  ];

  public function user()
  {
    return $this->belongsTo(\App\User::class, 'user_id');
  }
  public function type()
  {
    return $this->belongsTo(\App\InitType::class, 'type_id');
  }
  public function category()
  {
    return $this->belongsTo(\App\InitCategory::class, 'category_id');
  }
}
