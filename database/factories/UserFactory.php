<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'nom' => $this->faker->name,
            'prenom' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => Str::random(10),
            'nom_garage' => 'dasffwewwe',
            'logo_garage' => 'fsdfsdfsdf',
            'fixe' => '3463463463',
            'fax' => 'fsdfsdfsdfsdfsdfsdfsd',
            'ville' => 'fsdfsdfsdfsdsdfsd',
            'adresse' => 'fsdfsdfsdfsdfsd',
            'code_postal' => 'fsdfsdgsdgsdgsd',
            'rc' => 'sdfsdgsdtstsdfsdf',
            'if' => 34,
            'ice' => 6,
            'pack_end_date' => '9999-12-31',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
