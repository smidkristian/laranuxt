<?php

namespace Database\Factories;

use App\Models\Lead;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lead::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer' => $this->faker->name,
            'country' => $this->faker->country,
            'brand' => $this->faker->word(),
            'promoevent' => $this->faker->text(250),
            'agency' => 'Eventuality',
            'date' => $this->faker->date(),
            'status' => 'Processing'
        ];
    }
}
