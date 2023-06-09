<?php

namespace App\Providers;


use App\Models\Article;
use Illuminate\Pagination\Paginator;

use App\Models\Category;

use Illuminate\Support\Facades\View;
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


        Paginator::useBootstrapFive();

        View::share('recentArticles',Article::latest("id")->limit(5)->get());

        View::share("categories",Category::latest("id")->get());

    }
}
