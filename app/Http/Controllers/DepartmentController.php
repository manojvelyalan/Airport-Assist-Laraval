<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('rights:5',['only'=>['create']]);
        $this->middleware('rights:6',['only'=>['index']]);
        $this->middleware('rights:7',['only'=>['update']]);
        $this->middleware('rights:8',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::where('status',true)->orderBy('created_at','desc')->get();
        return view('admin.department.index',['departments'=>$departments,'count'=>0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title'=>['required','string'],
        ]);
        Department::create([
            'title' => strtolower($request->title),
            'status' => true,
            'role'=>json_encode([])
        ]);

        successFlash('Successfully created the department.');
       return redirect("admin/department");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('admin.department.edit',['department'=>$department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        request()->validate([
            'title'=>['required','string'],
        ]);
        $department->update([
            'title'=>strtolower($request->title)
        ]);
        successFlash('Successfully updated the department.');
        return redirect("admin/department");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->update([
            'status'=>false
        ]);
        successFlash('Successfully deleted the department.');
        return redirect("admin/department");
    }
}
