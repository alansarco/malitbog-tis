<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'role_id',
        'status',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function fullName()
    {
        return $this->last_name  . ', '. $this->first_name;
    }

    public function getCapsFullName()
    {
        return Str::upper($this->fullName());
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function establishments()
    {
        return $this->hasMany(Establishment::class, 'owner_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
