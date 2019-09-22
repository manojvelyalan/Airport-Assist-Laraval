<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorList extends Model
{
    protected $fillable = ['contactPerson','name','email','status','contactNumber'];

    public function airports(){
        return $this->belongsToMany(AirportList::class)->withPivot('priority','created_at','updated_at');
    }
}


