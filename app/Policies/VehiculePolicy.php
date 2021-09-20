<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Vehicule;

class VehiculePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update()
    {
        return in_array(Auth()->user()->role, [
            0
        ]);
    }
}
