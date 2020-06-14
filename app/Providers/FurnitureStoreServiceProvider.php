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
        require_once app_path() . '/Helpers/FurnitureStore/Showmenus.php';
        require_once app_path() . '/Helpers/FurnitureStore/Permission.php';
        require_once app_path() . '/Helpers/FurnitureStore/Show_categories.php';
        require_once app_path() . '/Helpers/FurnitureStore/Show_products.php';
        require_once app_path() . '/Helpers/FurnitureStore/Product_images.php';
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
