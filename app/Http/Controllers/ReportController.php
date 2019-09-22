<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\PaidRequestExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use App\User;

class ReportController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('rights:31',['only'=>['paid','processPaid']]);
      $this->middleware('rights:32',['only'=>['individualRespondedReport','respond']]);
  }
    public function processPaid(Request $request){
        $request->validate([
          'fromDate'=>['required','date','before:toDate'],
          'toDate'=>['required','date','after:fromDate'],
        ]);
        return Excel::download(new PaidRequestExport($request->fromDate, $request->toDate), 'paid-request.xlsx');
    }

    public function paid(){
      return view('admin.report.payment');
    }
    public function individualRespondedReport(){
      $users = User::where('isAdmin',true)
      ->where('status',true)
      ->where('isDelete',false)->get();
      $fromDate = date('Y/m/d');
      $toDate = '';
      $userModel = new User;
      $totalRequest = $userModel->userResponded($userId= "", $fromDate, $toDate);
      return view('admin.report.responded',['users'=>$users,'fromDate'=>$fromDate,'toDate'=>$toDate,'totalRequest'=>$totalRequest]);
    }

    public function respond(Request $request){

        $users = User::where('isAdmin',true)
        ->where('status',true)
        ->where('isDelete',false)->get();
        $fromDate = ($request->fromDate != "")? date('Y/m/d',strtotime($request->fromDate)):date('Y/m/d');
        $toDate = ($request->toDate != "")? date('Y/m/d',strtotime($request->toDate)):'';
        $userModel = new User;
        $totalRequest = $userModel->userResponded($userId= "", $fromDate, $toDate);
        return view('admin.report.responded',['users'=>$users,'fromDate'=>$fromDate,'toDate'=>$toDate,'totalRequest'=>$totalRequest]);

    }

}
