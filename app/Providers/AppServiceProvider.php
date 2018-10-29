<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use \App\Billing\Stripe;

use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layouts.sidebar',function ($view){
            $archives = \App\Post::archives();
            $tags = \App\Tag::has('posts')->pluck('name');
            $cates = \App\Repositories\Categories::view();
            $view->with(compact('archives','tags','cates'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Stripe::class, function (){
            return new Stripe(config('services.stripe.secret'));
        });
    }
}