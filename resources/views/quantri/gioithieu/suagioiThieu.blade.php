
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

	<form action="{{route('suagioiThieupost',[$idgioithieus->id])}}" method="POST" enctype="multipart/form-data">
		<input type="hidden"  name="_token" value="{{csrf_token()}}" >
	
		<div class="form-group">
			<label>Tiêu đề</label>
			<input class="form-control" name="tieuDe" value="{{$idgioithieus->tieuDe}}" />
		</div>


		<div class="form-group">
			<label>Nội dung</label>
	

		 <textarea style="height: 200px;" name="noidung" class="form-control " id="noidung">
		 		{{ $idgioithieus->noidung}}
		 </textarea>
		 <script> CKEDITOR.replace('noidung'); </script>


</div> 

		<div class="form-group">
			<label>Ảnh đại diện</label>
			<br> <img style="width:120px; height: 120px;" src="public/anh/{{$idgioithieus->anh}}">
		<br>	<br>
		<input class="form-control" type="file" name="anh" value="{{$idgioithieus->anh}}"  />
		

		</div>

		<button type="submit" class="btn btn-default">Lưu lại</button>

	<form>

</div>




  


  @endsection


