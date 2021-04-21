<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    use HasFactory;

    public function cars() {
        return $this->hasMany(User::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'boutique_en_ligne',
        'espace_de_gestion_boutique',
        'table_de_bord_boutique',
        'pages_descriptifs_de_la_boutique',
        'nombre_de_voitures',
        'acces_aux_annonce_particuliers',
        'position_gps',
        'bannieres',
        'charte_visuel',
        'email_pro',
        'gestion_des_commandes',
        'service_acceuil_telephonique',
        'transfert_des_leads_vers_showroom',
        'partage_de_la_liste_des_leads',
        'prise_des_photos_des_voitures',
        'videos_promo',
        'fiches_techniques',
        'assistnace',
        'conseil_et_accompagnement',
        'identite_visuelle',
        'flag',
        'cartes',
        'pub_rs',
        'interviews_showroom',
        'logo_flyers',
        'logo_acceuil',
        'logo_panneau',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];
}
