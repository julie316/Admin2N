<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proprietaire extends Model
{
    protected $fillable = ['nom_prop', 'tel_prop','tel_num', 'email_prop', 'quartier', 'ville'];
    public $timestamps = false;

    public function vehicules()
    {
        return $this->hasMany('App\Vehicule');
    }
}
