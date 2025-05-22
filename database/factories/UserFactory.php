<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = 'standard';
        if (fake()->numberBetween(1, 100) > 80) {
            $type = 'writer';
        }
        $images = [
            "https://i.pinimg.com/1200x/dc/8a/57/dc8a57bd8fbedd276aa12de590b81a80.jpg",
            'https://i.pinimg.com/736x/22/78/cb/2278cb9755e65d7efd3f03e965b78ac5.jpg',
            "https://i.pinimg.com/736x/99/0d/16/990d16b9392d430e1d7b89eb8792bc3a.jpg",
            "https://i.pinimg.com/736x/f1/4d/d3/f14dd30afa5712fe213eecbdb41df70e.jpg",
            "https://i.pinimg.com/736x/00/58/69/0058693e87c9e00b8e321fcddd857dac.jpg",
            "https://i.pinimg.com/736x/e4/3d/3d/e43d3db9721b95c316611aa7ac5460c6.jpg",
            "https://i.pinimg.com/736x/2b/eb/48/2beb486e56bb6d556894ab42161b62bf.jpg",
            "https://i.pinimg.com/736x/2e/33/14/2e331479df3d019b7a91c94ce4a28c46.jpg",
            "https://i.pinimg.com/736x/e3/17/95/e3179580ccc5a5a6cdd24fa322991437.jpg"
        ];
        $randImg = $images[array_rand($images)];
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'img' => $randImg,
            'type' => $type,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
