<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//trang chủ 
// Route::get('/', function () {
//     return view('trangchu.index');
// });

Route::get('/',[
  'as'=>'trungtamtatrangchu',
  'uses'=>'trungtamtatrangchu@trungtamtatrangchu'
]);


Route::get('/ABD', function () {
   
   return view('nhap');

});

Route::get('/khoangsan', function () {
    return view('main.index');
});

////////////////////////////////////////////////








//dang nhap quan tri
Route::get('/dang-nhap',[
  'as'=>'dangnhap',
  'uses'=>'admincontroller@getdangnhap'
]);

Route::post('/dang-nhap',[
  'as'=>'dangnhappost',
  'uses'=>'admincontroller@postdangnhap'
]);
Route::get('/dang-nhap/{id}',[
  'as'=>'reset_dangnhap',
  'uses'=>'admincontroller@reset_dangnhap'
]);
Route::post('/dang-nhap/{id}',[
  'as'=>'reset_dangnhappost',
  'uses'=>'admincontroller@reset_dangnhappost'
]);
Route::get('/logut-dang-nhap',[
  'as'=>'logout-dang-nhap',
  'uses'=>'admincontroller@getlogoutdangnhap'
]);
//phân quan trị quyền
      




route::group(['prefix'=>'wp-admin','middleware'=>'Quantri'],function(){

  Route::get('/',[
    'as'=>'wp_admin',
    'uses'=>'controllerquantri@index',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);



  Route::get('/danh-sach-quan-nhan-mat-tich-mat-tin',[
    'as'=>'indexds',
    'uses'=>'cotrollerquannhan@indexds',
       'middleware'=>'Checkquyen:xem-danh-sach-quan-nhan'

  ]);
   Route::get('/chi-tiet-quan-nhan-mat-tich-mat-tin/{id}',[
    'as'=>'chitietquannhan',
    'uses'=>'cotrollerquannhan@chitietquannhan',
 'middleware'=>'Checkquyen:xem-danh-sach-quan-nhan'

  ]);

  


  Route::get('/nhap-danh-sach-quan-nhan-mat-tich-mat-tin',[
    'as'=>'importexcel',
    'uses'=>'cotrollerquannhan@importexcel',
 'middleware'=>'Checkquyen:them-quan-nhan'

  ]);

  Route::post('import_excel_post/import',[
  'as'=>'ep',
  'uses'=>'cotrollerquannhan@import',
  'middleware'=>'Checkquyen:them-quan-nhan'

]);


  Route::get('/them-quan-nhan-mat-tich-mat-tin',[
    'as'=>'themquannhan',
    'uses'=>'cotrollerquannhan@themquannhan',
 'middleware'=>'Checkquyen:them-quan-nhan'

  ]);

  Route::post('/them-quan-nhan-mat-tich-mat-tin-post',[
    'as'=>'themquannhanpost',
    'uses'=>'cotrollerquannhan@themquannhanpost',
 'middleware'=>'Checkquyen:them-quan-nhan'

  ]);

  Route::get('/sua-quan-nhan-mat-tich-mat-tin/{id}',[
    'as'=>'suaquannhan',
    'uses'=>'cotrollerquannhan@suaquannhan',
 'middleware'=>'Checkquyen:sua-quan-nhan'

  ]);

  Route::post('/sua-quan-nhan-mat-tich-mat-tin-post/{id}',[
    'as'=>'suaquannhanpost',
    'uses'=>'cotrollerquannhan@suaquannhanpost',
 'middleware'=>'Checkquyen:sua-quan-nhan'

  ]);

 Route::get('/xoa-quan-nhan-mat-tich-mat-tin/{id}',[
    'as'=>'xoaquannhan',
    'uses'=>'cotrollerquannhan@xoaquannhan',
 'middleware'=>'Checkquyen:xoa-quan-nhan'

  ]);

//bao qáo 

 Route::get('/bao-cao-quan-nhan',[
  'as'=>'baocao',
  'uses'=>'cotrollerquannhan@baocao',
// 'middleware'=>'Checkquyen:xoa-quan-nhan'

 ]);
 Route::get('/bao-cao-quan-nhan-post',[
  'as'=>'baocaopost',
  'uses'=>'cotrollerquannhan@baocaopost',
// 'middleware'=>'Checkquyen:xoa-quan-nhan'

 ]);











    Route::get('/gioi-thieu.html',[
    'as'=>'gioiThieu',
    'uses'=>'ControllerGioiThieu@index',
 //'middleware'=>'Checkquyen:xemGioiThieu'

  ]);

    Route::get('/sua-gioi-thieu/{id}',[
      'as'=>'suagioiThieu',
      'uses'=>'ControllerGioiThieu@suagioiThieu',
    'middleware'=>'Checkquyen:suaGioiThieu'

    ]);


    Route::post('/sua-gioi-thieu/{id}',[
      'as'=>'suagioiThieupost',
      'uses'=>'ControllerGioiThieu@suagioiThieupost',
    'middleware'=>'Checkquyen:suaGioiThieu'
    ]);

    Route::post('/them-gioi-thieu',[
      'as'=>'themgioiThieu',
      'uses'=>'ControllerGioiThieu@themgioiThieu',
   'middleware'=>'Checkquyen:xemGioiThieu'
    ]);

    Route::get('/xoa-gioi-thieu/{id}',[
      'as'=>'xoagioiThieu',
      'uses'=>'ControllerGioiThieu@xoagioiThieu',
    'middleware'=>'Checkquyen:xoaGioiThieu'
    ]);


  Route::get('/san-pham.html',[
    'as'=>'sanpham',
    'uses'=>'controllerSanpham@index',
    
  ]);

Route::post('/them-san-pham',[
    'as'=>'themsanpham',
    'uses'=>'controllerSanpham@themsanpham',
    'middleware'=>'Checkquyen:xemSanPham'
  ]);

Route::get('/sua-san-pham/{id}',[
  'as'=>'suasanpham',
  'uses'=>'controllerSanpham@suasanpham',
    'middleware'=>'Checkquyen:suaSanPham'

]);


Route::post('/sua-san-pham/{id}',[
  'as'=>'suasanPhampost',
  'uses'=>'controllerSanpham@suasanPhampost',
    'middleware'=>'Checkquyen:suaSanPham'
]);



   Route::get('/xoa-san-pham/{id}',[
      'as'=>'xoasanpham',
      'uses'=>'controllerSanpham@xoasanpham',
    'middleware'=>'Checkquyen:xoaSanPham'
   ]);



Route::get('/loai-tin.html',[
  'as'=>'loaitin',
  'uses'=>'controllerloaitin@index',
   

]);

Route::get('/sua-loai-tin{id}',[
  'as'=>'sualoaitin',
  'uses'=>'controllerloaitin@sualoaitin',
    'middleware'=>'Checkquyen:suaLoaiTin'
]);


Route::post('/sua-loai-tin/{id}',[
  'as'=>'sualoaitinpost',
  'uses'=>'controllerloaitin@sualoaitinpost',
    'middleware'=>'Checkquyen:suaLoaiTin'
]);

Route::post('/them-loai-tin',[
    'as'=>'themloaitin',
    'uses'=>'controllerloaitin@themloaitin',
    'middleware'=>'Checkquyen:xemLoaiTin'
  ]);


Route::get('/xoa-loai-tin/{id}',[
  'as'=>'xoaloaitin',
  'uses'=>'controllerloaitin@xoaloaitin',
    'middleware'=>'Checkquyen:xoaLoaiTin'
]);


Route::get('/ban-tin.html',[
  'as'=>'bantin',
  'uses'=>'controllerbantin@index',
   

]);

Route::get('/sua-ban-tin/{id}.html',[
  'as'=>'suabantin',
  'uses'=>'controllerbantin@suabantin',
    'middleware'=>'Checkquyen:suaBanTin'

]);


Route::post('/sua-ban-tin-post/{id}',[
  'as'=>'suabantinpost',
  'uses'=>'controllerbantin@suabantinpost',
    'middleware'=>'Checkquyen:suaBanTin'
]);

Route::post('/them-ban-tin',[
    'as'=>'thembantin',
    'uses'=>'controllerbantin@thembantin',
    'middleware'=>'Checkquyen:xemBanTin'
  ]);


Route::get('/xoa-ban-tin/{id}',[
  'as'=>'xoabantin',
  'uses'=>'controllerbantin@xoabantin',
    'middleware'=>'Checkquyen:xoaBanTin'
]);


Route::get('/slide.html',[
  'as'=>'slide',
  'uses'=>'controllerslide@index',
   
]);


Route::post('/them-slide',[
    'as'=>'themslide',
    'uses'=>'controllerslide@themslide',
    'middleware'=>'Checkquyen:xemSlide'
  ]);

Route::get('/xoa-slide/{id}',[
  'as'=>'xoaslide',
  'uses'=>'controllerslide@xoaslide',
    'middleware'=>'Checkquyen:xoaBanTin'
]);


/// quan trị phân quyền
Route::get('/vai-tro-quan-tri.html',[
    'as'=>'vaitro',
    'uses'=>'controllerquyen@index',
    // 'middleware'=>'Checkquyen:xemSlide'
  ]);

Route::post('/them-vai-tro-quan-tri.html',[
    'as'=>'themvaitro',
    'uses'=>'controllerquyen@themvaitro',
    // 'middleware'=>'Checkquyen:xemSlide'
  ]);

 Route::get('/xoa-vai-tro-quan-tri{id}',[
    'as'=>'xoavaitro',
    'uses'=>'controllerquyen@xoavaitro',
    // 'middleware'=>'Checkquyen:xemSlide'
  ]);


Route::get('/nguoi-dung.html',[
    'as'=>'nguoidung',
    'uses'=>'controllernguoidung@index',
    // 'middleware'=>'Checkquyen:xemSlide'
  ]);

Route::post('/them-nguoi-dung.html',[
    'as'=>'themnguoidung',
    'uses'=>'controllernguoidung@themnguoidung',
    // 'middleware'=>'Checkquyen:xemSlide'
  ]);

Route::get('/tinh-toan-san-pham',[
    'as'=>'tinhtoan',
    'uses'=>'controllerTinhtoan@index',
    // 'middleware'=>'Checkquyen:xemSlide'
  ]);




});






//-end phần cính










Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
