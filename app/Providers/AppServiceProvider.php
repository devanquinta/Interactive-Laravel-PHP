<?php

namespace App\Providers;

use App\Resource;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        try {
            if (!(Schema::hasTable('resources'))) {
                return null;
            }

            $resources = Resource::all();

            foreach ($resources as $resource) {
                Gate::define($resource->resource, function ($user) use ($resource) {
                    return $resource->roles->contains($user->role);
                });
            }
        } catch (\Exception $e) {
            $message = env('APP_DEBUG') ? $e->getMessage() : 'Error! Não existe um canal';
            flash($message)->warning();
            return null;
            return false;
        }

    }
}