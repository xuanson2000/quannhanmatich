<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Tính toán</h2>
  <p>Thuật toán tính nâng cao</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Tên sản phẩm</th>
        <th>Giá niêm yết</th>
        <th>Giá khuyến mãi</th>
        <th>Ngày</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($tests as $test)
      <tr>
        <td>{{ $test->name}}</td>
        <td>{{ $test->gianiemyet}}</td>
        <td>{{ $test->gikhuyenmai}}</td>
        <td>{{ $test->ngay}}</td>

        
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
