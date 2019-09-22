<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Subscription;
use Illuminate\Http\Request;
use App\Common;

class SubscriptionController extends Controller
{

  public function attributes(){
    return [
      'email'=>'email',
    ];
  }

  public function rules(){
    return [
      'email'=>['required','email','unique:subscriptions']
    ];
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Common::validator($request->all(), $this->rules(), $this->attributes())->validate();
        Subscription::create([
          'email'=>$request->email
        ]);
        $title = str_replace(' ','-',$request->title);
        successFlash('Successfully subscribed..');
        return redirect("traveltips/$request->blog_id/$title");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }

    public function subscription(Request $request){
        Common::validator($request->all(), $this->rules(), $this->attributes())->validate();
        Subscription::create([
          'email'=>$request->email
        ]);
        successFlash('Successfully subscribed..');
        return redirect("traveltips");
    }
}
