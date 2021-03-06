<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function pack() {
        return $this->belongsTo(Pack::class);
    }
    public function cars() {
        return $this->hasMany(Car::class);
    }
    public function messages() {
        return $this->hasMany(Message::class);
    }

    // check if user can add more cars
    public function canAddCar() {
        $number_of_cars = $this->cars->where('visible', '=', 1)->count();
        $cars_limit = $this->pack->nombre_de_voitures;
        if ($number_of_cars < $cars_limit) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'phone',
        'nom_garage',
        'logo_garage',
        'fixe',
        'fax',
        'ville',
        'adresse',
        'code_postal',
        'rc',
        'if',
        'ice',
        'pack_end_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pack_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
