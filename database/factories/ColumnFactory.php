<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Column;
use App\Models\News;
use App\Models\User;

class ColumnFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Column::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'content' => fake()->paragraphs(3, true),
            'date' => fake()->dateTime(),
            'news_id' => News::factory(),
            'user_id' => User::factory(),
        ];
    }
}
