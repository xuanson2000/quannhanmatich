<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quannhanmattin;
use DB;
use Excel;
class cotrollerquannhan extends Controller
{
    //

	public function indexds(){
		$quannhans=quannhanmattin::all();
		return view('quantri.quannhan.index',['quannhans'=>$quannhans]);

	}


public function chitietquannhan($id){

    $quannhanid=quannhanmattin::find($id);

    return view('quantri.quannhan.chitietquannhan',['quannhanid'=>$quannhanid]);


  }

  public function importexcel(){

    return view('quantri.quannhan.importexcel');


  }

	public	function import(Request $request)
	{

// $date_string= "444555";


//  if(strtotime($date_string)){
//     // it's in date format
//   dd("ts in date format");
// }
// else{
//    dd("lo");
// }

		$this->validate($request, [
			'select_file'  => 'required|mimes:xls,xlsx'
		]);

		$path = $request->file('select_file')->getRealPath();


		$data = Excel::load($path)->get();

		if($data->count() > 0)
		{

      foreach($data->toArray() as $key => $value)
      {
        if($value['hoten']!="")
        {


           $insert_data[] = array(

        'hoten'   => $value['hoten'],
        'quequan'   => $value['quequan'],
        'ngaysinh'    => $value['ngaysinh'],
        'ngaynhapngu'    => $value['ngaynhapngu'],
        'capbac'    => $value['capbac'],
        'chucvu'    => $value['chucvu'],
        'donvi'    => $value['donvi'],
        'hotenme'    => $value['hotenme'],
        'hotenbo'    => $value['hotenbo'],
        'hotenvo'    => $value['hotenvo'],
        'nguoithankhac'    => $value['nguoithankhac'],
        'thoigiandiadiemmt' => $value['thoigiandiadiemmt'],
        'truonghopmt'    => $value['truonghopmt'],
        'hosoluuluu'    => $value['hosoluuluu'],
        'ketquaxacminh'    => $value['ketquaxacminh'],
        'donvixacminh'=> $value['donvixacminh'],
        'ketquathuchienchinhsach'=> $value['ketquathuchienchinhsach'],
        'ngaybaotu'    => $value['ngaybaotu'],
        'sogiaybaotu'    => $value['sogiaybaotu'],


      );
        }
       
      
     }

     if(!empty($insert_data))
     {
       DB::table('quannhanmattin')->insert($insert_data);
     }
   }



   // $user =  DB::table('quannhanmattin')->get();
   // $users  =  $user->groupBy(['hoten','ngaysinh','quequan','ngaynhapngu','donvi']);


  

   // foreach ($users as $value){


   //  foreach ($value as $key ){


   //    foreach ($key as $key1 ) {

   //      foreach ($key1 as $key2 ) {

   //        foreach ($key2 as $key3 ) {

   //          if(count($key3) > 1)
   //          {

             
   //            $id = $key3[0]->id;
            
   //            $t = $key3->where('id','!=',$id)->pluck('id');
   //            quannhanmattin::whereIn('id',$t)->delete();
   //          }


   //        }

   //      }

   //    }
      
   
  //   }

  // }




   return redirect('wp-admin/danh-sach-quan-nhan-mat-tich-mat-tin')->with('messgthemexcel','Thêm dữ liệu từ file thành công'); 

}


function themquannhan(){

  return view('quantri.quannhan.themquannhan');
}



