<?php

namespace App\Policies;

use App\Acteur;
use App\EntreeCaisse;
use Illuminate\Auth\Access\HandlesAuthorization;

class EntreeCaissePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \  $
     * @param  \App\EntreeCaisse  $entreeCaisse
     * @return mixed
     */
    public function update()
    {
        return in_array(Auth()->user()->role, [
            0,1
        ]);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Acteur  $acteur
     * @param  \App\EntreeCaisse  $entreeCaisse
     * @return mixed
     */
    public function delete()
    {
        return in_array(Auth()->user()->role, [0]);
    }
}
