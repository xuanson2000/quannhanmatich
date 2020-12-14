
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


  @if(Session::has('messgthemexcel'))
  <div class="alert alert-success">{{Session::get('messgthemexcel')}}</div>
  @endif

  @if(Session::has('messgsua'))
  <div class="alert alert-success">{{Session::get('messgsua')}}</div>
  @endif

  @if(Session::has('messgthem'))
  <div class="alert alert-success">{{Session::get('messgthem')}}</div>
  @endif

  @if(Session::has('messgxoa'))
  <div class="alert alert-success">{{Session::get('messgxoa')}}</div>
  @endif
  
 @if(Session::has('canhbao'))
  <div class="alert alert-success">  <img src="public/anh/file.gif" style="width: 30px;"> <p style="color: red;">{{Session::get('canhbao')}}</p> </div>
  @endif

  
  <div class="row">
    <div class="col-md-10"><h4 style="margin-bottom: 20px; margin-top: 20px;">DANH SÁCH QUÂN NHÂN MẤT TICH, MẤT TIN</h4>   </div>
     <div class="col-md-2"> 
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Thêm mới dữ liệu
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="{{route('importexcel')}}">Nhập từ file excel</a></li>
            <li><a href="{{route('themquannhan')}}">Nhập bằng hệ thống</a></li>
          </ul>
        </div>

      
     </div>
  </div>         


  <table id="example" class="table table-bordered" style="width:100%">
        <thead style="background-color: #5C7384;color: white;">
            <tr >
              <th> Họ tên</th>
              <th>Ngày sinh</th>
              <th>Quê quán</th>
              
              <th>Ngày nhập ngũ</th>
              <th>Đơn vị</th>
              <th>Người thân</th>
              <th>Thời gian, đia điểm MTMT</th>
              <th>Thao tác</th>
                
            </tr>
        </thead>
        <tbody>
          @foreach($quannhans as $quannhan)
            <tr>
              <td> <a href="{{route('chitietquannhan',[$quannhan->id])}} ">{{ $quannhan->hoten}}</a></td>
                
                <td> {{date('d-m-Y', strtotime($quannhan->ngaysinh))}}</td>
                <td>{{ $quannhan->quequan}}</td>
                <td> {{date('d-m-Y', strtotime($quannhan->ngaynhapngu))}}</td>
                <td>{{ $quannhan->donvi}}</td>
                <td>Họ tên bố: {{ $quannhan->hotenbo}} <br>
                Họ tên mẹ: {{ $quannhan->hoteme}}
                Họ tên vợ: {{ $quannhan->hotenvo}}
                 </td>
                <td>{{ $quannhan->thoigiandiadiemmt}}</td>
               <td> <a href="{{route('suaquannhan',[$quannhan->id])}}"> Sửa</a> / <a href="{{route('xoaquannhan',[$quannhan->id])}}"> Xóa</a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th> </th>
                <th></th>
                 <th> </th>
                    <th> </th>
          
            </tr>
        </tfoot>
    </table>


</div>


    <script>

      $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder=" '+title+'" />' );
    } );

    // DataTable
    var table = $('#example').DataTable({
      initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
              var that = this;

              $( 'input', this.footer() ).on( 'keyup change clear', function () {
                if ( that.search() !== this.value ) {
                  that
                  .search( this.value )
                  .draw();
                }
              } );
            } );
          }
        });

  } );
</script>



  @endsection


