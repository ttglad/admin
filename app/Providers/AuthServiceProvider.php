<?php

namespace App\Providers;

use App\Models\Permission;
//use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        try{
            //
            $permissions = Permission::with('roles')->get();
            foreach ($permissions as $permission) {
                Gate::define($permission->name, function($user) use ($permission) {
                    return $user->hasPermission($permission);
                });
            }
        } catch (\Exception $e) {

        }
    }
}
