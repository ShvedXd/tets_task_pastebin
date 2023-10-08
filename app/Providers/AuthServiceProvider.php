<?php

namespace App\Providers;

use App\Http\Controllers\Paste\ShowAnyController;
use App\Http\Controllers\Paste\ShowController;
use App\Http\Controllers\Paste\StoreController;
use App\Models\Paste;
use App\Policies\PastePolicy;
use App\Policies\UserPolicy;
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
        ShowController::class => PastePolicy::class,
        StoreController::class => PastePolicy::class,



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
