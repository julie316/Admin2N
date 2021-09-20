<?php

namespace App\Policies;

use App\Acteur;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActeurPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \  $
     * @param  \App\Acteur  $acteur
     * @return mixed
     */
    public function view(Acteur $acteur)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \  $
     * @return mixed
     */
    public function create()
    {
        return in_array(Auth()->user()->role, [
            0
        ]);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \  $
     * @param  \App\Acteur  $acteur
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
     * @param  \  $
     * @param  \App\Acteur  $acteur
     * @return mixed
     */
    public function delete()
    {
        return in_array(Auth()->user()->role, [
            0
        ]);
    }

}
