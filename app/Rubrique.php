<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubrique extends Model
{
    protected $fillable = ['libelle_rub', 'couleur'];
    public $timestamps = false;

    public function SortieCaisses()
    {
        return $this->hasMany('App\SortieCaisse');
    }
}
