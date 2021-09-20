<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntreeStock extends Model
{
    protected $fillable = ['acteur_id','libelle_stock','qte_stock','qte_reste','date_entree_st','famille'];
    public $timestamps = false;
    public $table = 'stocks';

    public function getFamilleAttribute($attribute)
    {
        return $this->getFamilleOption()[$attribute];
    }

    public function getFamilleOption()
    {
        return[
            '1'=>'Autres',
            '2'=>'Electricité',
            '3'=>'Electroménager',
            '4'=>'Informatique',
            '5'=>'Luminaires',
            '6'=>'Maçonnerie',
            '7'=>'Matériel de bureau',
            '8'=>'Matériel Entretien',
            '9'=>'Peinture',
            '10'=>'Pièce Camion',
            '11'=>'Plomberie',
        ];
    }

    public function sortie_stocks()
    {
        return $this->hasMany('App\SortieStock');
    }
}
