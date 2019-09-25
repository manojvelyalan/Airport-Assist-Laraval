<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Request;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contactNumber','countryCode','titleName','firstName', 'lastName','email', 'password','department_id','username','isAdmin','status','isDelete','profileImage'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function requests(){
      return $this->hasMany(Request::class,id,respondedBy);
    }
    public function userResponded($userId, $fromDate, $toDate){
        $request = new Request;
        $query = $request->newQuery();

        if($fromDate != ""){
          $query->where('created_at','>=',$fromDate);
        }
        if($toDate != ""){
          $query->where('created_at','<=',$toDate);
        }
        if($userId != ""){
            $query->where('respondedBy',$userId);
        }
          return $query->count();
    }
    public static function createPassword(){
       $alpha  = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
       $randStr = substr(str_shuffle($alpha), 0, 8);
       return $randStr;
   }

   public function createUser($request){
     $user = self::create([
       'username'=>$request->email,
       'titleName'=>$request->titleName,
       'firstName'=>$request->firstName,
       'lastName'=>$request->lastName,
       'countryCode'=>$request->mobile_number_country,
       'contactNumber'=>$request->phoneNumber,
       'password'=>Hash::make(User::createPassword()),
       'email'=>$request->email,
       'status'=>true,
       'isAdmin'=>false,
       'isDelete'=>false,
     ]);
     return $suer;
   }
}
