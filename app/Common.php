<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
class Common extends Model
{
  public static function validator(array $data, array $rule, array $attributes){
      return Validator::make($data,$rule)->setAttributeNames($attributes);
  }
}
