<?php

namespace App\Providers;

use App\Models\Activity;
use App\Models\Task;
use App\Models\TaskType;
use App\Models\User;
use App\Policies\ActivityPolicy;
use App\Policies\TaskPolicy;
use App\Policies\TaskTypePolicy;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Task::class => TaskPolicy::class,
        TaskType::class => TaskTypePolicy::class,
        Activity::class => ActivityPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('owner-role',function(User $user){
            return $user->role == '2';
        });

        Gate::define('admin-role',function(User $user){
            return $user->role != '0';
        });

    }
}
