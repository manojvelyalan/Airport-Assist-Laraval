<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Action;

class AssignActiontoDepartment extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rights:13',['only'=>['addRole','assign','details']]);
    }

    public function assign(){
        $actionList = [];
        $departmentId = "";
        $departments = Department::where('status',true)->get();
        $actions = Action::where('status',true)->get();
        return view('admin.assign.actiontodepartment',['departments'=>$departments,'actions'=>$actions,'actionList'=>$actionList,'departmentId'=>$departmentId]);
    }
    public function details(Department $department){
        $actionList = [];
        $departments = Department::where('status',true)->get();
        $actions = Action::where('status',true)->get();
      //  dd(json_decode($department->role));
        $actionList = json_decode($department->role);
        return view('admin.assign.actiontodepartment',[
                                    'departments'=>$departments,
                                    'actions'=>$actions,
                                    'actionList'=>$actionList,
                                    'departmentId'=>$department->id,
            ]);
    }
    public function addRole(Request $request, Department $department){
        request()->validate([
            'department'=>['required'],
            'action'=>['required'],
        ]);
        if(count($request->action) >0){
            $department->update([
                'role'=>json_encode($request->action),
            ]);
        }
        successFlash("Successfully assigned all action to department");
        return redirect("admin/assign/$department->id");
    }
}
