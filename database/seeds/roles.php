<?php

use Illuminate\Database\Seeder;

class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
           'role'=>'admin',
            'permission'=>'login'
        ]);
        DB::table('roles')->insert([
            'role'=>'staff',
            'permission'=>'login'
        ]);
        DB::table('roles')->insert([
            'role'=>'user',
            'permission'=>''
        ]);
    }
}
