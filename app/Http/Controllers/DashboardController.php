<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
   /* public function __construct(){
        $this->middleware('rights:2');
    }*/
    public function index(){
        return view('admin.dashboard');
    }
    
}
