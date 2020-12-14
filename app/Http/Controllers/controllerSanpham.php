<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use App\sanpham;

class controllerSanpham extends Controller
{
    //

	public function index(){

		$sanphams=DB::table('sanpham')->get();
		return view('quantri.sanpham.index',['sanphams'=>$sanphams]);
		unset($sanphams);


	}

	 public function themsanpham(Request $req){

    	$sanphamadd = new sanpham;
          $sanphamadd->tenSanpham= $req ->tenSanpham;
    	$sanphamadd->tieuDe= $req ->tieuDe;
    	$sanphamadd->noidung= $req ->noidung;

    	if($req->hasFile('image')){

    		$file =$req->file('image');

    		$name =$file ->getclientoriginalname();
    		$Hinh =str_random(4)."_".$name;
    		

    		while(file_exists("public/anh/".$Hinh))
    		{

    			$Hinh =str_random(4)."_".$name;
    		}
    		$file->move("public/anh/",$Hinh);
    	
    		$sanphamadd->anh=$Hinh;

    	}
    	else{

    		$sanphamadd->anh="lỗi";

    	}

    	
    	$sanphamadd->save();

    	// DB::table('sanpham')->where('id',$id)->update(['tieuDe' => $req ->tieuDe, 'noidung'=>$req ->noidung, 'anh'=>$Hinh]);

    	return redirect('wp-admin/san-pham.html')->with('messgthem','Thêm thành công');
    
    	
    }

    public function suasanpham($id){
    	$idsanpham=DB::table('sanpham')->where('id',$id)->first();
    	return view('quantri.sanpham.suasanpham',['idsanpham'=>$idsanpham]);
    	unset($idsanpham);


    }
    

    public function suasanPhampost(Request $req,$id){

    	$idsanphampost=sanpham::find($id);
    	$idsanphampost->tenSanpham= $req ->tenSanpham;
    	$idsanphampost->tieuDe= $req ->tieuDe;
    	$idsanphampost->noidung= $req ->noidung;
    
    if($req ->hasFile('anh')){

       $file =$req->file('anh');
       $name =$file ->getclientoriginalname();
       $Hinh =str_random(4)."_".$name;

       while(file_exists("public/anh/".$Hinh))
       {

           $Hinh =str_random(4)."_".$name;
       }
        $file->move("public/anh/",$Hinh);
        unlink("public/anh/".$idsanphampost->anh);
         $idsanphampost->anh=$Hinh;
       
       }

       else{

            $idsanphampost->anh="error.png";

        }
    	
    	 $idsanphampost->save();

    	// DB::table('gioithieu')->where('id',$id)->update(['tieuDe' => $req ->tieuDe, 'noidung'=>$req ->noidung, 'anh'=>$Hinh]);

	    return redirect('wp-admin/san-pham.html')->with('messgsua','Sửa thành công');
    	
    	
    	unset($idsanphampost);


    }

    

    public function xoasanpham($id){

    	  $xoasanpham = sanpham::find($id);
               $xoasanpham->delete();
                  
            return redirect('wp-admin/san-pham.html')->with('messgxoa','Xóa thành công');
    }




}
