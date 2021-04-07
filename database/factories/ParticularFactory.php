<?php

namespace Database\Factories;

use App\Models\Particular;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParticularFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Particular::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name,
            'prenom' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => '77777777777',
            'ville' => 'agadir',
        ];
    }
}
