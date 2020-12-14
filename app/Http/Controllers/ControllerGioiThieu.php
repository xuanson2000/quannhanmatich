<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\linhvuc;
use App\tieuchi;
use App\tieuchithanhphan;
use App\linhvuc_diem;
use App\tieuchi_diem;
use App\quantri;
use App\tieuchithanhphan_diem;
use App\gioithieu;
use Auth;
use DB;
use PDF;
use Session;


class ControllerGioiThieu extends Controller
{
    
    public function index(){

$kqs=gioithieu::whereRaw('YEAR(giaKm)-YEAR(gia)>2')->get();

  dd($kqs);
foreach ($kqs as $key ) {
   
    dd($key);
}

        dd($kq);
  
    $gioithieus=DB::table('gioithieu')->get();
    return view('quantri.gioithieu.index',['gioithieus'=>$gioithieus]);
    unset($gioithieus);


    }

    public function suagioiThieu($id){
    	$idgioithieus=DB::table('gioithieu')->where('id',$id)->first();
    	return view('quantri.gioithieu.suagioiThieu',['idgioithieus'=>$idgioithieus]);
    	unset($idgioithieus);


    }



public function suagioiThieupost(Request $req,$id){

    	$idgioithieuspost=gioithieu::find($id);
    	
    	$idgioithieuspost->tieuDe= $req ->tieuDe;
    	$idgioithieuspost->noidung= $req ->noidung;
    
    if($req ->hasFile('anh')){

       $file =$req->file('anh');
       $name =$file ->getclientoriginalname();
       $Hinh =str_random(4)."_".$name;

       while(file_exists("public/anh/".$Hinh))
       {

           $Hinh =str_random(4)."_".$name;
       }
        $file->move("public/anh/",$Hinh);
        unlink("public/anh/".$idgioithieuspost->anh);
         $idgioithieuspost->anh=$Hinh;
       
       }
    	
    	 $idgioithieuspost->save();

    	// DB::table('gioithieu')->where('id',$id)->update(['tieuDe' => $req ->tieuDe, 'noidung'=>$req ->noidung, 'anh'=>$Hinh]);

	    return redirect('wp-admin/gioi-thieu.html')->with('messgsua','Sửa thành công');
    	
    	
    	unset($idgioithieuspost);


    }


    public function themgioiThieu(Request $req){

    	$gioithieuadd = new gioithieu;

    	$gioithieuadd->tieuDe= $req ->tieuDe;
    	$gioithieuadd->noidung= $req ->noidung;

    	if($req->hasFile('image')){

    		$file =$req->file('image');

    		$name =$file ->getclientoriginalname();
    		$Hinh =str_random(4)."_".$name;
    		

    		while(file_exists("public/anh/".$Hinh))
    		{

    			$Hinh =str_random(4)."_".$name;
    		}
    		$file->move("public/anh/",$Hinh);
    	
    		$gioithieuadd->anh=$Hinh;

    	}
    	else{

    		$gioithieuadd->anh="error.png";

    	}

    	
    	$gioithieuadd->save();

    	// DB::table('gioithieu')->where('id',$id)->update(['tieuDe' => $req ->tieuDe, 'noidung'=>$req ->noidung, 'anh'=>$Hinh]);

    	return redirect('wp-admin/gioi-thieu.html')->with('messgthem','Thêm thành công');
    	unset($idgioithieuspost);
    	
    }

    
    public function xoagioiThieu($id){

    	  $xoagioiThieu = gioithieu::find($id);
               $xoagioiThieu->delete();
                  
            return redirect('wp-admin/gioi-thieu.html')->with('messgxoa','Xóa thành công');
    }
	


}