	public function themquannhanpost(Request $req){

    $quannhanmattinadd = new quannhanmattin;

    $quannhanmattinadd->hoten = $req ->hoten;
    $quannhanmattinadd->quequan = $req ->quequan;
    $quannhanmattinadd->ngaysinh= $req ->ngaysinh;
    $quannhanmattinadd->ngaynhapngu= $req ->ngaynhapngu;
    $quannhanmattinadd->capbac= $req ->capbac;
    $quannhanmattinadd->chucvu= $req ->chucvu;
    $quannhanmattinadd->donvi= $req ->donvi;
    $quannhanmattinadd->hotenme= $req ->hotenme;
    $quannhanmattinadd->hotenvo= $req ->hotenvo;
    $quannhanmattinadd->hotenbo= $req ->hotenbo;
    $quannhanmattinadd->nguoithankhac= $req ->nguoithankhac;
    $quannhanmattinadd->thoigiandiadiemmt= $req ->thoigiandiadiemmt;
    $quannhanmattinadd->truonghopmt= $req ->truonghopmt;
    $quannhanmattinadd->hosoluuluu= $req ->hosoluuluu;
    $quannhanmattinadd->ketquaxacminh= $req ->radio1;
    $quannhanmattinadd->donvixacminh= $req ->donvixacminh;
    $quannhanmattinadd->ketquathuchienchinhsach= $req ->ketquathuchienchinhsach;
    $quannhanmattinadd->ngaybaotu= $req ->ngaybaotu;
    $quannhanmattinadd->sogiaybaotu= $req ->sogiaybaotu;


       $quannhanmattins=quannhanmattin::all();
       foreach ($quannhanmattins as $quannhanmattin ) {

           if($quannhanmattin->hoten ==$req->hoten && $quannhanmattin->ngaysinh==$req->ngaysinh && $quannhanmattin->quequan ==$req->quequan && $quannhanmattin->ngaynhapngu == $req->ngaynhapngu && $quannhanmattin->donvi ==$req->donvi){

           return redirect('wp-admin/danh-sach-quan-nhan-mat-tich-mat-tin')->with('canhbao','CẢNH BÁO DỮ LIỆU QUÂN NHÂN ĐÃ ĐƯỢC NHẬP');

       }}
        

      $quannhanmattinadd->save();


     //return back()->with('success', 'Excel Data Imported successfully.');
     return redirect('wp-admin/danh-sach-quan-nhan-mat-tich-mat-tin')->with('messgthem','Thêm dữ liệu thành công'); 
   

    }

    


  public function suaquannhan($id){
      $quannhanmattins=DB::table('quannhanmattin')->where('id',$id)->first();
      return view('quantri.quannhan.suaquannhan',['quannhanmattins'=>$quannhanmattins]);
      unset($quannhanmattins);


    }

     public function suaquannhanpost(Request $req,$id){

      $quannhanmattinid=quannhanmattin::find($id);

    $quannhanmattinid->hoten = $req ->hoten;
    $quannhanmattinid->quequan = $req ->quequan;
    $quannhanmattinid->ngaysinh= $req ->ngaysinh;
    $quannhanmattinid->ngaynhapngu= $req ->ngaynhapngu;
    $quannhanmattinid->capbac= $req ->capbac;
    $quannhanmattinid->chucvu= $req ->chucvu;
    $quannhanmattinid->donvi= $req ->donvi;
    $quannhanmattinid->hotenme= $req ->hotenme;
    $quannhanmattinid->hotenvo= $req ->hotenvo;
    $quannhanmattinid->hotenbo= $req ->hotenbo;
    $quannhanmattinid->nguoithankhac= $req ->nguoithankhac;
    $quannhanmattinid->thoigiandiadiemmt= $req ->thoigiandiadiemmt;
    $quannhanmattinid->truonghopmt= $req ->truonghopmt;
    $quannhanmattinid->hosoluuluu= $req ->hosoluuluu;
    $quannhanmattinid->ketquaxacminh= $req ->radio1;
    $quannhanmattinid->donvixacminh= $req ->donvixacminh;
    $quannhanmattinid->ketquathuchienchinhsach= $req ->ketquathuchienchinhsach;
    $quannhanmattinid->ngaybaotu= $req ->ngaybaotu;
    $quannhanmattinid->sogiaybaotu= $req ->sogiaybaotu;


       // $quannhanmattins=quannhanmattin::all();
       // foreach ($quannhanmattins as $quannhanmattin ) {

       //     if($quannhanmattin->hoten ==$req->hoten && $quannhanmattin->ngaysinh==$req->ngaysinh && $quannhanmattin->quequan ==$req->quequan && $quannhanmattin->ngaynhapngu == $req->ngaynhapngu && $quannhanmattin->donvi ==$req->donvi){

       //     return redirect('wp-admin/danh-sach-quan-nhan-mat-tich-mat-tin')->with('canhbao','CẢNH BÁO DỮ LIỆU QUÂN NHÂN ĐÃ ĐƯỢC NHẬP');

       // }}
        

      $quannhanmattinid->save();

     //return back()->with('success', 'Excel Data Imported successfully.');
     return redirect('wp-admin/danh-sach-quan-nhan-mat-tich-mat-tin')->with('messgsua','Sửa dữ liệu thành công'); 

    }


  

