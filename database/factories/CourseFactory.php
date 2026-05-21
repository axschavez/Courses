<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(3);

        return [
            'user_id'     => User::factory(),
            'title'       => $title,
            'slug'        => Str::slug($title) . '-' . time(),
            'description' => fake()->paragraph(3),
            'price'       => fake()->randomElement([0, 9.99, 19.99, 49.99, 99.99]),
            'level'       => fake()->randomElement(['beginner', 'intermediate', 'advanced']),
            'status'      => fake()->randomElement(['draft', 'published']),
            'thumbnail'   => null,
        ];
    }
}
