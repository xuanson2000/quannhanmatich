
 @extends('khoangsan.layout')
 @section('title')
 {{$idbantins->tenBantin}}
 @endsection
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





	<h4 style="margin-bottom: 20px; margin-top: 20px;">Sửa ban tin</h4>  

	<form action="{{route('suabantinpost',[$idbantins->id])}}" method="POST" enctype="multipart/form-data">
		<input type="hidden"  name="_token" value="{{csrf_token()}}" >
	
		<div class=" form-group" style=" margin-top: 10px;">
			<label>Loại tin</label>
			<select class="form-control" name="idLoaitin" id="idLoaitin" required="">
               <option value="{{$idbantins -> LoaiTin->id}}">{{$idbantins->LoaiTin->tenLoaitin }}</option>
				<option value="">Chọn loại tin</option>
				
			</select>
		</div>

		<div class="form-group">
			<label>Tên bản tin</label>
			<input class="form-control" name="tenBantin" value="{{$idbantins->tenBantin}}" />
		</div>

		<div class="form-group">
			<label>Tóm tắt</label>


			<textarea style="height: 200px;" name="tomTat" class="form-control " id="tomTat">
				{{ $idbantins->tomTat}}
			</textarea>
			<script> CKEDITOR.replace('tomTat'); </script>

		</div> 

	

		<div class="form-group">
			<label>Nội dung</label>


			<textarea style="height: 200px;" name="noidung" class="form-control " id="noidung">
				{{ $idbantins->noidung}}
			</textarea>
			<script> CKEDITOR.replace('noidung'); </script>

		</div> 

		<div class="form-group">
			<label>Ảnh đại diện</label>
			<br> <img style="width:120px; height: 120px;" src="public/anh/{{$idbantins->anh}}">
		<br>	<br>
		<input class="form-control" type="file" name="anh" value="{{$idbantins->anh}}"  />
		

		</div>

		<button type="submit" class="btn btn-default">Lưu lại</button>

	<form>

</div>




  


  @endsection


