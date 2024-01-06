<?php

namespace App\Providers;

use App\Policies\ManagerPolicy;
use App\Policies\DeveloperPolicy;
use App\Policies\LeadDevPolicy;
use App\Policies\ProjectPolicy;
use App\Policies\StatusPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Manager;
use App\Models\Developer;
use App\Models\LeadDev;
use App\Models\Project;
use App\Models\Status;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Manager::class => ManagerPolicy::class,
        Developer::class=>DeveloperPolicy::class,
        LeadDev::class=>LeadDevPolicy::class,
        Project::class=>ProjectPolicy::class,
        Status::class=>StatusPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('isManager', function ($user){
            return $user->user_level == 0;
        });
        Gate::define('isLeadDeveloper', function ($user){
            return $user->user_level == 1;
        });
        Gate::define('isDeveloper', function ($user){
            return $user->user_level == 2;
        });
    }

}
