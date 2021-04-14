<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\CarCreated;

class Car extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function particular() {
        return $this->belongsTo(Particular::class);
    }

    public function uid() {
        $uid = strval($this->id*17);
        return sprintf('c-%s', $uid);
    }
    // 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'marque',
        'modele',
        'version',
        'carburant',
        'boite_de_vitesse',
        'annee_mise_en_circulation',
        'dedouane',
        'kilometrage',
        'couleur',
        'carrosserie',
        'portes',
        'puissance_fiscale',
        'premiere_main',
        'garantie',
        'options',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'particular_id',
        'user_id',
        'token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    protected $dispatchesEvents = [
        'created' => CarCreated::class,
    ];
}
