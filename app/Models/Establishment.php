<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Establishment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'owner_id',
        'name',
        'description',
        'address',
        'geolocation_longitude',
        'geolocation_latitude',
        'mode_of_transportation',
        'status',
        'date_of_site_visit',
        'hours_of_operation',
        'contact_number',
        'category'
    ];

    public function getAverageRate()
    {
        return $this->reviews->count() ? $this->reviews->avg('rate') : '0';
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function document()
    {
        return $this->hasOne(Document::class);
    }
}
