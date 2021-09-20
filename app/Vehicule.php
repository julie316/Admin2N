<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $fillable = ['proprietaire_id','acteur_id', 'marque', 'matricule', 'type_veh', 'litre_huile','nature_carbur'];
    public $timestamps = false;

    public function getNatureCarburAttribute($attribute)
    {
        return $this->getNatureOption()[$attribute];
    }

    public function getNatureOption()
    {
        return[
            '0'=>'Gazole',
            '1'=>'Super'
        ];
    }

    public function proprietaire()
    {
        return $this->belongsTo('App\Proprietaire');
    }

    public function dossiers()
    {
        return $this->hasMany('App\Dossier');
    }

    public function vidanges()
    {
        return $this->hasMany('App\Vidange');
    }

    public function maintenances()
    {
        return $this->hasMany('App\Maintenance');
    }
}
