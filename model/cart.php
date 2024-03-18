<?php
	// session_start();
	// ob_start();
	function showcart(){
		if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
			$tong=0;
			for($i=0; $i < sizeof($_SESSION['cart']); $i++){
				$price=$_SESSION['cart'][$i][2]*$_SESSION['cart'][$i][3];
				$tong+=$price;
				echo '
					<div class="row d-flex">
						<div class="col-md-3">
							<img src="./uploads/sanpham/'. htmlspecialchars($_SESSION['cart'][$i][1]) .'" alt="product">
						</div>
						<div class="col-md-9">
							<p>'. htmlspecialchars($_SESSION['cart'][$i][0]) .'</p>

							<!-- Số lượng sản phẩm tại giỏ hàng. -->
							<form method="POST" action="index.php?action=capnhatsoluong" id="cart'.$i.'">

							<input type="hidden" name="tensp" value="'. htmlspecialchars($_SESSION['cart'][$i][0]) .'">
							<input type="hidden" name="index" value="'.($i).'">
 							<input type="number" value="'. $_SESSION['cart'][$i][2] .'" class="cart-quantity" name="soluong" min="1" max="9">
 							<button type="submit" name="addcart" class="btn btn-warning">Cập nhật</button>

 							</form>

							<span class="cart-product-price ms-2">'. number_format($price, 0, ".", ".") .' đ</span>
							<br>
							<br>
							<a href="index.php?action=xoa_sp_cart&index='.($i).'" class="btn btn-danger"><i class="fas fa-trash"></i></a>
						</div>
					</div>
					<hr>';
			}
			echo '
				<div class="row">
					<div class="col-md-6">Tạm tính:</div>
					<div class="col-md-6 text-end">'. number_format($tong, 0, ".", ".") .' đ</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6">Tổng:</div>
					<div class="col-md-6 text-end">'. number_format($tong, 0, ".", ".") .' đ</div>
				</div>
				<hr>';
		}
	}
 ?>