<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
  protected $fillable = ['isDelete','author','email','blog_id','status','content'];
  
    public function blog(){
      return $this->belongsTo(Blog::class,blog_id);
    }

}
