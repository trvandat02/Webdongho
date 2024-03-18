<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login page</title>
	<link rel="stylesheet" href="../style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>
<body> -->
	<main class="login-main">
		<div class="login-group">
			<h1 class="login-title">Đăng nhập</h1>
			<br>
			<br>
			<form action="index.php?action=loginsubmit" method="POST" class="login-form">
				<?php if(isset($login_err) && $login_err==1) echo '<font color="red"><i class="fas fa-exclamation-circle"></i>Tên đăng nhập hoặc mật khẩu không đúng.</font><br>'; ?>
				<?php if(isset($register_err) && $register_err==0) echo '<font color="green"><i class="fas fa-exclamation-circle"></i>Bạn đã đăng ký thành công.</font><br>'; ?>

				<label for="username" class="login-label"><i class="fas fa-user"></i></label>
				<input type="text" name="username" id="username" placeholder="Nhập tài khoản..." class="ms-2">
				<br>
				<br>
				<label for="password" class="login-label"><i class="fas fa-lock"></i></label>
				<input type="password" name="password" id="password" placeholder="Nhập mật khẩu..." class="ms-2">
				<br>
				<br>
				<button type="submit" name="login" class="btn btn-primary me-3">Đăng nhập</button>
				<button type="button" name="forgetpw" class="btn btn-light ">Quên mật khẩu</button>
				<br>
				<br>
				<p>Bạn chưa có tài khoản? <a href="index.php?action=register">Đăng ký</a></p>				
				<p>-- Hoặc đăng nhập bằng --</p>
				<a href=""><i class="fab fa-google"></i></a>
				<a href=""><i class="fab fa-facebook"></i></a>
			</form>
		</div>
	</main>
<!-- </body>
</html> -->