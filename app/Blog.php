<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['status','title','content','tags','type','blog_category_id','status','image'];

    public function category(){
        return $this->belongsTo(BlogCategory::class,'blog_category_id');
    }

}
