<?php

namespace Database\Factories;
use Illuminate\Support\Arr;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = [
            'new',
            'progress',
            'done'
        ];

        return [
            'title' => $this->faker->words(3, 6),
            'descriptions' => $this->faker->sentence,
            'file' => 'files/image_processing20210905-12024-1bz1uo4.gif',
            'status' => $this->faker->randomElement($status),
            'project_id' => random_int(1, 10)
        ];
    }
}
