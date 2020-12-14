<?php
namespace App\Http\Controllers;
use App\quyen;
use App\quantri;
use App\vaitro;
use App\vaitro_quyen;
use DB;
use Hash;
use Illuminate\Http\Request;

class controllernguoidung extends Controller
{
    //

    	public function index(){
		$nguoidungs=DB::table('quantri')->get();
	    $vaitros=DB::table('vaitro')->get();
		return view('phanquyen.nguoidung.index',['vaitros'=>$vaitros,'nguoidungs'=>$nguoidungs]);
		unset($vaitros);
		unset($nguoidungs);
	}

	
		public function themnguoidung(Request $req){

		$quantri = new quantri;
		$quantri->username= $req ->username;
		$quantri->namclass= $req ->namclass;
        $quantri->phongBan= $req ->phongBan;
		$quantri->password= Hash::make($req->password);

		if($req->hasFile('image')){

    		$file =$req->file('image');

    		$name =$file ->getclientoriginalname();
    		$Hinh =str_random(4)."_".$name;
    		

    		while(file_exists("public/anh/".$Hinh))
    		{

    			$Hinh =str_random(4)."_".$name;
    		}
    		$file->move("public/anh/",$Hinh);
    	
    		$quantri->anh=$Hinh;

    	}
    	else{

    		$quantri->anh="nhanvien.jpg";

    	}


    	$quantri->save();

    	$pe = $req->vaitro;

   		foreach ($pe as $p) {
   			\DB::table('quantri_vaitro')->insert([
   				'qt_id'=> $quantri->id,
   				'vt_id' => $p
   			]); 
   		} 

   
    	return redirect('wp-admin/nguoi-dung.html')->with('messgthem','Thêm thành công');
    	


	}



}
