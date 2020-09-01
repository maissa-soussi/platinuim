<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $fillable = [
        'categorie_id', 'matricule', 'vehicule', 'carburant', 'nb_cyl', 'puissance_fiscale', 'nb_vit', 'couleur', 'options', 'alertes', 'reparations', 'visites_tech', 'vidanges', 'vignettes', 'assurences', 'photo', 'status',
    ];

    public function categorie(){
        return $this->belongsTo('App\Categorie', 'categorie_id');
    }
}
