<?php

use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $strJsonFileContents = file_get_contents("database/data/Testimonial.json");
      $array = json_decode($strJsonFileContents, true);
          for($i=0;$i<count($array['results']);$i++)
              DB::table('testimonials')->insert([
                  'shortDescription'=>(isset($array['results'][$i]['shortDescription'])?$array['results'][$i]['shortDescription']:""),
                  'lastName'=>(isset($array['results'][$i]['lastName'])?$array['results'][$i]['lastName']:""),
                  'firstName'=>(isset($array['results'][$i]['firstName'])?$array['results'][$i]['firstName']:""),
                  'priority'=>(isset($array['results'][$i]['priority'])?$array['results'][$i]['priority']:""),
                  'status'=>true,
                  'title'=>(isset($array['results'][$i]['title'])?$array['results'][$i]['title']:""),
                  'description'=>(isset($array['results'][$i]['description'])?$array['results'][$i]['description']:""),
                  'image'=>'testimonial_image'.$i,
              ]);
    }
}
