<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntreeCaisse extends Model
{
    public $table = 'entreecaisses';
    public $timestamps = false;
    protected $fillable = ['acteur_id','depositaire','libelle_ent_cais','date_ent_cais','mont_ent'];
}
