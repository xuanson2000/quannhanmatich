
@extends('khoangsan.layout')
@section("content12")
 

<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">


<div class="row">
	 
	 <div class="col-md-4">
	 	<p style="color: white; font-weight: bold; background-color: #2B4361; padding: 3px 3px 3px 5px;"> THÔNG TIN QUÂN NHÂN</p>
	 	
	 	<table class="table table-bordered" style="background-color: #E2EDFA;">
	 	
	 		<tbody>

	 			<tr>
	 				<td style="width: 150px;" >Họ tên Quân nhân</td>
	 				<td>{{$quannhanid->hoten}}</td>
	 			</tr>
	 			<tr>
	 				<td>Ngày sinh</td>
	 			
	 				<td> {{date('d-m-Y', strtotime($quannhanid->ngaysinh))}}</td>
	 			</tr>

	 			<tr>
	 				<td>Quê quán</td>
	 				<td>{{$quannhanid->quequan}}</td>
	 			</tr>
	 			<tr>
	 				<td>Ngày nhập ngũ  </td>
	 			
	 				<td> {{date('d-m-Y', strtotime($quannhanid->ngaynhapngu))}}</td>
	 			</tr>
	 			<tr>
	 				<td>Đơn vị </td>
	 				<td>{{$quannhanid->donvi}}</td>
	 			</tr>
	 			<tr>
	 				<td>Cấp bậc</td>
	 				<td>{{$quannhanid->capbac}}</td>
	 			</tr>
	 			<tr>
	 				<td>Chức vụ</td>
	 				<td>{{$quannhanid->chucvu}}</td>
	 			</tr>


	 		</tbody>
	 	</table>

	 </div>
	 <div class="col-md-4">
	 	<p style="color: white; font-weight: bold; background-color: #2B4361; padding: 3px 3px 3px 5px;"> THÔNG TIN NGƯỜI THÂN QUÂN NHÂN</p>
	 	
	 	<table class="table table-bordered" style="background-color: #E2EDFA;">
	 	
	 		<tbody>

	 			<tr>
	 				<td style="width: 150px;">Họ tên Bố </td>
	 				<td>{{$quannhanid->hoten}}</td>
	 			</tr>
	 			<tr>
	 				<td>Họ tên Mẹ </td>
	 				<td>{{$quannhanid->hotenme}}</td>
	 			</tr>

	 			<tr>
	 				<td>Họ tên Vợ</td>
	 				<td>{{$quannhanid->hotenvo}}</td>
	 			</tr>
	 			<tr>
	 				<td>Người thân khác </td>
	 				<td>{{$quannhanid->nguoithankhac}}</td>
	 			</tr>
	 			


	 		</tbody>
	 	</table>

	 </div>
	 <div class="col-md-4">
	 	
	 	<p style="color: white; font-weight: bold; background-color: #2B4361; padding: 3px 3px 3px 5px;"> THÔNG TIN HỒ SƠ QUÂN NHÂN</p>
	 	
	 	<table class="table table-bordered" style="background-color: #E2EDFA;">
	 	
	 		<tbody>

	 			<tr>
	 				<td style="width: 150px;">Thời gian, địa điểm mất tích, mất tin </td>
	 				<td>{{$quannhanid->thoigiandiadiemmt}}</td>
	 			</tr>
	 			<tr>
	 				<td>Trường hợp mất tích, mất tin</td>
	 				<td>{{$quannhanid->truonghopmt}}</td>
	 			</tr>

	 			<tr>
	 				<td>Hồ sơ, tài liệu còn lưu trữ, nơi lưu trữ </td>
	 				<td>{{$quannhanid->hosoluuluu}}</td>
	 			</tr>
	 			<tr>
	 				<td>Kết quả xác minh, đơn vị xác minh  </td>
	 				<td>
	 				 {{$quannhanid->ketquaxacminh}} <br>
	 				{{$quannhanid->donvixacminh}}</td>
	 			</tr>
	 			<tr>
	 				<td>Kết quả thực hiện chính sách  </td>
	 			 
                      	<td>

                        {{$quannhanid->ketquathuchienchinhsach}}
	 				</td>
	 				
           
	 			</tr>
	 			<tr>
	 				<td>Ngày báo tử</td>
	 		
	 				<td> {{date('d-m-Y', strtotime($quannhanid->ngaybaotu))}}</td>
	 			</tr>
	 			<tr>
	 				<td>Số giấy báo tử</td>
	 				<td>{{$quannhanid->sogiaybaotu}}</td>
	 			</tr>


	 		</tbody>
	 	</table>

	 </div>


</div>





</div>




  @endsection


