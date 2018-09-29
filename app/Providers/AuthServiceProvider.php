<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
    public function defineGate($name) {
        Gate::define($name, function($user) {
            if($user->hasPermission($name) 
            || $user->is_admin == 1) {
                return true;
            }
            return false;
        });
    }

    public function boot()
    {
        $this->registerPolicies();

        //
        $user = \Auth::user();

        // Service Provider
        $this->defineGate('show-phoneservice');
        $this->defineGate('update-phoneservice');
        $this->defineGate('delete-phoneservice');

        $this->defineGate('show-serviceproduct');
        $this->defineGate('update-serviceproduct');
        $this->defineGate('delete-serviceproduct');

        $this->defineGate('show-servicemodel');
        $this->defineGate('update-servicemodel');
        $this->defineGate('delete-servicemodel');

        // Human Resource
        $this->defineGate('show-employee');
        $this->defineGate('update-employee');
        $this->defineGate('delete-employee');

        $this->defineGate('show-department');
        $this->defineGate('update-department');
        $this->defineGate('delete-department');

        $this->defineGate('show-employeesalary');
        $this->defineGate('update-employeesalary');
        $this->defineGate('delete-employeesalary');

        $this->defineGate('show-status');
        $this->defineGate('update-status');
        $this->defineGate('delete-status');

        $this->defineGate('show-employeelist');
        $this->defineGate('update-employeelist');
        $this->defineGate('delete-employeelist');

        $this->defineGate('show-salary');
        $this->defineGate('update-salary');
        $this->defineGate('delete-salary');
        
    }
}
