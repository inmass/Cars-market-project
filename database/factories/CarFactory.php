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
            'marque' => 'BMW',
            'modele' => 'Rad 1',
            'version' => '2021',
            'carburant' => 'Escence',
            'boite_de_vitesse' => 'Manuelle',
            'annee_mise_en_circulation' => '1964 ou plus ancien',
            'dedouane' => 'Non, acheee au maric (WW)',
            'kilometrage' => '0 - 4 999',
            'couleur' => 'Argent',
            'images' => serialize(['16217423431620323641photo-1597404294360-feeeda04612e.jpeg', '16217423431620323641Transpo_G70_TA-518126.jpg']),
            'carrosserie' => 'Cabriolet',
            'portes' => '1',
            'puissance_fiscale' => '2' ,
            'premiere_main' => 1,
            'garantie' => 1,
            'options' => serialize(['Climatisation auto', 'Projecteurs xénons', 'Vitres surteintées', 'Keyless go']),
            'prix' => '50000',
            'user_id' => 17
        ];
    }
}
