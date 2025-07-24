<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use Illuminate\Support\Facades\View;


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
     Paginator::useBootstrap();
    View::composer('*', function ($view) {
        // Load categories with subcategories and childcategories
        $fashionCategory = Category::with('subcategories.childcategories')
            ->where('name', 'Fashion')
            ->first();
        $electronicsCategory = Category::with('subcategories')->where('name','Electronics')->first();
        $homeKitchenCategory = Category::with('subcategories')->where('name','Home & Kitchen')->first();
        $healthBeautyCategory = Category::with('subcategories')->where('name','Health & Beauty')->first();

        $view->with([
            'fashionCategory' => $fashionCategory,
            'electronicsCategory' => $electronicsCategory,
            'homeKitchenCategory' =>$homeKitchenCategory,
            'healthBeautyCategory' => $healthBeautyCategory
    ]);
    });
}
}
