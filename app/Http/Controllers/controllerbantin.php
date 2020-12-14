<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\bantin;
use App\loaitin;
use App\quantri;
use Auth;
use DB;
use PDF;
use Session;




class controllerbantin extends Controller
{
    //

	public function index(){

		$bantins=bantin::get();

		$loaitins =loaitin::get();
		return view('quantri.bantin.index',['bantins'=>$bantins,'loaitins'=>$loaitins]);
		unset($bantins);
         unset($loaitins);

	}


	

    public function thembantin(Request $req){

    	$bantins = new bantin;

        $bantins->idLoaitin= $req ->idLoaitin;
        $bantins->tenBantin= $req ->tenBantin;
         $bantins->tenBanTinKhongDau=str_slug($req ->tenBantin,'-');
    	$bantins->tomTat= $req ->tomTat;
    	$bantins->noidung= $req ->noidung;
        $bantins->nguoiDang=Auth::guard('quantri')->user()->id;
    	

    	if($req->hasFile('image')){

    		$file =$req->file('image');

    		$name =$file ->getclientoriginalname();
    		$Hinh =str_random(4)."_".$name;
    		

    		while(file_exists("public/anh/".$Hinh))
    		{

    			$Hinh =str_random(4)."_".$name;
    		}
    		$file->move("public/anh/",$Hinh);
    	
    		$bantins->anh=$Hinh;

    	}
    	else{

    		$bantins->anh="error.png";

    	}

    	
    
    	
    	$bantins->save();

    	// DB::table('gioithieu')->where('id',$id)->update(['tieuDe' => $req ->tieuDe, 'noidung'=>$req ->noidung, 'anh'=>$Hinh]);

    	return redirect('wp-admin/ban-tin.html')->with('messgthem','Thêm thành công');
    }



    public function suabantin($id){
         
        
    	$loaitins =loaitin::get();
        $idbantins=bantin::find($id);

    	
    	return view('quantri.bantin.suabantin',['idbantins'=>$idbantins]);
    	unset($idbantins);
    	unset($loaitins);
    }



    public function suabantinpost(Request $req,$id){

    	$idbantinpost=bantin::find($id);
    	$idbantinpost->idLoaitin= $req ->idLoaitin;
    	$idbantinpost->tenBantin= $req ->tenBantin;
    	$idbantinpost->tomTat= $req ->tomTat;
    	$idbantinpost->noidung= $req ->noidung;

    	if($req ->hasFile('anh')){

    		$file =$req->file('anh');
    		$name =$file ->getclientoriginalname();
    		$Hinh =str_random(4)."_".$name;

    		while(file_exists("public/anh/".$Hinh))
    		{

    			$Hinh =str_random(4)."_".$name;
    		}
    		$file->move("public/anh/",$Hinh);
    		unlink("public/anh/".$idbantinpost->anh);
    		$idbantinpost->anh=$Hinh;

    	}
    	
    	$idbantinpost->save();
    	return redirect('wp-admin/ban-tin.html')->with('messgsua','Sửa thành công');
    	unset($idbantinpost);


    }

    public function xoabantin($id){

    	$xoabantin = bantin::find($id);
    	$xoabantin->delete();

    	return redirect('wp-admin/ban-tin.html')->with('messgxoa','Xóa thành công');
    }




}
