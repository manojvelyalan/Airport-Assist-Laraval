<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use \App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstName' => "Manoj",
            'email' => "manojvelyalan@gmail.com ",
            'username' =>"manojvelyalan@gmail.com ",
            'lastName' => "Velyalan",
            'department_id' => 1,
            'isAdmin'=>true,
            'isDelete'=>false,
            'status'=>true,
            'password' => Hash::make('Pass@1234'),
        ]);
    }
}
