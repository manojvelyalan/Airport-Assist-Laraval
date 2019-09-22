<?php

use Illuminate\Database\Seeder;
use App\VendorList;
class VendorListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonData = File::get("database/data/VendorList.json");
        $vendorLists = json_decode($jsonData,true);   
        foreach($vendorLists['results'] as $vendorList){
            $count = VendorList::where('name',$vendorList['name'])->count();
            if($count == 0){
                VendorList::create([
                    'contactNumber'=>(isset($vendorList['contactNo']))?$vendorList['contactNo']:null,
                    'contactPerson'=>(isset($vendorList['contactPerson']))?$vendorList['contactPerson']:null,
                    'email'=>(isset($vendorList['email']))?$vendorList['email']:null,
                    'name'=>(isset($vendorList['name']))?$vendorList['name']:null,
                    'status'=>true
                ]);
            }
        }
    }
}
