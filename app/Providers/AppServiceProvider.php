<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\Services\Entities\Service;
use Modules\Blog\Entities\Blog;

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
        Schema::defaultStringLength(191);
        View::composer('frontend.layouts.footer', function ($view) {
            $service = Service::pluck('name', 'slug');
            $blog = Blog::latest()->take(4)->get();
            $view->with(['services' => $service, 'blogs'=>$blog]);

        });
    }
}
