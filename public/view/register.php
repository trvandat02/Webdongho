<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register page</title>
	<link rel="stylesheet" href="../style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>
<body> -->
	<main class="login-main">
		<div class="login-group">
			<h1 class="login-title">Đăng ký</h1>
			<br>
			<br>
			<form action="index.php?action=registersubmit" method="POST" class="login-form" id="register_form">

				<?php if(isset($register_err) && $register_err==1) echo '<font color="red"><i class="fas fa-exclamation-circle"></i>Tên đăng nhập đã tồn tại.</font><br>'; ?>

				<label for="username" class="login-label"><i class="fas fa-user"></i></label>
				<input type="text" name="username" id="username" placeholder="Nhập tài khoản..." class="ms-2">
				<br>
				<br>
				<label for="name" class="login-label"><i class="fas fa-id-card"></i></label>
				<input type="text" name="name" id="name" placeholder="Nhập họ tên..." class="ms-2">
				<br>
				<br>
				<label for="email" class="login-label"><i class="fas fa-envelope"></i></label>
				<input type="text" name="email" id="email" placeholder="Nhập email..." class="ms-2">
				<br>
				<br>
				<label for="phone" class="login-label"><i class="fas fa-phone"></i></label>
				<input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại..." class="ms-2">
				<br>
				<br>
				<label for="password" class="login-label"><i class="fas fa-lock"></i></i></label>
				<input type="password" name="password" id="password" placeholder="Nhập mật khẩu..." class="ms-2">
				<br>
				<br>
				<label for="confirmpassword" class="login-label"><i class="fas fa-lock"></i></label>
				<input type="password" name="confirmpassword" id="conf-password" placeholder="Nhập lại mật khẩu..." class="ms-2">
				<br>
				<br>
				<button type="submit" name="register" class="btn btn-primary me-3">Đăng ký</button>
				<!-- <button type="button" name="forgetpw" class="btn btn-light ">Quên mật khẩu</button> -->
				<br>
				<br>
				<p>Bạn đã có tài khoản? <a href="index.php?action=login">Đăng nhập</a></p>				
				<!-- <p>-- Hoặc đăng nhập bằng --</p>
				<a href=""><i class="fab fa-google"></i></a>
				<a href=""><i class="fab fa-facebook"></i></a> -->
			</form>
		</div>
	</main>
<!-- </body>
</html> -->