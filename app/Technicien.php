<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technicien extends Model
{
    protected $fillable = [
        'nom_tech',
        'tel_tech',
        'number',
        'email_tech',
        'metier',
        'cni',
        'local_atelier',
        'ville',
        'contrat'
    ];

    public $timestamps = false;

    public function paiements()
    {
        return $this->hasMany('App\Paiement');
    }

    public function maintenances()
    {
        return $this->hasMany('App\Maintenance');
    }
}
