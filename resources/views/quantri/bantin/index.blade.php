
 @extends('khoangsan.layout')
 

@section("content12")
 


<style type="text/css">
   th{
    text-align: center;
    background-color: #81919B;
    color: white;
   font-size: 16px;
  }
 td{
  font-family: "Times New Roman", Times, serif;
  font-size: 16px;
 }
 
</style>
<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">
  

	@if(Session::has('messgsua'))
	<div class="alert alert-success">{{Session::get('messgsua')}}</div>
	@endif

	@if(Session::has('messgthem'))
	<div class="alert alert-success">{{Session::get('messgthem')}}</div>
	@endif

    @if(Session::has('messgxoa'))
  <div class="alert alert-success">{{Session::get('messgxoa')}}</div>
  @endif
  


  <h4 style="margin-bottom: 20px; margin-top: 20px;">DANH SÁCH BẢN TIN</h4>            
  <table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th>TÊN BẢN TIN </th>
    		<th>THỂ LOẠI</th>
    		<th>NGÀY ĐĂNG</th>
            <th>NGƯỜI ĐĂNG</th>
    		<th>THAO TÁC</th>
    	</tr>
    </thead>
    <tbody>
      
        
     @foreach($bantins as $bantin)
        <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$bantin ->tenBantin}}</td>
        <td>{{ !empty($bantin->LoaiTin) ? $bantin->LoaiTin->tenLoaitin:'' }}</td>
     
          <td> {{date('d-m-Y', strtotime($bantin ->creater_at))}}</td>
       <td>{{$bantin->quantri->namclass}}</td>
        
        <td> <a href="{{route('suabantin',[$bantin->id])}}"> <img  alt="Sửa" src="public/anh/b_edit.png"></a> 

         <a onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"  href="{{route('xoabantin',[$bantin->id])}}"><img alt="Xóa" src="public/anh/b_drop.png"></a></td> 	
      </tr>
      @endforeach
    </tbody>
  </table>

  <a style="float: right;" class="btn btn-info" role="button" data-toggle="modal" data-target="#myModal" >Thêm mới</a>
</div>


<!-- The Modal -->
  <div class="modal fade" id="myModal" >
    <div class="modal-dialog"style="width: 80%;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm mới bản tin</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        	<form action="{{route('thembantin')}}" method="POST" enctype="multipart/form-data">
        		<input type="hidden"  name="_token" value="{{csrf_token()}}" >
        		 
        		
                 
        		<div class=" form-group" style=" margin-top: 10px;">
        			<label>Loại tin</label>
        			<select class="form-control" name="idLoaitin" id="idLoaitin" required="">
        				<option value="">Chọn loại tin</option>
        				@foreach($loaitins as $loaitin)
        				<option value="{{$loaitin->id}}">{{$loaitin->tenLoaitin}}</option>
        				@endforeach
        			</select>
        		</div>


        		<div class="form-group">
        			<label>Tên bản tin</label>
        			<input class="form-control" name="tenBantin"  />
        		</div>

                <div class="form-group">
        			<label>Tóm tắt</label>

        			<textarea style="height: 150px;" name="tomTat" class="form-control " id="tomTat">

        			</textarea>
        			<script> CKEDITOR.replace('tomTat'); </script>
        		</div>

        		<div class="form-group">
        			<label>Nội dung</label>

        			<textarea style="height: 150px;" name="noidung" class="form-control " id="noidung">

        			</textarea>
        			<script> CKEDITOR.replace('noidung'); </script>
        		</div>
        		<div class="form-group">
        			<label>Ảnh đại diện</label>

        			   <input type="file" name="image">


        		</div>

        		
        		<button type="submit" class="btn btn-default">Lưu lại</button>

        		</form>
        	

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
        
      </div>
    </div>
  </div>



  


  @endsection


