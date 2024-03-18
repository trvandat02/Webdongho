<?php
	session_start();
	ob_start();
	include "../model/connectdb.php";
	include "../model/sanpham.php";
	include "../model/thuonghieu.php";
	include "../model/account.php";
	include "../model/contact.php";
	include "../model/pagination.php";

	$spnam_banchay= spnam_banchay();
	$spnu_banchay= spnu_banchay();
	$allbrand = get_allbrand();
	$get_thuonghieu= get_thuonghieu();
	// Header
	include "./view/header.php";
?>
<!-- Controller -->
<?php 
	if(isset($_GET['action'])){
		switch ($_GET['action']) {
			
			case 'shoppingcart':
				include "../model/cart.php";
				include "./view/cart.php";
				break;
			case 'xoa_sp_cart':
				if(isset($_GET['index']) && $_GET['index']>=0){
					array_splice($_SESSION['cart'], $_GET['index'], 1);
					if(count($_SESSION['cart'])<=0)
						unset($_SESSION['cart']);
				}
				include "../model/cart.php";
				header ('location: index.php?action=shoppingcart');
				// include "./view/cart.php";
				break;
			case 'themgiohang':
				if(!isset($_SESSION['cart']))
					$_SESSION['cart']=[];
				// Lấy data post
				if(isset($_POST['addcart']) && $_POST['addcart']){
					$tensp = $_POST['tensp'];
					$giasp = $_POST['giasp'];
					$anhsp = $_POST['anhsp'];
					$soluong = $_POST['soluong'];

					// Kiểm tra sản phẩm tồn tại trong giỏ hàng?
					$flag=0;
					for ($i=0; $i < sizeof($_SESSION['cart']); $i++){
						if($_SESSION['cart'][$i][0] == $tensp){
							$flag=1;
							$slnew = $soluong + $_SESSION['cart'][$i][2];
							$_SESSION['cart'][$i][2] = $slnew;
							break;
						}
					}

					if($flag==0){
						// Thêm sp mới vào giỏ hàng
						$pro = [$tensp,$anhsp,$soluong,$giasp];
						$_SESSION['cart'][] = $pro;
					}

					
				}
				include "../model/cart.php";
				include "./view/cart.php";
				// header ('location: index.php?action=shoppingcart');
				break;

			case 'capnhatsoluong':
				if(isset($_POST['addcart'])){
					$tensp = $_POST['tensp'];
					$soluong = $_POST['soluong'];
					$index = $_POST['index'];

					// Kiểm tra sản phẩm tồn tại trong giỏ hàng?
					// $flag=0;
					// for ($i=0; $i < sizeof($_SESSION['cart']); $i++){
					// 	if($_SESSION['cart'][$i][0] == $tensp){
					// 		$flag=1;
					// 		$slnew = $soluong;
					// 		$_SESSION['cart'][$i][2] = $slnew;
					// 		break;
					// 	}
					// }
					$slnew = $soluong;
					$_SESSION['cart'][$index][2] = $slnew;

				}
				include "../model/cart.php";
				include "./view/cart.php";
				break;

			case 'login':
				include "./view/login.php";
				break;

			case 'logout':
				session_destroy();
				header('location: index.php');
				break;	

			case 'loginsubmit':
				if(isset($_POST['login'])){
					$username = $_POST['username'];
					$password = $_POST['password'];
					$check = check_user($username, $password);
					if(count($check)>0 && $check[0]['role']==1){
						// admin
						$_SESSION['role'] = $check[0]['role'];
						$_SESSION['id'] = $check[0]['id'];
						$_SESSION['username'] = $check[0]['username'];
						header('location: ./admin/index.php');
						

					} else if(count($check)>0 && $check[0]['role']==0){
						// User
						$_SESSION['role'] = $check[0]['role'];
						$_SESSION['id'] = $check[0]['id'];
						$_SESSION['username'] = $check[0]['username'];
						header('location: index.php');
					} else {
						$login_err=1;
						include "./view/login.php";
					}
				} else {
					$login_err=1;
					include "./view/login.php";
				}
				break;

			case 'registersubmit':
				if(isset($_POST['register'])){
					$user = $_POST['username'];
					$usercheck = check_user_exist($user);
					if(count($usercheck)>0){
						$register_err=1;
						include "./view/register.php";
					} else {
						$pass = $_POST['password'];
						$ten = $_POST['name'];
						$email = $_POST['email'];
						$sdt = $_POST['phone'];
						$register_err=0;

						register($user, $pass, $ten, $email, $sdt);
						include "./view/login.php";
					}
				} else {
					$register_err=1;
					include "./view/register.php";
				}
				break;

			case 'register':
				if(isset($_POST['register'])){

				}
				include "./view/register.php";
				break;

			case 'product':
				// Phân trang
				// Bước 1+2: kết nối db và tìm total_records
				$total_records=total_records();
				// Bước 3: Tìm limit và current_page
		        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
		        $limit = 8;
		        // Bước 4: Tính total_page và start
		        // Tổng số trang
		        $total_page = ceil($total_records / $limit);
		        // Tìm start
        		$start = ($current_page - 1) * $limit;
		        // Giới hạn current_page trong khoảng 1 đến total_page
		        if ($current_page > $total_page){
		            $current_page = $total_page;
		        }
		        else if ($current_page < 1){
		            $current_page = 1;
		        }
		        // Bước 5: lấy danh sách sản phẩm theo start và limit
		        $row = dssp($start, $limit);
				$banner = "banner_pro.jpg";
				$link = "";
				// $product = get_allproduct();
				include "./view/product.php";
				break;

			case 'productmen':
				$banner = "banner_men.jpg";
				$link = "men";
				// Xử lý bộ lọc
				if(isset($_GET['fill']) && $_GET['fill']=='locsp'){
					if(isset($_POST['loc'])){
						if($_POST['locthuonghieu']>0){
							$thuonghieu = $_POST['locthuonghieu'];
						} else {
							$thuonghieu="";
						}
						if ($_POST['locgia'] != "default") {
							$gia = $_POST['locgia'];
						} else {
							$gia = "";
						}
						if($_POST['locthuonghieu']=="0" && $_POST['locgia'] == "default"){
							$product = product_mow("Nam");
							include "./view/product.php";
							break;
						}
						$product = sp_fill($thuonghieu, $gia);
						if(count($product)<=0)
							$product='';
					}
				} else
					$product = product_mow("Nam");
				include "./view/product.php";
				break;

			case 'productwomen':
				$banner = "banner_women.jpg";
				$link = "women";
				// Xử lý bộ lọc
				if(isset($_GET['fill']) && $_GET['fill']=='locsp'){
					if(isset($_POST['loc'])){
						if($_POST['locthuonghieu'] != "0"){
							$thuonghieu = $_POST['locthuonghieu'];
						} else {
							$thuonghieu="";
						}
						if ($_POST['locgia'] != "default") {
							$gia = $_POST['locgia'];
						} else {
							$gia = "";
						}
						if($_POST['locthuonghieu']=="0" && $_POST['locgia'] == "default"){
							$product = product_mow("Nữ");
							include "./view/product.php";
							break;
						}
						$product = sp_fill_nu($thuonghieu, $gia);
						if(count($product)<=0)
							$product='';
					}
				} else
					$product = product_mow("Nữ");
				include "./view/product.php";
				break;

			case 'productdetail':
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$prd = get_prd($id);

					include "./view/productdetail.php";
				}
				break;

			case 'contact':
				if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			        $hoten = $_POST['hoten'];
			        $sdt = $_POST['sdt'];
			        $email = $_POST['email'];
			        $tieude = $_POST['tieude'];
			        $noidung = $_POST['noidung'];
			        them_lienhe($hoten, $sdt, $email, $tieude, $noidung);
			        if (isset($_SESSION['success_message'])){

			        }
    			}
    			include './view/contact.php';
				break;

    		case 'home':
				include './view/home.php';
				break;

    		include './view/home.php';
			break;

			default:
				include './view/home.php';
				break;
		}
	} else {
		include './view/home.php';
	}
?>
<!-- End controller -->
<?php
	// footer
	include "./view/footer.php";
?>