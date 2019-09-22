<?php

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $strJsonFileContents = file_get_contents("database/data/Blog.json");
      $array = json_decode($strJsonFileContents, true);
          for($i=0;$i<count($array['results']);$i++){
            $imageUrl = $array['results'][$i]['image']['url'];
            $fileName = $array['results'][$i]['image']['name'];
            $file = file_get_contents($imageUrl);
            $save = file_put_contents( public_path("images/blog/").$fileName, $file);
            if($save){
              DB::table('blogs')->insert([
                  'title'=>(isset($array['results'][$i]['actualTitle'])?$array['results'][$i]['actualTitle']:ucwords(preg_replace('/\s+/', ' ', trim($array['results'][$i]['title'])))),
                  'content'=>(isset($array['results'][$i]['content'])?$array['results'][$i]['content']:""),
                  'blog_category_id'=>(isset($array['results'][$i]['category'])?$array['results'][$i]['category']:""),
                  'tags'=>(isset($array['results'][$i]['tags'])?$array['results'][$i]['tags']:""),
                  'type'=>(isset($array['results'][$i]['type'])?$array['results'][$i]['type']:""),
                  'status'=>(isset($array['results'][$i]['status'])?$array['results'][$i]['status']:""),
                  'image'=>$fileName,
                  'commentsCount'=>(isset($array['results'][$i]['commentsCount'])?(int)$array['results'][$i]['commentsCount']:null),
              ]);
            }

          }
    }
}
