<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Models\Task' => 'App\Policies\TaskPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
