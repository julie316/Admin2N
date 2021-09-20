<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = [
        'technicien_id',
        'objet',
        'mont_paie',
        'avance',
        'date_paie'
    ];

    public $timestamps = false;

    public function technicien()
    {
        return $this->belongsTo('App\Technicien');
    }

    public function versements()
    {
        return $this->hasMany('App\Versement');
    }
}
