@extends('khoangsan.layout')
@section("content12")
 

<style type="text/css">
tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }

</style>


<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">


	<div class="row">
		 <h4> BÁO CÁO THEO: </h4>
		 <form action="{{route('baocaopost')}}" method="GET" enctype="multipart/form-data">
		 	<input type="hidden"  name="_token" value="{{csrf_token()}}" >

		 	<div class="col-md-4">
		 		
		 		      
              <div class="form-group">
              	

              	<label><input type="radio" name="radio1" value="1" onClick="getResults()"> Báo cáo theo đơn vị công tác</label><br>

              	<label><input type="radio" name="radio1" value="2"> Báo cáo theo DS quân nhân đã công nhận liệt sỹ </label>

              	<label><input type="radio" name="radio1" value="3">  Báo cáo theo DS quân nhân chưa công nhận liệt sỹ  </label>

              

              

             </div>

		 	</div>

		 	<script >
		 		$(document).ready(function() {
		 			$(".text").hide()
		 			$('[name=radio1]').on('change', function(){
		 				$('.text').toggle(this.value ==1);
		 			})
		 		});
		 	</script>

		 	<div class="col-md-6">

		 		<div class="text">
		 			<label for="usr">Nhập tên đơn vị công tác  </label>
		 			<input type="text" class="form-control" name="tukhoa"  id="text1">
		 		</div>
		 	</div>

		 	<div class="col-md-2">

		 	<button style="float: right; margin-top: 20px;" type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Xuất file</button>
		 	</div>
		 
		 </form>



	</div>
  

  
  
  
  </div>         


 


</div>



  @endsection
