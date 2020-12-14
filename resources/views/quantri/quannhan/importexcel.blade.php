
@extends('khoangsan.layout')
@section("content12")
 

<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">


	<div class="row" style="  max-width: 70%; margin: 0 auto;  box-shadow: 3px 3px 5px 0px #666;">


		<form method="post" enctype="multipart/form-data" action="{{route('ep')}}">
		{{ csrf_field() }}
		<div class="form-group">
			<table class="table">
				<tr>
					<h5 style="padding-left: 20px;  color: blue; font-size: 16px; font-weight: bold;">NHẬP DỮ LIỆU TỪ FILE EXCEL</h5>

				</tr>
				<tr>
					<td width="40%" align="right"><label>Chọn file cần Upload</label></td>
					<td width="30">
						<input type="file" name="select_file" />
					</td>
					<td width="30%" align="left">
						<input type="submit" name="upload" class="btn btn-primary" value="Upload">
					</td>

				</tr>
				<tr>
					<td width="40%" align="right"></td>
					<td width="30"><span style="color: red;" class="text-muted"> Chú ý: Định dạng file .xls, .xslx ; trên file chỉ để 1 sheet nhập đúng định dạng trên file mẫu</span></td>
					<td width="30%" align="left"></td>
					


				</tr>
				<tr>
					
					<td>	<a href="public/tailieu/lietsy.xlsx" style="color: red; font-weight: bold;">Tải File import mẫu tại đây</a></td>


				</tr>
			</table>
		</div>
	</form>
	</div>

	




</div>




  @endsection


