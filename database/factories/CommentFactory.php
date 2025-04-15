<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Comment;
use App\Models\User;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'content' => fake()->paragraphs(3, true),
            'date' => fake()->dateTime(),
            'rate' => fake()->randomElement(["0","1","2","3","4","5"]),
            'user_id' => User::factory(),
        ];
    }
}
