
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





	<h4 style="margin-bottom: 20px; margin-top: 20px;">Sửa giới thiệu</h4>  

	<form action="{{route('sualoaitinpost',[$idloatins->id])}}" method="POST" enctype="multipart/form-data">
		<input type="hidden"  name="_token" value="{{csrf_token()}}" >
	
		<div class="form-group">
			<label>Tên loại tin</label>
			<input class="form-control" name="tenLoaitin" value="{{$idloatins->tenLoaitin}}" />
		</div>

		<button type="submit" class="btn btn-default">Lưu lại</button>

	<form>

</div>




  


  @endsection


