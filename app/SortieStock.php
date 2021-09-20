<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SortieStock extends Model
{
    public $table = 'stock_sorties';
    public $timestamps = false;
    protected $fillable = ['stock_id','date_sortie_stock','qte_sortie','destinataire'];

    public function stock()
    {
        return $this->belongsTo('App\EntreeStock');
    }
}
