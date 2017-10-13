<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ShareUserDataProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            [
              'index',
              'Home/goods/shop',
              'Home/search',
              'Home/cart/cart',
              'Home/goods/simple_product',
              'Home/user/information',
              'Home/user/my_account',
              'Home/user/address',
              'Home/user/edit',
              'Home/user/add',
              'Home/collection/collection',
            ],
            'App\Http\ViewComposers\ProfileComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
