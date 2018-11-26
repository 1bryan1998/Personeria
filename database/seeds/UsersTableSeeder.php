<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert(['name'=>'Admin','email'=>'Administador@gmail.com','password'=>\Illuminate\Support\Facades\Hash::make('admin'),'foto'=>'avatar.png']);
        \DB::table('users')->insert(['name'=>'User','email'=>'User@gmail.com','password'=>\Illuminate\Support\Facades\Hash::make('user'),'foto'=>'avatar.png']);

    }
}
