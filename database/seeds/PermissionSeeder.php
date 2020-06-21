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
        Permission::create(['name' => 'detail products']);
//        User
        Permission::create(['name' => 'view roles for users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'add roles for users']);
        Permission::create(['name' => 'view customers']);
        Permission::create(['name' => 'view users']);
        //       categories
        Permission::create(['name' => 'delete categories']);
        Permission::create(['name' => 'add categories']);
        Permission::create(['name' => 'edit categories']);
        Permission::create(['name' => 'view categories']);
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
        Permission::create(['name' => 'delete discount codes']);
        Permission::create(['name' => 'add discount codes']);
        Permission::create(['name' => 'edit discount codes']);
        Permission::create(['name' => 'view discount codes']);
        //  manufacture
        Permission::create(['name' => 'delete made in']);
        Permission::create(['name' => 'add made in']);
        Permission::create(['name' => 'edit made in']);
        Permission::create(['name' => 'view made in']);
        //contact
        Permission::create(['name' => 'view contacts']);
        //import invoices
        Permission::create(['name' => 'view invoices']);
        Permission::create(['name' => 'delete import invoices']);
        Permission::create(['name' => 'add import invoices']);
        Permission::create(['name' => 'edit import invoices']);
        Permission::create(['name' => 'view import invoices']);
        Permission::create(['name' => 'add import invoices for new product']);
        // or may be done by chaining
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
        $user = \App\User::find(1);
        $user->syncRoles($role);
    }
}
