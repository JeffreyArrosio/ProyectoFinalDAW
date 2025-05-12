<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'content' => fake()->paragraphs(3, true),
            'date' => fake()->dateTime(),
            'main_image' => "https://picsum.photos/id/".$this->faker->randomNumber(3)."/300/300",
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'user_id' => User::where('admin', 1)
                ->orWhere('type', 'writer')->inRandomOrder()->first()->id ?? User::factory(),
        ];
    }
}
