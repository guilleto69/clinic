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
        'App\Appointment' => 'App\Policies\AppointmentPolicy',
        'App\Invoice' => 'App\Policies\InvoicePolicy',
        'App\Permission' => 'App\Policies\PermissionPolicy',
        'App\Role' => 'App\Policies\RolePolicy',        
        'App\User' => 'App\Policies\UserPolicy',
        'App\Speciality' => 'App\Policies\SpecialityPolicy',
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
