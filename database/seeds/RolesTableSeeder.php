<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert(['name'=>'Admin','display_name'=>'Administador']);
               \DB::table('roles')->insert(['name'=>'User','display_name'=>'Usuario']);
    }
}