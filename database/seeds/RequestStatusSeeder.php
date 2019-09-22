<?php

use Illuminate\Database\Seeder;

class RequestStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status =[ 
            [
                'title'=>'pending',
                'className'=>'badge-light',
            ],
            [
                'title'=>'not responded',
                'className'=>'badge-danger',
            ],
            [
            'title'=>'processing',
            'className'=>'badge-primary',
            ],
            [
                'title'=>'processed',
                'className'=>'badge-secondary',
            ],
            [
                'title'=>'payment updated',
                'className'=>'badge-info',
            ],
            [
                'title'=>'payment success',
                'className'=>'badge-success',
            ],
            [
                'title'=>'closed',
                'className'=>'badge-warning',
            ],
            [
                'title'=>'refund',
                'className'=>'badge-dark',
            ],
            [
                'title'=>'bank payment',
                'className'=>'alert-success',
            ],
            
        ];
            foreach($status as $sta){
                DB::table('request_status')->insert([
                    'title'=>$sta['title'],
                    'className'=>$sta['className'],
                    'status'=>true
                    ]);
            }
       
    }
}