    public function xoaquannhan($id){

        $quannhanmattin = quannhanmattin::find($id);
               $quannhanmattin->delete();
                  
            return redirect('wp-admin/danh-sach-quan-nhan-mat-tich-mat-tin')->with('messgxoa','Xóa thành công');
    }

      public function baocao(){

      return view('quantri.quannhan.baocao');


    }
    



public function baocaopost(Request $req){






  if($req->radio1==1){

   $tukhoa=$req->tukhoa;
   $baocaoquannhan=quannhanmattin::where('donvi','like', '%'.$tukhoa.'%')->get();

 }elseif($req->radio1==2){
 
  $baocaoquannhan=quannhanmattin::where('ketquathuchienchinhsach','like', '%'.'Đã công nhận liệt sỹ'.'%')->get();

}
elseif($req->radio1==3)
{
  $baocaoquannhan=quannhanmattin::where('ketquathuchienchinhsach','like', '%'.'Chưa công nhận liệt sỹ'.'%')->get();

}


    $customer_array[] = array('STT','Họ và tên','Ngày sinh', 'Quê quán', 'Ngày nhập ngũ', 'Đơn vị','Cấp bậc','Chức vụ','Họ tên Bố','Họ tên Mẹ','Họ tên Vợ','Người thân khác','Thời gian, địa điểm mất tích, mất tin','Trường hợp mất tích, mất tin','Hồ sơ, tài liệu còn lưu trữ, nơi lưu trữ', 'Kết quả xác minh', 'đơn vị xác minh','Kết quả thực hiện chính sách','Ngày báo tử','Số giấy báo tử');
    
    $stt=1;

    foreach($baocaoquannhan as $customer)
    {

     

      $customer_array[] = array(
        'STT'=>$stt++,
        'Họ và tên' => $customer->hoten,
        'Ngày sinh' => $customer->ngaysinh, 
        'Quê quán' => $customer->quequan,
         'Ngày nhập ngũ' => $customer->ngaynhapngu,
          'Đơn vị' => $customer->donvi,
          'Cấp bậc' => $customer->capbac,
          'Chức vụ' => $customer->chucvu,
          'Họ tên Bố' => $customer->hotenbo,
          'Họ tên Mẹ' => $customer->hotenme,
          'Họ tên Vợ' => $customer->hotenvo,
          'Người thân khác' => $customer->nguoithankhac,
          'Thời gian, địa điểm mất tích, mất tin' => $customer->thoigiandiadiemmt,
          'Trường hợp mất tích, mất tin' => $customer->truonghopmt,
          'Hồ sơ, tài liệu còn lưu trữ, nơi lưu trữ' => $customer->hosoluuluu,
           'Kết quả xác minh' => $customer->ketquaxacminh,
           'đơn vị xác minh'=>$customer->donvixacminh,
           'Kết quả thực hiện chính sách' => $customer->ketquathuchienchinhsach,
           'Ngày báo tử' => $customer->ngaybaotu,
           'Số giấy báo tử' => $customer->sogiaybaotu,
      );

    }
    
    Excel::create('Customer Data', function($excel) use ($customer_array){
      $excel->setTitle('Customer Data');
      $excel->sheet('Customer Data', function($sheet) use ($customer_array){
        $sheet->fromArray($customer_array, null, 'A1', false, false);
      });
    })->download('xlsx');



   }


}



