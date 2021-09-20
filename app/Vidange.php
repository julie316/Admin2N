<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vidange extends Model
{
    protected $fillable = ['vehicule_id','date_vid','type_huile','km_fixe','km_actuel','km_futur'];
    public $timestamps = false;

    public function getTypeHuileAttribute($attribute)
    {
        return $this->getHuileOption()[$attribute];
    }

    public function getHuileOption()
    {
        return[
            '0'=>'5W40',
            '1'=>'10W40',
            '2'=>'15W40'
        ];
    }

    public function vehicule()
    {
        return $this->belongsTo('App\Vehicule');
    }
}
