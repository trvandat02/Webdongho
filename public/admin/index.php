<?php
	session_start();
	ob_start();
	// connect db
	include "../../model/connectdb.php";
	include "../../model/sanpham.php";
	include "../../model/thuonghieu.php";
	include_once '../../model/account.php';
	include_once '../../model/contact.php';
	include_once '../../model/dashboard.php';
	$lay_lienhe = lay_lienhe();
	$lay_taikhoan = lay_taikhoan();
	$thongke_sp = thongke_sp();
	$thongke_th = thongke_th();
	$thongke_tk = thongke_tk();
	$thongke_lh = thongke_lh();

	if(isset($_SESSION['role']) && $_SESSION['role']==1){
		include './view/header.php';

		if (isset($_GET['action'])) {
			switch ($_GET['action']) {
				case 'qlthuonghieu':
					// Lấy tất cả thương hiệu để in ra view
					$layTH = get_allbrand();
					include "./view/thuonghieu.php";
					break;
				case 'themthuonghieu':
					if(isset($_POST['themmoi']) && $_POST['themmoi']){
						$ten = $_POST['tenTH'];

						// Xử lý ảnh thương hiệu
						$target_dir = "../uploads/thuonghieu/";
						$target_file = $target_dir . basename($_FILES["image"]["name"]);
						$target_file_img = basename($_FILES["image"]["name"]);
						$img = $target_file_img;
						$uploadOk =  1;
						$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));					
						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
							$uploadOk = 0;
						}
						if($uploadOk==1){
							move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
						} else{
							$upload_err="<p>Thêm thương hiệu thất bại !</p>";
							break;
						}

						TH_them($ten,$img);
						$upload_err="<p>Thêm thương hiệu thành công !</p>";
					}
					$layTH = get_allbrand();
					include "./view/thuonghieu.php";
					break;
				case 'TH_edit':				
					if(isset($_POST['sua']) && $_POST['sua']){
						$id = $_POST['idTH'];
						$ten = $_POST['tenTH'];

						//Xử lý ảnh thương hiệu
						if($_FILES["image"]["name"] != ""){
							$target_dir = "../uploads/thuonghieu/";
							$target_file = $target_dir . basename($_FILES["image"]["name"]);
							$target_file_img = basename($_FILES["image"]["name"]);
							$img = $target_file_img;
							$uploadOk =  1;
							$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));					
							if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
								$uploadOk = 0;
							}
							move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
						} else {
							$img="";
						}
						TH_update($id,$ten,$img);					
					}
					$layTH = get_allbrand();
					include "./view/thuonghieu.php";
					break;
				
				case 'del_TH':
					if(isset($_GET['id'])){
						$id = $_GET['id'];
						del_thuonghieu($id);
					}
					$layTH = get_allbrand();
					include "./view/thuonghieu.php";
					break;

				case 'qlsanpham':
					// Lấy tất cả thương hiệu
					$layTH = get_allbrand();
					// Lấy tất cả sản phẩm
					$laySP = get_allproduct();
					include "./view/sanpham.php";
					break;

				// Thêm sản phẩm
				case 'themsanpham':
					if(isset($_POST['themmoi']) && $_POST['themmoi']){
						$tensp = $_POST['tensp'];
						$id_thuonghieu = $_POST['thuonghieu'];
						$gioitinh = $_POST['gioitinh'];
						$xuatxu = $_POST['xuatxu'];
						$kinh = $_POST['kinh'];
						$may = $_POST['may'];
						$chongnuoc = $_POST['chongnuoc'];
						$mota = $_POST['mota'];
						$gia = $_POST['giasp'];

						// Xử lý ảnh sản phẩm
						$target_dir = "../uploads/sanpham/";

						$target_file = $target_dir . basename($_FILES["image1"]["name"]);
						$target_file2 = $target_dir . basename($_FILES["image2"]["name"]);

						$target_file_img = basename($_FILES["image1"]["name"]);
						$target_file_img2 = basename($_FILES["image2"]["name"]);

						$img = $target_file_img;
						$img2 = $target_file_img2;

						$uploadOk =  1;

						$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
						$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
							$uploadOk = 0;
						}
						if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "gif") {
							$uploadOk = 0;
						}
						if($uploadOk==1){
							move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file);
							move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file2);
						} else{
							$upload_err="<p>Thêm ảnh sản phẩm thất bại !</p>";
							break;
						}

						add_product($tensp,$id_thuonghieu,$img,$img2,$gioitinh,$xuatxu,$kinh,$may,$chongnuoc,$mota,$gia);
						$upload_err="<p>Thêm sản phẩm thành công !</p>";
					}
					// Lấy tất cả thương hiệu
					$layTH = get_allbrand();
					// Lấy tất cả sản phẩm
					$laySP = get_allproduct();
					include "./view/sanpham.php";
					break;

				// Sửa sản phẩm
				case 'suasanpham':
					if(isset($_POST['suasp']) && $_POST['suasp']){
						$id = $_POST['id_sanpham'];
						$tensp = $_POST['tensp'];
						$id_thuonghieu = $_POST['thuonghieu'];
						$gioitinh = $_POST['gioitinh'];
						$xuatxu = $_POST['xuatxu'];
						$kinh = $_POST['kinh'];
						$may = $_POST['may'];
						$chongnuoc = $_POST['chongnuoc'];
						$mota = $_POST['mota'];
						$gia = $_POST['giasp'];

						// Xử lý ảnh sản phẩm image1
						if($_FILES["image1"]["name"] != ""){
							$target_dir = "../uploads/sanpham/";
							$target_file = $target_dir . basename($_FILES["image1"]["name"]);
							$target_file_img = basename($_FILES["image1"]["name"]);
							$img = $target_file_img;
							$uploadOk =  1;
							$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
							if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
								$uploadOk = 0;
							}
							if($uploadOk==1){
								move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file);
							} else{
								$update_err="<p>Thêm ảnh sản phẩm thất bại !</p>";
								break;
							}
						} else {
							$img="";
						}
						// Xử lý ảnh sản phẩm image1
						if($_FILES["image2"]["name"] != ""){
							$target_dir = "../uploads/sanpham/";
							$target_file2 = $target_dir . basename($_FILES["image2"]["name"]);
							$target_file_img2 = basename($_FILES["image2"]["name"]);
							$img2 = $target_file_img2;
							$uploadOk =  1;
							$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
							if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "gif") {
								$uploadOk = 0;
							}
							if($uploadOk==1){
								move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file2);
							} else{
								$update_err="<p>Thêm ảnh sản phẩm 2 thất bại !</p>";
								break;
							}
						} else {
							$img2="";
						}

						update_product($id, $tensp,$id_thuonghieu,$img,$img2,$gioitinh,$xuatxu,$kinh,$may,$chongnuoc,$mota,$gia);
						$update_err="<p>Sửa sản phẩm thành công !</p>";
					}
					// Lấy tất cả thương hiệu
					$layTH = get_allbrand();
					// Lấy tất cả sản phẩm
					$laySP = get_allproduct();
					include "./view/sanpham.php";
					break;

				// Xóa sản phẩm
				case 'xoasanpham':
					if(isset($_GET['id'])){
						$id = $_GET['id'];
						del_product($id);
					}
					// Lấy tất cả thương hiệu
					$layTH = get_allbrand();
					// Lấy tất cả sản phẩm
					$laySP = get_allproduct();
					include "./view/sanpham.php";
					break;

				case 'logout':
					session_destroy();
					header('location: ../index.php');
					break;

				case 'qltaikhoan':
				include './view/taikhoan.php';
				break;

				case 'sua_taikhoan':
	            if (isset($_POST['sua_taikhoan'])) {
	                $id = $_POST['id'];
	                $username = $_POST['username'];
	                $password = $_POST['password'];
	                $hoten = $_POST['hoten'];
	                $sdt = $_POST['sdt'];
	                $email = $_POST['email'];
	                sua_taikhoan($id, $username, $password, $hoten, $sdt, $email);
	                header("Location: index.php?action=qltaikhoan");
	                exit();
	            }
	            break;

				case 'xoa_taikhoan':
	            if (isset($_GET['id']) && $_GET['id'] != "") {
	                $id = $_GET['id'];
	                xoa_taikhoan($id);
	                header("Location: index.php?action=qltaikhoan");
	                exit();
	            }
	            break;

				case 'qllienhe':
					include "./view/lienhe.php";
					break;
					
				case 'sua_trangthai':
				    if (isset($_POST['submit_sua_trangthai'])) {
				        $id = $_POST['id'];
				        $trangthai = $_POST['trangthai'];
				        // Gọi hàm để cập nhật trạng thái
				        sua_trangthai($id, $trangthai);
				        header("Location: index.php");
				        exit();
				    } else {
				        // Hiển thị form chỉnh sửa trạng thái
				        $id = $_GET['id'];
				        $trangthai = lay_trangthai($id); // Gọi hàm để lấy trạng thái hiện tại
				        include './view/sua_trangthai.php';
				    }
				    break;
				default:
					include './view/dashboard.php';
				break;
			}
		} else {
			include './view/dashboard.php';
		}


		// footer
		include './view/footer.php';
	} else {
		header('location: ../index.php?action=login');
	}

?>