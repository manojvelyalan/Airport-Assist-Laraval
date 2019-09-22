<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirportList extends Model
{
    
    protected  $fillable = [
        'location',
        'country',
        'airportName',
        'iata',
        'status'
    ];
    
    public function vendors(){
        return $this->belongsToMany(VendorList::class)->withPivot('priority','created_at','updated_at');
    }
}
