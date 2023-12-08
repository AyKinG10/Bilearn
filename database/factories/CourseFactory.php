<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'Name' => $this->faker->name,
            'Description' => $this->faker->text,
            'Wallpaper' => $this->faker->text,
            'Videos' => $this->faker->text,
            'Price' => $this->faker->buildingNumber,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
