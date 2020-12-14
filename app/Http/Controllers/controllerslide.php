<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
use DB;

class controllerslide extends Controller
{
    //

	public function index(){

		$slides=DB::table('slide')->get();
		return view('quantri.slide.index',['slides'=>$slides]);
		unset($slides);
	}

    public function themslide(Request $req){

    	

    	$slideadd = new slide;

    	$slideadd->noiDung= $req ->noiDung;
    	$slideadd->tieuDe= $req ->tieuDe;
        

    	if($req->hasFile('image')){

    		$file =$req->file('image');

    		$name =$file ->getclientoriginalname();
    		$Hinh =str_random(4)."_".$name;
    		

    		while(file_exists("public/anh/".$Hinh))
    		{

    			$Hinh =str_random(4)."_".$name;
    		}
    		$file->move("public/anh/",$Hinh);
    	
    		$slideadd->anh=$Hinh;

    	}
    	else{

    		$slideadd->anh="error.png";

    	}

    	
    	$slideadd->save();

    	// DB::table('gioithieu')->where('id',$id)->update(['tieuDe' => $req ->tieuDe, 'noidung'=>$req ->noidung, 'anh'=>$Hinh]);

    	return redirect('wp-admin/slide.html')->with('messgthem','Thêm thành công');
  


    }


 public function xoaslide($id){

          $xoaslide = slide::find($id);
               $xoaslide->delete();
                  

                return redirect('wp-admin/slide.html')->with('messgxoa','Xóa thành công');
    }




}
