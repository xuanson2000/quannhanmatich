
<!DOCTYPE html>
<html lang="en">
<head>
<title>LOGIN</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="public/web/css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="public/web/css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body>
		<!--header-->
		<div class="header-w3l">
			<h1 style="font-size: 25px; margin-bottom: 50px; font-weight: bold;"> CƠ SỞ DỮ LIỆU QUÂN NHÂN MẤT TÍCH, MẤT TIN</h1>
		</div>
		<!--//header-->
		<!--main-->
		<div class="main-w3layouts-agileinfo">
	           <!--form-stars-here-->
						<div class="wthree-form">
							<h2>ĐĂNG NHẬP VÀO HỆ THỐNG</h2>
							@if(count($errors)>0)
							<div class="alert alert-danger">
								@foreach($errors->all() as $err )
								{{
									$err
								}}
								@endforeach
							</div>
							@endif
							@if(Session::has('loginb'))
							<div class="alert alert-success">{{Session::get('loginb')}}</div>
							@endif
							<form action="{{route('dangnhappost')}}" method="post">
								<input type="hidden"  name="_token" value="{{csrf_token()}}" >
								<div class="form-sub-w3">
									<input type="text" name="username" placeholder="Tài khoản " required="" />
								<div class="icon-w3">
									<i class="fa fa-user" aria-hidden="true"></i>
								</div>
								</div>
								<div class="form-sub-w3">
									<input type="password" name="matkhau" placeholder="Mật khẩu" required="" />
								<div class="icon-w3">
									<i class="fa fa-unlock-alt" aria-hidden="true"></i>
								</div>
								</div>
								<label class="anim">
								<input type="checkbox" class="checkbox">
									<span>Lưu lại mật khẩu</span> 
									<a href="#">Quên mật khẩu</a>
								</label> 
								<div class="clear"></div>
								<div class="submit-agileits">
									<input type="submit" value="Đăng nhập">
								</div>
							</form>

						</div>
				<!--//form-ends-here-->

		</div>
		<!--//main-->
		<!--footer-->
		<div class="footer">
			<p>&copy; 2020 Cơ sở dữ liệu Quân nhân mất tin, mất tích | FIT Việt Nam <a href="fitvietnam.com.vn">fitvietnam.com.vn</a></p>
		</div>
		<!--//footer-->
</body>
</html>