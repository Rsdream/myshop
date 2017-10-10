<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class RbacServiceProcider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('permission', function ($expression) {
            return "<?php if (\\App\Model\Admin\\AdminUser::hasPermission($expression)): ?>";
        });

        Blade::directive('endpermission', function ($expression) {
            return "<?php endif; ?>";
        });
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
