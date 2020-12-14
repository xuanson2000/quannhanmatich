
@extends('khoangsan.layout')
@section("content12")
 

<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">


	<div class="row" style="">



<form action="{{route('suaquannhanpost',[$quannhanmattins->id])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{csrf_token()}}" >
            
            <div class="row">
             <div class="col-md-4">
              <p style="color: blue; font-weight: bold; font-size: 16px; border-bottom: 2px solid blue; margin-bottom: 20px;">Sửa dữ liệu Quân nhân mất tin, mất tích</p>
              <div class="form-group">
               <label for="usr">Tên Quân nhân </label>
               <input type="text" class="form-control" name="hoten"  value="{{$quannhanmattins->hoten}}">
             </div>
             <div class="form-group">
             	<label for="usr">Ngày sinh   </label>
             	<input type="date" class="form-control" name="ngaysinh"  value="{{$quannhanmattins->ngaysinh}}">
             </div>
             <div class="form-group">
             	<label for="usr">Quê quán   </label>
             	<input type="text" class="form-control" name="quequan"  value="{{$quannhanmattins->quequan}}">
             </div>
           
               <div class="form-group">
               <label for="usr">Ngày nhập ngũ   </label>
               <input type="date" class="form-control" name="ngaynhapngu"  value="{{$quannhanmattins->ngaynhapngu}}">
             </div>
             <div class="form-group">
             	<label for="usr">Đơn vị   </label>
             	<input type="text" class="form-control" name="donvi" value="{{$quannhanmattins->donvi}}" >
             </div>

              <div class="form-group">
               <label for="usr">Cấp bậc  </label>
               <input type="text" class="form-control" name="capbac" value="{{$quannhanmattins->capbac}}" >
             </div>
          
          <div class="form-group">
          		<label for="usr">Chức vụ  </label>
          		<input type="text" class="form-control" name="chucvu"  value="{{$quannhanmattins->chucvu}}">
          	</div>
          
             	
    

          </div>

          <div class="col-md-4" style="margin-top: 40px;">
          	
  
             <div class="form-group">
               <label for="usr">Họ tên Bố   </label>
               <input type="text" class="form-control" name="hotenbo" value="{{$quannhanmattins->hotenbo}}" >
             </div>

             <div class="form-group">
               <label for="usr">Họ tên Mẹ  </label>
               <input type="text" class="form-control" name="hotenme "  value="{{$quannhanmattins->hotenme}}">
             </div>
              <div class="form-group">
               <label for="usr">Họ tên Vợ  </label>
               <input type="text" class="form-control" name="hotenvo"  value="{{$quannhanmattins->hotenvo}}">
             </div>
             <div class="form-group">
             	<label for="usr">Người thân khác  </label>
             	<input type="text" class="form-control" name="nguoithankhac"  value="{{$quannhanmattins->nguoithankhac}}">
             </div>
               <div class="form-group">

             	<label for="usr">Thời gian, địa điểm mất tích, mất tin   </label>
            
             	<textarea type="text" class="form-control" name="thoigiandiadiemmt" >
             		{{$quannhanmattins->thoigiandiadiemmt}}
             	</textarea>
             </div>
             
      <div class="form-group">
             	<label for="usr">Trường hợp mất tích, mất tin  </label>
   
             	<textarea type="text" class="form-control" name="truonghopmt" >
             	{{$quannhanmattins->truonghopmt}}
             	</textarea>
             </div>
             
             		
           
           
          </div>
    
    <div class="col-md-4" style="margin-top: 40px;">

    	<div class="form-group">
    		<label for="usr">Hồ sơ, tài liệu còn lưu trữ, nơi lưu trữ  </label>
    
    		<textarea type="text" class="form-control" name="hosoluuluu" >
    			{{$quannhanmattins->hosoluuluu}}
             	</textarea>
    	</div>
              
              <div class="form-group">
              	<label for="usr">Kết quả xác minh, đơn vị xác minh  </label>
               
              

              		 @if($quannhanmattins->ketquaxacminh=="Đã tổ chức xác minh")
              		
              	    <label>
              		<input type="radio" name="radio1" value="Đã tổ chức xác minh" onClick="getResults()" checked> Đã tổ chức xác minh </label><br>
              		@else

              			<label>
              		<input type="radio" name="radio1" value="Đã tổ chức xác minh" onClick="getResults()"> Đã tổ chức xác minh </label><br>

              		@endif 


	 @if($quannhanmattins->ketquaxacminh=="Chưa  tổ chức xác minh")
              		
              	    	<label><input type="radio" name="radio1" value="Chưa tổ chức xác minh" checked >  Chưa  tổ chức xác minh 
              	</label>

              		@else

              			 	<label><input type="radio" name="radio1" value="Chưa tổ chức xác minh" >  Chưa  tổ chức xác minh 
              	</label>


              		@endif 


             
              	<div class="text"><p style="color: blue;"> Đơn vị xác minh  <br><input style="width: 100%" type="text" name="donvixacminh" id="text1" ></p></div>

               <script >
               	$(document).ready(function() {
               		$(".text").hide()
               		$('[name=radio1]').on('change', function(){
               			$('.text').toggle(this.value === 'Đã tổ chức xác minh');
               		})
               	});
               </script>

             </div>

           
             <div class="form-group">
             	<label for="usr">Kết quả thực hiện chính sách  </label>
             	 <select class="form-control" name="ketquathuchienchinhsach"  required >
               <option value="{{$quannhanmattins->ketquathuchienchinhsach}}">{{$quannhanmattins->ketquathuchienchinhsach}}</option>

                <option value="">Chọn Kết quả</option>
              
                <option value="Đã công nhận liệt sĩ">Đã công nhận liệt sĩ</option>
                <option value="Chưa công nhận liệt sĩ">Chưa công nhận liệt sĩ</option>
              </select>


             	
             </div>
             		
             		

             <div class="form-group">
             	<label for="usr">Ngày báo tử  </label>
             	<input type="date" class="form-control" name="ngaybaotu" value="{{$quannhanmattins->ngaybaotu}}">
             </div>	

             <div class="form-group">
             	<label for="usr">Số giấy báo tử </label>
             	<input type="text" class="form-control" name="sogiaybaotu" value="{{$quannhanmattins->sogiaybaotu}}">
             </div>	</div>

  </div>


  <button style="float: right;" type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Lưu lại</button>

</form> 





	</div>



</div>




  @endsection


