<?php

use Illuminate\Database\Seeder;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = ['mr','mrs','dr','miss','mis'];
        for($i=0;$i<count($title);$i++){
            DB::table('titles')->insert([
            'title'=>$title[$i],
            'status'=>true   
            ]);
        }

    }
}
