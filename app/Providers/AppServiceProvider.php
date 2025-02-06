<?php

namespace App\Providers;

use App\Policies\AbsencePolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();
        Gate::define('edit', [AbsencePolicy::class, 'edit']);
        // Gate::define('edit-absence', function (User $user, Absence $absence) {
        //     return $absence->user->is($user);
        // });
    }
}
