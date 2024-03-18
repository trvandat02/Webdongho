<!-- <?php var_dump($_SESSION['cart']); ?> -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shopping cart</title>
	<link rel="stylesheet" href="../style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>
<body>
	<main class="cart-main">
		<div class="cart-group">
			<h1 class="cart-title">Giỏ hàng</h1>

			<hr>
			<?php
				if(!isset($_SESSION['cart'])){
					echo '
					<h4 class"text-center">Bạn chưa có sản phẩm trong giỏ hàng!</h4>
					<a href="index.php" class="btn btn-success cart-buy-btn">Trở về trang chủ</a>';
				} else {
			?>
			<!-- <form action="" method="POST" class="cart-form"> -->
			<div class="cart-form">
				<!-- <div class="row d-flex">
					<div class="col-md-3">
						<img src="./images/swatch.jpg" alt="product">
					</div>
					<div class="col-md-9">
						<p>Tên sản phẩm</p>
						<input type="number" value="1" class="cart-quantity" name="quantity"> <span class="cart-product-price ms-2">820.000 đ</span>
						<br>
						<br>
						<button class="btn btn-danger"><i class="fas fa-trash"></i></button>
					</div>
				</div>
				<hr> -->
				<?php
					showcart();
				?>
				<!-- <div class="row">
					<div class="col-md-6">Tạm tính:</div>
					<div class="col-md-6 text-end">820.000 đ</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6">Tổng:</div>
					<div class="col-md-6 text-end">820.000 đ</div>
				</div>
				<hr> -->
			<form action="" method="POST" class="cart-form-buy">
				<div class="cart-custom-info">
					<h3><i class="fas fa-street-view"></i> Thông tin khách hàng</h3>
					<br>
					<div class="row cart-custom-info-row">
						<div class="col-4">
							<input type="text" name="name" placeholder="Tên khách hàng">
						</div>
						<div class="col-4">
							<input type="text" name="phone" placeholder="Số điện thoại">
						</div>
						<div class="col-4">
							<input type="text" name="email" placeholder="Email">
						</div>
						<div class="col-12">
							<input type="text" name="address" placeholder="Số nhà - tên đường - xã - huyện">
						</div>
						<div class="col-12">
							<input type="text" name="address-2" placeholder="Tỉnh / thành phố">
						</div>						
					</div>
				</div>				
				<hr>
				<h3><i class="fas fa-money-check-alt"></i> Phương thức thanh toán</h3>
				<br>
				<div class="row">
					<p><input type="radio" name="pay" value="1">Thanh toán khi nhận hàng</p>
					<p><input type="radio" name="pay" value="2">Chuyển khoản</p>
				</div>
				<input class="btn btn-success cart-buy-btn" type="submit" value="Đặt hàng" name="buy">
			</form>
		</div>
			<?php } ?>
		</div>
	</main>
</body>
</html>