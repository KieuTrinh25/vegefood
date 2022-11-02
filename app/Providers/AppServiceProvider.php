<?php

namespace App\Providers;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $repositories = [
        \App\Http\Repositories\Product\ProductRepositoryInterface::class => \App\Http\Repositories\Product\ProductRepository::class,
        \App\Http\Repositories\Category\CategoryRepositoryInterface::class => \App\Http\Repositories\Category\CategoryRepository::class,
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $repository) {
            App::bind($interface, $repository);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try{
            $categoryList = Category::all();
            View::share('categoryList', $categoryList);
        }catch(Exception $ex){}
    }
}
