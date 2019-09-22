<?php
namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use App\Request;

class PaidRequestExport implements FromView
{
  protected $fromDate;
  protected $toDate;

  public function __construct($fromDate, $toDate)
    {
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
    }
    public function view(): View
   {
     $requests = Request::where('created_at','>=',date('Y/m/d',strtotime($this->fromDate)))
     ->where('created_at','<=',date('Y/m/d',strtotime($this->toDate)))
     ->where('request_status_id',6)
     ->get();
       return view('admin.exports.payment', [
           'requests' => $requests,
       ]);
   }
}
