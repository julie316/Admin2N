<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Acteur' => 'App\Policies\ActeurPolicy',
        'App\Dossier' => 'App\Policies\DossierPolicy',
        'App\EntreeCaisse' => 'App\Policies\EntreecaissePolicy',
        'App\EntreeStock' => 'App\Policies\EntreeStockPolicy',
        'App\Maintenance' => 'App\Policies\MaintenancePolicy',
        'App\Paiement' => 'App\Policies\PaiementPolicy',
        'App\Rubrique' => 'App\Policies\RubriquePolicy',
        'App\SortieCaisse' => 'App\Policies\SortieCaissePolicy',
        'App\SortieStock' => 'App\Policies\SortieStockPolicy',
        'App\Technicien' => 'App\Policies\TechnicienPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
