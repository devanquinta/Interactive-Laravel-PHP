<?php

namespace App\Providers;

use App\Resource;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Topic' => 'App\Policies\TopicPolicy',
    ];
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        try {
            if (!(Schema::hasTable('resources'))) {
                return null;
            }
            $resources = Resource::all();
            foreach ($resources as $resource) {
                Gate::define(
                    $resource->resource,
                    function ($user) use ($resource) {
                        return $resource->roles->contains($user->role);
                    }
                );
            }
        } catch (\Exception) {
            return null;
            return false;
        }

    }
}