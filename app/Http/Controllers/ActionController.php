<?php

namespace App\Http\Controllers;

use App\Action;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('rights:1',['only'=>['index']]);
        $this->middleware('rights:2',['only'=>['update']]);
        $this->middleware('rights:3',['only'=>['destroy']]);
        $this->middleware('rights:4',['only'=>['create']]);
    }

    protected function validator(array $data){
        return Validator::make($data,[
            'title'=>['required','string'],
        ]);
    }

    public function index()
    {

        $allActions = Action::where('status',true)->orderBy('created_at','desc')->get();
        return view('admin.action.index',['allActions'=>$allActions,'count'=>0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.action.create');
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
        Action::create([
            'title' => strtolower($request->title),
            'status' => true,
        ]);

      successFlash('Successfully created the action.');
       return redirect("admin/action");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function show(Action $action)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function edit(Action $action){
        return view('admin.action.edit',['action'=>$action]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Action $action)
    {
        request()->validate([
            'title'=>['required','string'],
        ]);
        $action->update([
            'title'=>strtolower($request->title)
        ]);
        successFlash('Successfully updated the action.');
        return redirect("admin/action");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function destroy(Action $action)
    {
        $action->update([
            'status'=>false
        ]);
        successFlash('Successfully deleted the action.');
        return redirect("admin/action");
    }
}
