<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Organizer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    public function definition()
    {
        return [
            'name'         => $this->faker->sentence(3),
            'description'  => $this->faker->paragraph(3),
            'type'         => $this->faker->randomElement(['Seminar', 'Rabotilnica', 'Predavanje', 'Meetup']),
            'date'         => $this->faker->dateTimeBetween('now', '+1 year'),
            'organizer_id' => Organizer::factory(),
        ];
    }
}
