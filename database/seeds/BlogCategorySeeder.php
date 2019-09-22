<?php

use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogCategory = ['Travel Trends','Travel Tips','Travel News','Travel Money'];
        for($i=0;$i<count($blogCategory);$i++){
            DB::table('blog_categories')->insert([
                'title'=>$blogCategory[$i],
                'status'=>true
                ]);
        }
    }
}
