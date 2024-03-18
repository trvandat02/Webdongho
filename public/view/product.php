<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Product page</title>

	<link rel="stylesheet" href="./style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>
<body> -->
	<man class="product-main">
		<br>
		<div class="product-group">
			<?php
				if($link=="")
					echo '<h6><a href="" class="text-reset">Trang chủ</a>><a href="index.php?action=product'.$link.'" class="text-reset">Sản Phẩm</a></h6>';
				elseif(isset($product[0]['gioitinh'])){
					echo '<h6><a href="" class="text-reset">Trang chủ</a>><a href="index.php?action=product'.$link.'" class="text-reset">Sản Phẩm '.$product[0]['gioitinh'].'</a></h6>';
				} else {
					echo '<h6><a href="" class="text-reset">Trang chủ</a>><a href="index.php?action=product" class="text-reset">Sản Phẩm</a></h6>';
				}
			?>
			<div class="product-banner">
				<img src="./images/<?=$banner?>" alt="men">
			</div>
			<div>
				<br>
				
				<?php
					if(isset($link) && ($link=="men" || $link=="women")){
				?>
						<form action="index.php?action=product<?=$link?>&fill=locsp" method="POST">
						<span class="fill-name">Bộ lọc</span>
						<Select name="locthuonghieu" id="locthuonghieu">
							<option value="0" selected>Thương hiệu</option>
							<?php
								if(isset($allbrand) && count($allbrand)>0){
									foreach ($allbrand as $item) {
										echo '<option value="'. htmlspecialchars($item['id_thuonghieu']) .'">'. htmlspecialchars($item['ten']) .'</option>';
									}
								} 
							?>
						</Select>
						<Select name="locgia" id="locgia">
							<option value="default" selected>Lọc theo giá</option>
							<option value="DESC">Giá cao đến thấp</option>
							<option value="ASC">Giá thấp đến cao</option>
						</Select>
						<button type="submit" name="loc" class="btn btn-success">Lọc</button>
						</form>
				<?php } ?>						
			</div>
			<br>
			<div class="product-list row d-flex">
				<!-- Hiển thị sản phẩm 4 cols -->
				<?php
					if(isset($product) && $product!=''){
						foreach ($product as $i) {
							echo '
								<div class="col-md-3">
									<div class="box-hover">
										<a href="index.php?action=productdetail&id='. htmlspecialchars($i['id_sanpham']) .'">
										<img src="./uploads/sanpham/'. htmlspecialchars($i['image1']) .'" alt="" width="100%" class="img-change">
										<img src="./uploads/sanpham/'. htmlspecialchars($i['image2']) .'" alt="" width="100%" >
										</a>
									</div>
									<p class=" text-center product-name"><a href="index.php?action=productdetail&id='. htmlspecialchars($i['id_sanpham']) .'" class="text-reset">'. htmlspecialchars($i['tensp']) .'</a></p>
									<p class="product-price text-center">'. number_format($i['gia']) .' đ</p>
								</div>
							';
						}
					} elseif(isset($product) && $product=='') {
						echo '<h4><font color="red">Không tìm thấy sản phẩm</font></h4>';
					}
				?>
				<!-- Hiển thị sản phẩm trang sản phẩm có phân trang -->
				<?php
					if(isset($row)){
						foreach ($row as $i) {
							echo '
								<div class="col-md-3">
									<div class="box-hover">
										<a href="index.php?action=productdetail&id='. htmlspecialchars($i['id_sanpham']) .'">
										<img src="./uploads/sanpham/'. htmlspecialchars($i['image1']) .'" alt="" width="100%" class="img-change">
										<img src="./uploads/sanpham/'. htmlspecialchars($i['image2']) .'" alt="" width="100%" >
										</a>
									</div>
									<p class=" text-center product-name"><a href="index.php?action=productdetail&id='. htmlspecialchars($i['id_sanpham']) .'" class="text-reset">'. htmlspecialchars($i['tensp']) .'</a></p>
									<p class="product-price text-center">'. number_format($i['gia']) .' đ</p>
								</div>
							';
						}
					}
				?>
			</div>
			<div class="text-center">
			<?php 
			if(isset($row)){
	            // PHẦN HIỂN THỊ PHÂN TRANG
	            // Bước 7: hiển thị phân trang
	 
	            // Nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
	            if ($current_page > 1 && $total_page > 1){
	                echo '<a class="pagi-btn" href="index.php?action=product&page='.($current_page-1).'">Prev</a>';
	            }
	 
	            // Lặp khoảng giữa
	            for ($i = 1; $i <= $total_page; $i++){
	                // Nếu là trang hiện tại thì hiển thị thẻ span
	                // ngược lại hiển thị thẻ a
	                if ($i == $current_page){
	                    echo '<span class="pagi-btn-span">'.$i.'</span>';
	                }
	                else{
	                    echo '<a class="pagi-btn" href="index.php?action=product&page='.$i.'">'.$i.'</a>';
	                }
	            }
	 
	            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
	            if ($current_page < $total_page && $total_page > 1){
	                echo '<a class="pagi-btn" href="index.php?action=product&page='.($current_page+1).'">Next</a>';
	            }
	        }
           ?>
           </div>
		</div>
	</man>
<!-- </body>
</html> -->