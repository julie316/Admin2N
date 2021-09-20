<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bilan extends Model
{
    protected $fillable = ['mois','balance'];
    public $timestamps = false;
}
