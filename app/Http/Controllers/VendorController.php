<?php

namespace App\Http\Controllers;

use App\VendorList;
use App\AirportList;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('rights:18',['only'=>['create']]);
        $this->middleware('rights:19',['only'=>['index']]);
        $this->middleware('rights:20',['only'=>['update']]);
        $this->middleware('rights:21',['only'=>['destroy']]);
        $this->middleware('rights:24',['only'=>['assign']]);  
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = VendorList::where('status',true)->orderBy('created_at','desc')->get();
        return view('admin.vendor.index',['vendors'=>$vendors,'count'=>0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vendor.create');
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
            'vendorName' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'contactNumber'=>['nullable', 'integer'],
        ]);
        VendorList::create([
            'name' => strtolower($request->vendorName),
            'contactNumber' => $request->contactNumber,
            'contactPerson' => strtolower($request->contactPerson),
            'email' => strtolower($request->email),
            'status' => true,
        ]);

        successFlash('Successfully created the vendor.');
       return redirect("admin/vendor");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VendorList  $vendorList
     * @return \Illuminate\Http\Response
     */
    public function show(VendorList $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VendorList  $vendorList
     * @return \Illuminate\Http\Response
     */
    public function edit(VendorList $vendor)
    {
        return view('admin.vendor.edit',['vendor'=>$vendor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VendorList  $vendorList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VendorList $vendor)
    {
        request()->validate([
            'vendorName' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'contactNumber'=>['nullable', 'integer'],
        ]);
        $vendor->update([
            'name' => strtolower($request->vendorName),
            'contactNumber' => $request->contactNumber,
            'contactPerson' => strtolower($request->contactPerson),
            'email' => strtolower($request->email),
            'status' => true,
        ]);
        successFlash('Successfully updated the vendor details.');
        return redirect("admin/vendor");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VendorList  $vendorList
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendorList $vendor)
    {
        $vendor->update([
            'status'=>false,
        ]);
        successFlash('Successfully deleted the vendor.');
        return redirect("admin/vendor");

    }
    public function assign(){
        $vendors = VendorList::where('status',true)->orderBy('name','asc')->get();
        return view('admin.vendor.assign',['vendors'=>$vendors]);
    }

    public function assignVendor(Request $request){

        request()->validate([
            'vendor'=>['required'],
            'airportName'=>['required'],
            'priority'=>['required'],
        ]);

        $vendorId = $request->vendor;
        $vendor = VendorList::find($vendorId);

        $airportName = strtolower($request->airportName);
        $aiportId = AirportList::where('airportName',$airportName)->first()->id;

        $priority = $request->priority;
        $vendor->airports()->attach($aiportId,['priority'=>$priority]);

        successFlash('Successfully assign the vendor.');
        return redirect("admin/vendors/".$vendorId."/airportlist");
    }
    public function listassignedairport(){
        $vendors = VendorList::where('status',true)->orderBy('name','asc')->get();
        $vendorId = "";
        $airports = [];
        return view('admin.vendor.assignedairport',['vendors'=>$vendors,'airports'=>$airports,'vendorId'=>$vendorId]);
    }
    public function airportlist(VendorList $vendor){
        $vendors = VendorList::where('status',true)->orderBy('name','asc')->get();
        $vendorId = $vendor->id;
        $airports = $vendor->airports()->orderBy('priority','asc')->get();

        return view('admin.vendor.assignedairport',['vendors'=>$vendors,'airports'=>$airports,'vendorId'=>$vendorId,'count'=>0]);
    }
    public function detach(VendorList $vendor, AirportList $airport){
        $vendor->airports()->detach($airport->id);
        successFlash('Successfully delete the airport.');
        return redirect("admin/vendors/".$vendor->id."/airportlist");
    }
}
