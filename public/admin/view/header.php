<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Link -->
	<link rel="stylesheet" href="./styleadmin.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script
        type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"
    ></script>
    <!-- Link -->
	<title>admin</title>
</head>
<body class="admin-body">
	<div class="row div-group d-flex">
		<div class="col-md-2 admin-sidebar" id="bodyleft">
			<!-- sidebar -->
			<h3 class="text-end admin-title">ADMIN</h3>
			<hr>
			<a href="index.php?action=dashboard" class="sidebar-link"><i class="fas fa-tachometer-alt"></i> Trang chủ</a>
			<hr>
			<p style="color:#D8D8D8;">INTERFACE</p>
			<a href="index.php?action=qlthuonghieu" class="row sidebar-link d-flex">
				<i class="fas fa-wrench col-9 offset-1"> Quản lý thương hiệu</i>				
				<i class="fas fa-chevron-right col-1"></i>
			</a>
			<a href="index.php?action=qlsanpham" class="row sidebar-link d-flex">
				<i class="fas fa-wrench col-9 offset-1"> Quản lý sản phẩm</i>				
				<i class="fas fa-chevron-right col-1"></i>
			</a>			
			<a href="index.php?action=qltaikhoan" class="row sidebar-link d-flex">
				<i class="fas fa-wrench col-9 offset-1"> Quản lý tài khoản</i>				
				<i class="fas fa-chevron-right col-1"></i>
			</a>
			<a href="index.php?action=qllienhe" class="row sidebar-link d-flex">
				<i class="fas fa-wrench col-9 offset-1"> Quản lý liên hệ</i>				
				<i class="fas fa-chevron-right col-1"></i>
			</a>
			<a href="index.php?action=qldonhang" class="row sidebar-link d-flex">
				<i class="fas fa-wrench col-9 offset-1"> Quản lý đơn hàng</i>				
				<i class="fas fa-chevron-right col-1"></i>
			</a>
			<!-- <a href="index.php?action=qlthongke" class="row sidebar-link d-flex">
				<i class="fas fa-wrench col-9 offset-1"> Thống kê</i>				
				<i class="fas fa-chevron-right col-1"></i>
			</a> -->
			<hr>
		</div>

		<div class="col-md-10 admin-right">
			<div class="row admin-header"  id="bodyleft1">
				<!-- header -->
				<!-- <form action="" class="col-md-4">
					<div class="d-flex">
						<input type="text" placeholder="Search...." class="form-control me-2">
						<button class="btn btn-outline-success">Search</button>
					</div>
				</form> -->
				<div class="col text-center">
					<span><img src="../images/user.png" width="4%" alt="">
						<?php 
							if(isset($_SESSION['role'])&&$_SESSION['role']==1){
								echo $_SESSION['username'];
							}
						?>
					</span>
					<a href="index.php?action=logout" class="text-reset"><i class="fas fa-sign-out-alt"></i>&nbsp;Đăng xuất</a>
				</div>
			</div>
<!-- end header -->
			<div class="row">
			<!-- main contents -->
				<div class="col-12 admin-main">

