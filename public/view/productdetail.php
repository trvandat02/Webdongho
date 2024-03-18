<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Product page</title>

	<link rel="stylesheet" href="../style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body> -->
	<man class="productdetail-main">
		<div class="productdetail-group">
			<h6><a href="" class="text-reset">Trang chủ</a>><a href="index.php?action=productmen" class="text-reset">Sản Phẩm <?=htmlspecialchars($prd[0]['gioitinh']);?></a></h6>
			<div class="row d-flex">
				<div class="col-md-6 productdetail-left">
					<div id="carouselExample" class="carousel slide">
					  <div class="carousel-inner">
					    <div class="carousel-item active">
					      <img src="./uploads/sanpham/<?=htmlspecialchars($prd[0]['image1']);?>" class="d-block w-100 productdetail-img" alt="...">
					    </div>
					    <div class="carousel-item">
					      <img src="./uploads/sanpham/<?=htmlspecialchars($prd[0]['image2']);?>" class="d-block w-100 productdetail-img" alt="...">
					    </div>
					    <!-- <div class="carousel-item">
					      <img src="..." class="d-block w-100" alt="...">
					    </div> -->
					  </div>
					  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
					    <span style="background-color: #F5DEB3;" class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="visually-hidden">Previous</span>
					  </button>
					  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
					    <span style="background-color: #F5DEB3;" class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="visually-hidden">Next</span>
					  </button>
					</div>
				</div>
				<div class="col-md-6 productdetail-right">
					<p class="prd-brand"><?=htmlspecialchars($prd[0]['ten']);?></p>
					<p class="prd-name"><?=htmlspecialchars($prd[0]['tensp']);?></p>
					<p class="prd-price"><?=number_format($prd[0]['gia']);?> đ</p>
					<p class="prd-decription"><?=htmlspecialchars($prd[0]['mota']);?></p>
					<form action="index.php?action=themgiohang" method="POST" class="cart-add">
						<?php
						if(isset($_SESSION['role']) && $_SESSION['role']==0){
						?>
							<input type="hidden" name="id" value="<?=htmlspecialchars($prd[0]['id_sanpham']);?>">
							<input type="hidden" name="tensp" value="<?=htmlspecialchars($prd[0]['tensp']);?>">
							<input type="hidden" name="anhsp" value="<?=htmlspecialchars($prd[0]['image1']);?>">
							<input type="hidden" name="soluong" value="1">
							<input type="hidden" name="giasp" value="<?=$prd[0]['gia'];?>">

							<input type="submit" name="addcart" class="btn btn-warning" value="Thêm vào giỏ hàng">
						<?php } else { ?>
							<font color="red">Bạn phải đăng nhập trước.</font><br>
							<button type="button" class="btn btn-danger">Thêm vào giỏ hàng</button>
						<?php } ?>
					</form>
					<br>
					<div class="prd-moreinfo">
						<p>Ưu đãi khi mua tại cửa hàng</p>
						<hr>
						<p class="text-center"><i class="fas fa-check-circle"></i> Dịch vụ gói quà miễn phí khi mua tại cửa hàng</p>
					</div>
				</div>

				<hr>
				<div class="col-md-6 prd-info-group">
					<h4><i class="far fa-newspaper"></i> Chi tiết sản phẩm</h4>
					<ul class="prd-info">
						<li>Thương Hiệu: <?=htmlspecialchars($prd[0]['ten']);?></li>
						<li>Xuất Xứ: <?=htmlspecialchars($prd[0]['xuatxu']);?></li>
						<li>Giới Tính: <?=htmlspecialchars($prd[0]['gioitinh']);?></li>
						<li>Kính: <?=htmlspecialchars($prd[0]['kinh']);?></li>
						<li>Máy: <?=htmlspecialchars($prd[0]['may']);?></li>
						<li>Chống Nước: <?=htmlspecialchars($prd[0]['chongnuoc']);?></li>						
					</ul>
				</div>
				<div class="col-md-6 prd-info-group">
					<h4><i class="fas fa-undo"></i> Chính sách bảo hành</h4>
					<ul class="prd-info">
						<li>Thay Pin miễn phí suốt đời.</li>
						<li>Bảo hành máy lên đến 5 năm.</li>
					</ul>
					<h4><i class="fas fa-shipping-fast"></i> Chính sách vận chuyển</h4>
					<ul class="prd-info">
						<li>Giao hàng toàn quốc nhanh chóng.</li>
						<li>Giao siêu tốc trong vòng 2 giờ tại: Hồ Chí Minh, Hà Nội, Biên Hòa, Vũng Tàu, Bình Dương, Đà Nẵng.</li>
						<li>Giao hàng ngoại thành: 2-3 ngày (có thể lên đến 7 ngày tùy khu vực).</li>
					</ul>
				</div>
			</div>
		</div>
	</man>
<!-- </body>
</html> -->