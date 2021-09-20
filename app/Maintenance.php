<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = ['technicien_id','vehicule_id','type_maint','libelle_maint','date_debut','date_fin','mont_maint','observation','facture'];
    public $timestamps = false;

    public function vehicule()
    {
        return $this->belongsTo('App\vehicule');
    }

    public function technicien()
    {
        return $this->belongsTo('App\Technicien');
    }
}
