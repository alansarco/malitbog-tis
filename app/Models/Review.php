<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  protected $fillable = [
    'establishment_id',
    'name',
    'description',
    'rate',
  ];

  public function establishment()
  {
    return $this->belongsTo(Establishment::class, 'establishment_id');
  }
}
