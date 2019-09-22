<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         for($i=0;$i<10;$i++){

            DB::table('requests')->insert([
                'originAirport'=>"mumbai airport$i",
                'serviceCode'=>Str::random(10),
                'flightNumber'=>'BA2640',
                'adults'=> 2,
                'children'=>2,
                'classOfTravel_id'=>1,
                'arrivalTime'=>'9 AM',
                'arrivalDate'=>date("Y-m-d"),
                'service_type_id'=>1,
                'service_id'=>4,
                'message'=>'test',
                'titleName'=>'Mr',
                'firstName'=>"first name$i",
                'lastName'=>"last name$i",
                'email'=>"test@gmail.com$i",
                'contactNumber'=>'+971528070686',
                'request_status_id'=>($i<7)?$i + 1:7,
                'isDelete'=>false,
                'payment_method_id'=>1
            ]);

        }
        
    }
}
