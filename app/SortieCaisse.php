<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SortieCaisse extends Model
{
    protected $table = 'sortie_caisses';
    protected $fillable = ['acteur_id','rubrique_id','libelle_sort_cais','date_sort_cais','beneficiaire','mont_sort'];
    public $timestamps = false;

    public function rubrique()
    {
        return $this->belongsTo('App\Rubrique');
    }
}
