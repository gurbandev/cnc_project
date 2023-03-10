<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        Paginator::useBootstrapFive();
        Model::preventLazyLoading(!app()->isProduction());

        View::composer('app.nav', function ($view){

            $products = Product::orderBy('id', 'desc')
                ->get();

           $categories = Category::orderBy('id')
               ->get();

           $view->with([
              'categories' => $categories,
               'products' => $products,
           ]);
        });

        View::composer('app.sidebar', function ($view){

            $categories = Category::whereNull('parent_id')
                ->with('children.children')
                ->get();

            $view->with([
                'categories' => $categories,
            ]);
        });
    }
}
