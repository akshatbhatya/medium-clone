<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title=fake()->sentence();
        return [
            'title'=>$title,
            'content'=>fake()->paragraph(),
            'image'=>fake()->imageUrl(),
            'published_at'=>fake()->optional()->dateTime(),
            'category_id'=>fake()->numberBetween(1,8),
            'user_id'=>1,
            'slug'=>\Illuminate\Support\Str::slug($title)
        ];
    }
}
