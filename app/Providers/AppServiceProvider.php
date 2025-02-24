<?php

namespace App\Providers;
use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
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
    public function boot() :void
    {

        Gate::define('edit-post',function (User $user,Post $post){
            return $post->user->is($user);
        });

        Model::preventLazyLoading();
        Paginator::useBootstrap();

    }
}
