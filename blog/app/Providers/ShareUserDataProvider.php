<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ShareUserDataProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     * @author rong <[<871513137@qq.com>]>
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
                'Home/order/show',
                'Home/order/commentlist',
                'Home/order/comment',
                'Home/order/check',
                'Home/success/success',
                'Home/order/backlist',
                'Home/order/back',
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
