<?php

use Illuminate\Database\Seeder;
use \App\Action;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Action::create([
            'title'=>'view action',
            'status'=>true,
        ]);

        Action::create([
            'title'=>'update action',
            'status'=>true,
        ]);
        Action::create([
            'title'=>'delete action',
            'status'=>true,
        ]);
        Action::create([
            'title'=>'create action',
            'status'=>true,
        ]);
    }
}
