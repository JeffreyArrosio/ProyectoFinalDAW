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

    protected function img()
    {
        return Attribute::get(function ($value, $attributes) {
            // $images = [
            //     "https://i.pinimg.com/1200x/dc/8a/57/dc8a57bd8fbedd276aa12de590b81a80.jpg",
            //     'https://i.pinimg.com/736x/22/78/cb/2278cb9755e65d7efd3f03e965b78ac5.jpg',
            //     "https://i.pinimg.com/736x/99/0d/16/990d16b9392d430e1d7b89eb8792bc3a.jpg",
            //     "https://i.pinimg.com/736x/f1/4d/d3/f14dd30afa5712fe213eecbdb41df70e.jpg",
            //     "https://i.pinimg.com/736x/00/58/69/0058693e87c9e00b8e321fcddd857dac.jpg",
            //     "https://i.pinimg.com/736x/e4/3d/3d/e43d3db9721b95c316611aa7ac5460c6.jpg",
            //     "https://i.pinimg.com/736x/2b/eb/48/2beb486e56bb6d556894ab42161b62bf.jpg",
            //     "https://i.pinimg.com/736x/2e/33/14/2e331479df3d019b7a91c94ce4a28c46.jpg",
            //     "https://i.pinimg.com/736x/e3/17/95/e3179580ccc5a5a6cdd24fa322991437.jpg"
            // ];
            // $randImg = $images[array_rand($images)];
            // Si es writer, devuelve la imagen especial, si no, la que tenga en la BD o la default
            if ($attributes['type'] !== 'writer') {
                return 'https://i.pinimg.com/736x/08/d3/4e/08d34e4c00716bb8ad85f09e8291cbf8.jpg';
            }

            // Si no es writer, devuelve la imagen que tenga en la BD o la default
        });
    }

    // Usuarios normales que siguen redactores
    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'redactor_id');
    }

    // Redactores que tstienen seguidores
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'redactor_id', 'follower_id');
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
