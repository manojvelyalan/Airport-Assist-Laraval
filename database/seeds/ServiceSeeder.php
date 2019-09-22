<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonData = File::get("database/data/Services.json");
        $services = json_decode($jsonData)->results;

        $objects = ['F0Sok9Q9Lc'=>1,'GP0yUjsI2u'=>2,'aNsrmcngGs'=>3,'RXqCYMRwi8'=>4,'cuRO5ta4bN'=>5];
        foreach($services as $service){
           if(isset($service->serviceType)){

               $serviceTypeId = $objects[$service->serviceType->objectId];

                DB::table('services')->insert([
                    'title'=>$service->title,
                    'service_type_id'=>$serviceTypeId,
                    'status'=>true
                ]);
            }

        }

    }
}
