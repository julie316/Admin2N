<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Versement extends Model
{
    protected $fillable = ['paiement_id','mont_verse','date_verse','mode_paiement'];
    public $timestamps = false;
    
    public function getModePaiementAttribute($attribute)
    {
        return $this->getModeOption()[$attribute];
    }

    public function getModeOption()
    {
        return[
            '1'=>'Orange Money',
            '2'=>'Mobile Money',
            '3'=>'Espèce (Cash)'
        ];
    }

    public function paiement()
    {
        return $this->belongsTo('App\Paiement');
    }
}
