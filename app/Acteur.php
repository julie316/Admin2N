<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class Acteur extends Model implements Authenticatable
{
    use BasicAuthenticatable;

    protected $fillable = ['nom_act','prenom_act','tel_act','email_act','pseudo', 'mot_passe','role'];
    public $timestamps = false;

    public function getRoleAttribute($attribute)
    {
        return $this->getRoleOption()[$attribute];
    }

    public function getRoleOption()
    {
        return[
            '0'=>'Administrateur',
            '1'=>'Sécrétaire'
        ];
    }

    public function isAdmin()
    {
        return Auth::user()->role === 0;
    }

    public function isComptable()
    {
        return Auth::user()->role === 1;
    }

    public function isSecretaire()
    {
        return Auth::user()->role === 2;
    }

}
