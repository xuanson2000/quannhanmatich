<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaitin extends Model
{
    //
     protected $table ="loaitin";
     public $timestamps = false;
     public function bantin(){
     	return $this->hasManey('App\bantin','idLoaitin','id');
     }

  


}
