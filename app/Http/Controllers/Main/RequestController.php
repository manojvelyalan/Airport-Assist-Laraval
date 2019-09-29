<?php
namespace App\Http\Controllers\Main;

use App\Title;
use App\Http\Controllers\Controller;
use App\Common;
use App\ClassOfTravel;
use App\ServiceType;
use App\Request as Req;
use Illuminate\Http\Request;
use App\User;
class RequestController  extends Controller{
  public function attributes(){
    return [
      'email'=>'email',
      'email_confirmation'=>'confirm email',
      'titleName'=>'title',
      'firstName'=>'first name',
      'lastName'=>'last name',
      'mobile_number'=>'phone number',
      'country_code'=>'country code',
      'originAirport'=>'origin airport'
    ];
  }
  public function step1(Request $request){
      $req = false;
      $full_number = "";
      $request_id = "";
      if(isset($request->r)){
          $req = Req::find($request->r);
          $full_number = "+".$req->countryCode.$req->contactNumber;
          $request_id = $req->id;
      }
      $titles = Title::where('status',true)->orderBy('title','asc')->get();
      return view('main.request.step-1',[
        'titles'=>$titles,
        'request'=>$req,
        'full_number'=>$full_number,
        'request_id'=>$request_id
      ]);
  }
  public function step1Rule(){
    return [
      'email'=>['required','email','confirmed'],
      'titleName'=>['required'],
      'firstName'=>['required'],
      'lastName'=>['required'],
      'mobile_number'=>['required','integer'],
      'country_code'=>['required'],
      'originAirport'=>['required'],
    ];
  }
  public function postStep1(Request $request){

    $request['mobile_number'] = str_replace(' ', '', $request->mobile_number);
      Common::validator($request->all(),$this->step1Rule(),$this->attributes())->validate();

      $user = User::where('username',$request->email)->first();
      if($user == ""){
        $user = new User();
        $userid = $user->createUser($request)->id;
        $isRepeat = false;
      }else{
        $userId = $user->id;
        $isRepeat = true;
      }
      $userRequest = new Req;
      $req = $userRequest->createOrUpdateRequest($request, $userId, $isRepeat);
      return redirect("step-2/$req->id");
  }
  public function step2(Request $request, Req $req){
    $serviceTypes = ServiceType::where('status',true)->orderBy('title','asc')->get();
    return view('main.request.step-2',[
      'serviceTypes'=>$serviceTypes,
      'request'=>$req
    ]);
  }

  public function step3(Request $request){
    $step = 3;
    $serviceTypes = ServiceType::where('status',true)->get();
    $classOfTravels = ClassOfTravel::where('status',true)->get();
    $titles = Title::where('status',true)->orderBy('title','asc')->get();
    return view('main.request.step-3',[
      'serviceTypes'=>$serviceTypes,
      'classOfTravels'=>$classOfTravels,
      'titles'=>$titles,
      'step'=>$step,
    ]);
  }
}
