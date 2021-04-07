<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'marque' => 'marque',
            'modele' => 'model',
            'version' => 'fdsfsdfsd',
            'carburant' => 'fsdfsdfsdfsd',
            'boite_de_vitesse' => 'fsdfsdfsdfsdfsd',
            'annee_mise_en_circulation' => 'fsdfsdfsdfs',
            'dedouane' => 'fsdfsdfsdgsdgsd',
            'kilometrage' => 'fdsfsdfsdfsdfsdfsd',
            'couleur' => 'fsdfsdgsdgsdgs',
            'carrosserie' => 'fsdfsdfsdgsdgsdgs',
            'portes' => '2',
            'puissance_fiscale' => 'fsdfsfsdfsd' ,
            'premiere_main' => 1,
            'garantie' => 1,
            'options' => 'fsdfsdfsdgsdgsdgsd',
        ];
    }
}
