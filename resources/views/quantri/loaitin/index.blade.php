
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
  


  <h4 style="margin-bottom: 20px; margin-top: 20px;">DANH SÁCH LOẠI TIN</h4>            
  <table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th>TÊN LOẠI TIN</th>
    		<th>THAO TÁC</th>
    	</tr>
    </thead>
    <tbody>
      
        
     @foreach($loatins as $loatin)
        <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$loatin->tenLoaitin}}</td>

        <td> <a href="{{route('sualoaitin',[$loatin->id])}}"> <img  alt="Sửa" src="public/anh/b_edit.png"></a> 

         <a onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"  href="{{route('xoaloaitin',[$loatin->id])}}"><img alt="Xóa" src="public/anh/b_drop.png"></td></a> 	
      </tr>
      @endforeach
    </tbody>
  </table>

  <a style="float: right;" class="btn btn-info" role="button" data-toggle="modal" data-target="#myModal" >Thêm mới</a>
</div>


<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm loại tin</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        	<form action="{{route('themloaitin')}}" method="POST" enctype="multipart/form-data">
        		<input type="hidden"  name="_token" value="{{csrf_token()}}" >
        		 
        		<div class="form-group">
        			<label>Tên loại tin</label>
        			<input class="form-control" name="tenloaitin"  />
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


