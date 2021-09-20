<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    protected $fillable = [
        'vehicule_id',
        'categorie',
        'libelle_dos',
        'date_souscrip',
        'duree',
        'date_expire',
        'document',
        'matricule_veh'
    ];
    public $timestamps = false;
    // Categorie
    public function getCategorieAttribute($attribute)
    {
        return $this->getCateOption()[$attribute];
    }

    public function getCateOption()
    {
        return[
            '1'=>'Administration',
            '2'=>'Camion',
            '3'=>'Véhicule de Tourisme'
        ];
    }
    // Libellé du dossier
    public function getLibelleDosAttribute($attribute)
    {
        return $this->getLibOption()[$attribute];
    }

    public function getLibOption()
    {
        return[
            '1'=>'Assurance',
            '2'=>'Attestation de Non-Redevance',
            '3'=>'Carte Bleu',
            '4'=>'Carte de Contribuable',
            '5'=>'Carte Grise',
            '6'=>'Licence Transport',
            '7'=>'Plan de Localisation',
            '8'=>'Registre de Commerce',
            '9'=>'Stationnement',
            '10'=>'Taxe Foncière',
            '11'=>'Taxe à l\'Essieu',
            '12'=>'Visite Technique'
        ];
    }
    // Type de camion
    public function getTypeCamionAttribute($attribute)
    {
        return $this->getTypeOption()[$attribute];
    }

    public function getTypeOption()
    {
        return[
            '0'=>'Remorque',
            '1'=>'Tracteur',
            ''=>null
        ];
    }

    public function vehicule()
    {
        return $this->belongsTo('App\Vehicule');
    }
}
