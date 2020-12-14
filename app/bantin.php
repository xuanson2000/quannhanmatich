<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class bantin extends Model
{
    //
      protected $table ="bantin";
     // public $timestamps = false;
      use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
    	return [
    		'slug' => [
    			'source' => 'tenBantin'
    		]
    	];
    }

     public function LoaiTin(){
     	return $this->belongsTo('App\loaitin','idLoaitin','id');
     }

       public function quantri(){
     	return $this->belongsTo('App\quantri','nguoiDang','id');
     }

     
}
