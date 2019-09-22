<?php

use Illuminate\Database\Seeder;
use \App\Department;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'title'=>'super admin',
            'status'=>true,
            'role'=>json_encode(["13"])
        ]);

        Department::create([
            'title'=>'admin',
            'status'=>true,
            'role'=>json_encode([])
        ]);
        Department::create([
            'title'=>'operation',
            'status'=>true,
            'role'=>json_encode([])
        ]);
        Department::create([
            'title'=>'marketing',
            'status'=>true,
            'role'=>json_encode([])
        ]);
    }
}
