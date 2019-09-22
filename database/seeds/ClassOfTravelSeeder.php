<?php

use Illuminate\Database\Seeder;
use \App\ClassOfTravel;

class ClassOfTravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['economy','buisness','first','premium economy'];
        foreach($titles as $key=>$value){
            ClassOfTravel::create([
                'title'=>$value,
                'status'=>true
            ]);
        }
        
    }
}
