<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use App\loaitin;
use Session;

class controllerloaitin extends Controller
{
    //

	public function index(){

		$loatins=DB::table('loaitin')->get();
		return view('quantri.loaitin.index',['loatins'=>$loatins]);
		unset($loatins);


	}


    public function themloaitin(Request $req){

    	$loatinadd = new loaitin;

    	$loatinadd->tenloaitin= $req ->tenloaitin;
        $loatinadd->tenLoaTinKhongDau=str_slug($req ->tenloaitin,'-');
    	$loatinadd->save();


    	return redirect('wp-admin/loai-tin.html')->with('messgthem','Thêm thành công');
    	
   

    }


  public function sualoaitin($id){
    	$idloatins=DB::table('loaitin')->where('id',$id)->first();
    	return view('quantri.loaitin.sualoaitin',['idloatins'=>$idloatins]);
    	unset($idloatins);


    }

    public function sualoaitinpost(Request $req,$id){

    	$idloaitinpost=loaitin::find($id);
    	
    	$idloaitinpost->tenLoaitin= $req ->tenLoaitin;
    	
    	 $idloaitinpost->save();

    
	    return redirect('wp-admin/loai-tin.html')->with('messgsua','Sửa thành công');
    	
    	
    	unset($idgioithieuspost);


    }

    
    public function xoaloaitin($id){

    	  $xoaloaitin = loaitin::find($id);
               $xoaloaitin->delete();
                  
            return redirect('wp-admin/loai-tin.html')->with('messgxoa','Xóa thành công');
    }

  





}
