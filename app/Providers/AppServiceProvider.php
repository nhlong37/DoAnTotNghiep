<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\TableProduct;
use Illuminate\Support\Facades\View;


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
        Paginator::useBootstrap();
        $min_price = TableProduct::min('price_regular');
        $max_price = TableProduct::max('price_regular');
        $min_price_range = $min_price + 1000000;
        $max_price_range = $max_price + 1000000;
        View::share([
            'min_price' => $min_price,
            'max_price' => $max_price,
            'min_price_range' => $min_price_range,
            'max_price_range' => $max_price_range
        ]);
    }
}
