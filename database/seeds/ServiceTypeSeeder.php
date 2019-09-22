<?php

use Illuminate\Database\Seeder;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $services = [   'Limousine',
            'Arrival',
            'Lounge Services',
            'Departure',
            'Transfer / Transit'
        ];
        for($i=0;$i<count($services);$i++){
            DB::table('service_types')->insert([
            'title'=>$services[$i],
            'status'=>true   
            ]);
        }

    }
}
