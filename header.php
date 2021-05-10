<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8"/>
	<meta name="author" content="nguyendinhanh"/>
	<link href="/hoangdinhhanh/stie.css" rel="stylesheet"/>
	<link href="/hoangdinhhanh/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<title>Project training - website bán hàng</title>
</head>
<body>
	<div id="wrapper">
		<h2>Project training - xây dựng website bán hàng</h2>
		<?php
			session_start();
			if(isset($_SESSION['user'])!="")
			{
				echo "<h2>Xin chào:".$_SESSION['user']."<a href='/hoangdinhhanh/logout.php'>Logout</a></h2>";
			}
			else
			{
				echo "<h2>Bạn chưa đăng nhập<a href='/hoangdinhhanh/login.php'>Login</a> - <a 
				href='/hoangdinhhanh/register.php'>Register</a>></h2>";
			}
		?>
		<div class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="/hoangdinhhanh/list_product.php">Danh sách sản phẩm</a>
					<a class="navbar-brand" href="/hoangdinhhanh/add_product.php">Thêm sản phẩm</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
