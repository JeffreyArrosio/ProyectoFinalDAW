<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected function img(): Attribute
    {
        return Attribute::get(function ($value, $attributes) {
            // Si es writer, devuelve la imagen especial, si no, la que tenga en la BD o la default
            if ($attributes['type'] === 'writer') {
                return 'https://i.pinimg.com/736x/22/78/cb/2278cb9755e65d7efd3f03e965b78ac5.jpg';
            }
            
            // Si no es writer, devuelve la imagen que tenga en la BD o la default
            return $value ?: 'https://i.pinimg.com/736x/08/d3/4e/08d34e4c00716bb8ad85f09e8291cbf8.jpg';
        });
    }

    // Usuarios normales que siguen redactores
    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'redactor_id');
    }

    // Redactores que tienen seguidores
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'redactor_id', 'follower_id');
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
