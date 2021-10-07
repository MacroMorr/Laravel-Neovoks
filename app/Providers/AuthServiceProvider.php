<?php

namespace App\Providers;

use App\Integration\Database\Post;
use App\User;
use http\Env\Response;
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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-user-post', function (User $user, Post $post) {
            if($user->id == $post->name) {
                return Response::allow();
            }
        });

        //
    }
}
