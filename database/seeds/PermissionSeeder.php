<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
//        Login
        Permission::create(['name' => 'login']);
//        Product
        Permission::create(['name' => 'add products']);
        Permission::create(['name' => 'view products']);
        Permission::create(['name' => 'edit products']);
        Permission::create(['name' => 'delete products']);
//        User
        Permission::create(['name' => 'add role to users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'add users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'view users']);
        //       categories
        Permission::create(['name' => 'delete categories']);
        Permission::create(['name' => 'add categories']);
        Permission::create(['name' => 'edit categories']);
        Permission::create(['name' => 'view categories']);
        //       menus
        Permission::create(['name' => 'delete menus']);
        Permission::create(['name' => 'add menus']);
        Permission::create(['name' => 'edit menus']);
        Permission::create(['name' => 'view menus']);
        //  slides
        Permission::create(['name' => 'delete slides']);
        Permission::create(['name' => 'add slides']);
        Permission::create(['name' => 'edit slides']);
        Permission::create(['name' => 'view slides']);
        //  roles
        Permission::create(['name' => 'delete roles']);
        Permission::create(['name' => 'add roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'view roles']);
        //  comments
        Permission::create(['name' => 'delete comments']);
        Permission::create(['name' => 'add comments']);
        Permission::create(['name' => 'edit comments']);
        Permission::create(['name' => 'view comments']);
        //  discount code
        Permission::create(['name' => 'delete discount code']);
        Permission::create(['name' => 'add discount code']);
        Permission::create(['name' => 'edit discount code']);
        Permission::create(['name' => 'view discount code']);
        //  manufacture
        Permission::create(['name' => 'delete manufacture']);
        Permission::create(['name' => 'add manufacture']);
        Permission::create(['name' => 'edit manufacture']);
        Permission::create(['name' => 'view manufacture']);

        // or may be done by chaining
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
