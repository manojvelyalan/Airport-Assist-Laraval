<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rights:9',['only'=>['create']]);
        $this->middleware('rights:10',['only'=>['index']]);
        $this->middleware('rights:11',['only'=>['update']]);
        $this->middleware('rights:12',['only'=>['destroy']]);

    }

    public function attributes()
    {
        return [
            'email' => 'Email',
            'firstName' => 'First Name',
            'lastName' => 'Lat Name',
            'department' => 'Department',
            'password' => 'Password',
            'profileImage' => 'Profile Image'
        ];
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'department' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profileImage' => ['nullable','image','mimes:jpeg,png,jpg','max:2048']
        ])->setAttributeNames($this->attributes());

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
         return User::create([
            'firstName' => strtolower($data['firstName']),
            'email' => strtolower($data['email']),
            'username' =>strtolower($data['email']),
            'lastName' => strtolower($data['lastName']),
            'department_id' => $data['department'],
            'isAdmin'=>true,
            'isDelete'=>false,
            'status'=>true,
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $newImageName = "";
        if($request->file('profileImage') != null){
            $image = $request->file('profileImage');
            $newImageName = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("images/users"),$newImageName);
        }
        User::create([
            'firstName' => strtolower($request->firstName),
            'email' => strtolower($request->email),
            'username' =>strtolower($request->email),
            'lastName' => strtolower($request->lastName),
            'department_id' => $request->department,
            'isAdmin'=>true,
            'isDelete'=>false,
            'status'=>true,
            'password' => Hash::make($request->password),
            'profileImage'=>$newImageName,
        ]);
        successFlash("Successfully created administrator and the password is <b>$request->password</b>");
        return redirect(route('adminuserlist'));
    }

    protected function index(){
        $admins = User::where('status',true)->where('isDelete',false)->get();
        return view('admin.user.list',['admins'=>$admins,'count'=>0]);
    }
    public function showRegistrationForm()
    {
        $departments = Department::where('status',true)->get();
        return view('admin.user.register',['departments'=>$departments]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
     public function edit(User $user){
        $departmens = Department::where('status',true)->get();
        return view('admin.user.edit',['user'=>$user,'departments'=>$departmens]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate([
            'firstName' => ['string', 'max:255'],
            'lastName' => ['string', 'max:255'],
            'password' => ['nullable','string', 'min:8'],
        ]);
            $data['firstName'] =
        $user->update([
            'firstName' => ($request->firstName)?strtolower($request->firstName):$user->firstName,
            'lastName' => ($request->lastName)?strtolower($request->lastName):$user->lastName,
            'department_id' => ($request->department)?$request->department:$user->department_id,
            'password' => ($request->password)?Hash::make($request->password):$user->password,
        ]);
        successFlash('Successfully updated the administrator.');
        return redirect(route('adminuserlist'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->update([
            'isDelete'=>true
        ]);
        successFlash('Successfully deleted the administrator.');
        return redirect(route('adminuserlist'));
    }
    
}
