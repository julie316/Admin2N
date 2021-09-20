<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class RubriquePolicy
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

    public function view()
    {
        return in_array(Auth()->user()->role, [
            0,1
        ]);
    }

    public function delete()
    {
        return in_array(Auth()->user()->role, [
            0
        ]);
    }
}
