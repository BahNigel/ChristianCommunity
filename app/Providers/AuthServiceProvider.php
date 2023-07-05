<?php

namespace App\Providers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerPolicies();

        // $roles = [
        //     'admin',
        //     'user',
        // ];

        // foreach ($roles as $role) {
        //     Role::create(['name' => $role]);
        // }

        // $permissions = [
        //     'create-post',
        //     'edit-post',
        //     'delete-post',
        // ];

        // foreach ($permissions as $permission) {
        //     Permission::create(['name' => $permission]);
        // }

        // Role::findByName('admin')->givePermissionTo(Permission::all());
        // Role::findByName('user')->givePermissionTo('create-post');

        // Gate::define('isAdmin', function ($user) {
        //     return $user->hasRole('admin');
        // });

        // Gate::define('isUser', function ($user) {
        //     return $user->hasRole('user');
        // });
    }
}
