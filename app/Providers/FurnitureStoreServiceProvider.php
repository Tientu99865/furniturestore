<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FurnitureStoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        require_once app_path() . '/Helpers/FurnitureStore/Menu.php';
        require_once app_path() . '/Helpers/FurnitureStore/Category.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
