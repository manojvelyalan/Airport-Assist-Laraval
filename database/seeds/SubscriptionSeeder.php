<?php

use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $jsonData = File::get("database/data/SubscribeList.json");
      $subscriptions = json_decode($jsonData)->results;

      foreach($subscriptions as $subscription){
         if(isset($subscription->email)){
              DB::table('subscriptions')->insert([
                  'email'=>$subscription->email,
              ]);
          }
          $title = str_replace(' ','-',$request->title);
          successFlash('Successfully created the comments.');
          return redirect("traveltips/$request->blog_id/$title");
      }
    }
}
