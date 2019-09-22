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
        'firstName', 'lastName','email', 'password','department_id','username','isAdmin','status','isDelete','profileImage'
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
}
