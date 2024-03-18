<?php 
	function spnam_banchay(){
		$conn = connectdb();
		$stmt = $conn->prepare("CALL spnam_banchay()");
		$stmt->execute();
		$spnam_banchay = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $spnam_banchay;
	}
	function spnu_banchay(){
		$conn = connectdb();
		$stmt = $conn->prepare("CALL spnu_banchay()");
		$stmt->execute();
		$spnu_banchay = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $spnu_banchay;
	}

	function product_mow($gioitinh){		
		// Gọi hàm connectdb() để kết nối db
		$conn = connectdb();
		// Lệnh sql
		$stmt = $conn->prepare("SELECT * FROM sanpham WHERE gioitinh = :gioitinh");
		// statement
		$stmt->bindParam(':gioitinh', $gioitinh);
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		// Lấy kết quả sql đưa vào mảng
		$kq = $stmt->fetchAll();
		// trả về mảng kq
		return $kq;
	}

	function get_prd($id){		
		// Gọi hàm connectdb() để kết nối db
		$conn = connectdb();
		// Lệnh sql
		$stmt = $conn->prepare("SELECT * FROM sanpham JOIN thuong_hieu ON sanpham.id_thuonghieu=thuong_hieu.id_thuonghieu WHERE sanpham.id_sanpham = :id");
		// statement
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		// Lấy kết quả sql đưa vào mảng
		$kq = $stmt->fetchAll();
		// trả về mảng kq
		return $kq;
	}

	function get_allproduct(){		
		// Gọi hàm connectdb() để kết nối db
		$conn = connectdb();
		// Lệnh sql
		$stmt = $conn->prepare("SELECT * FROM sanpham JOIN thuong_hieu ON sanpham.id_thuonghieu=thuong_hieu.id_thuonghieu");
		// statement		
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		// Lấy kết quả sql đưa vào mảng
		$kq = $stmt->fetchAll();
		// trả về mảng kq
		return $kq;
	}

	function add_product($tensp,$id_thuonghieu,$image1,$image2,$gioitinh,$xuatxu,$kinh,$may,$chongnuoc,$mota,$gia){
		$conn = connectdb();
		$sql = "INSERT INTO sanpham (tensp,id_thuonghieu,image1,image2,gioitinh,xuatxu,kinh,may,chongnuoc,mota,gia) VALUES (:tensp,:id_thuonghieu,:image1,:image2,:gioitinh,:xuatxu,:kinh,:may,:chongnuoc,:mota,:gia)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':tensp', $tensp);
		$stmt->bindParam(':id_thuonghieu', $id_thuonghieu);
		$stmt->bindParam(':image1', $image1);
		$stmt->bindParam(':image2', $image2);
		$stmt->bindParam(':gioitinh', $gioitinh);
		$stmt->bindParam(':xuatxu', $xuatxu);
		$stmt->bindParam(':kinh', $kinh);
		$stmt->bindParam(':may', $may);
		$stmt->bindParam(':chongnuoc', $chongnuoc);
		$stmt->bindParam(':mota', $mota);
		$stmt->bindParam(':gia', $gia);
  		$stmt->execute();
	}

	function update_product($id,$tensp,$id_thuonghieu,$image1,$image2,$gioitinh,$xuatxu,$kinh,$may,$chongnuoc,$mota,$gia){
		$conn = connectdb();
		if($image1 != ""){
			$sql = "UPDATE sanpham SET image1=:image1 WHERE id_sanpham=:id";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':image1', $image1);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
		}
		if($image2 != ""){
			$sql = "UPDATE sanpham SET image2=:image2 WHERE id_sanpham=:id";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':image2', $image2);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
		}
		$sql = "UPDATE sanpham SET tensp=:tensp, id_thuonghieu=:id_thuonghieu, gioitinh=:gioitinh, xuatxu=:xuatxu, kinh=:kinh, may=:may, chongnuoc=:chongnuoc, mota=:mota, gia=:gia WHERE id_sanpham=:id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':tensp', $tensp);
		$stmt->bindParam(':id_thuonghieu', $id_thuonghieu);	
		$stmt->bindParam(':gioitinh', $gioitinh);
		$stmt->bindParam(':xuatxu', $xuatxu);
		$stmt->bindParam(':kinh', $kinh);
		$stmt->bindParam(':may', $may);
		$stmt->bindParam(':chongnuoc', $chongnuoc);
		$stmt->bindParam(':mota', $mota);
		$stmt->bindParam(':gia', $gia);
  		$stmt->execute();
	}

	function del_product($id){		
		// Gọi hàm connectdb() để kết nối db
		$conn = connectdb();
		$sql = "DELETE FROM sanpham WHERE id_sanpham=:id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
  		$stmt->execute();
	}

	function sp_fill($thuonghieu, $gia){
		// Gọi hàm connectdb() để kết nối db
		$conn = connectdb();
		if($thuonghieu!="" && $gia=="DESC"){
			// Gọi hàm connectdb() để kết nối db
			$conn = connectdb();
			// Lệnh sql
			$stmt = $conn->prepare("SELECT * FROM sanpham WHERE id_thuonghieu=:thuonghieu AND gioitinh='Nam' ORDER BY gia DESC");
			$stmt->bindParam(':thuonghieu', $thuonghieu);
			// statement
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			// Lấy kết quả sql đưa vào mảng
			$kq = $stmt->fetchAll();
			// trả về mảng kq
			return $kq;
		}
		if($thuonghieu!="" && $gia=="ASC"){
			// Gọi hàm connectdb() để kết nối db
			$conn = connectdb();
			// Lệnh sql
			$stmt = $conn->prepare("SELECT * FROM sanpham WHERE id_thuonghieu=:thuonghieu AND gioitinh='Nam' ORDER BY gia ASC");
			$stmt->bindParam(':thuonghieu', $thuonghieu);
			// statement
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			// Lấy kết quả sql đưa vào mảng
			$kq = $stmt->fetchAll();
			// trả về mảng kq
			return $kq;
		}
		if($thuonghieu!="" && $gia=="") {
			// Gọi hàm connectdb() để kết nối db
			$conn = connectdb();
			// Lệnh sql
			$stmt = $conn->prepare("SELECT * FROM sanpham WHERE id_thuonghieu=:thuonghieu AND gioitinh='Nam'");
			$stmt->bindParam(':thuonghieu', $thuonghieu);
			// statement
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			// Lấy kết quả sql đưa vào mảng
			$kq = $stmt->fetchAll();
			// trả về mảng kq
			return $kq;
		}
		if($thuonghieu=="" && $gia=="ASC"){
			// Gọi hàm connectdb() để kết nối db
			$conn = connectdb();
			// Lệnh sql
			$stmt = $conn->prepare("SELECT * FROM sanpham WHERE gioitinh='Nam' ORDER BY gia ASC");
			// statement
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			// Lấy kết quả sql đưa vào mảng
			$kq = $stmt->fetchAll();
			// trả về mảng kq
			return $kq;
		}
		if($thuonghieu=="" && $gia=="DESC"){
			// Gọi hàm connectdb() để kết nối db
			$conn = connectdb();
			// Lệnh sql
			$stmt = $conn->prepare("SELECT * FROM sanpham WHERE gioitinh='Nam' ORDER BY gia DESC");
			// statement
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			// Lấy kết quả sql đưa vào mảng
			$kq = $stmt->fetchAll();
			// trả về mảng kq
			return $kq;
		}
	}

		// Lọc nữ

	function sp_fill_nu($thuonghieu, $gia){
		// Gọi hàm connectdb() để kết nối db
		$conn = connectdb();
		if($thuonghieu!="" && $gia=="DESC"){
			// Gọi hàm connectdb() để kết nối db
			$conn = connectdb();
			// Lệnh sql
			$stmt = $conn->prepare("SELECT * FROM sanpham WHERE id_thuonghieu=:thuonghieu AND gioitinh='Nữ' ORDER BY gia DESC");
			$stmt->bindParam(':thuonghieu', $thuonghieu);
			// statement
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			// Lấy kết quả sql đưa vào mảng
			$kq = $stmt->fetchAll();
			// trả về mảng kq
			return $kq;
		}
		if($thuonghieu!="" && $gia=="ASC"){
			// Gọi hàm connectdb() để kết nối db
			$conn = connectdb();
			// Lệnh sql
			$stmt = $conn->prepare("SELECT * FROM sanpham WHERE id_thuonghieu=:thuonghieu AND gioitinh='Nữ' ORDER BY gia ASC");
			$stmt->bindParam(':thuonghieu', $thuonghieu);
			// statement
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			// Lấy kết quả sql đưa vào mảng
			$kq = $stmt->fetchAll();
			// trả về mảng kq
			return $kq;
		}
		if($thuonghieu!="" && $gia=="") {
			// Gọi hàm connectdb() để kết nối db
			$conn = connectdb();
			// Lệnh sql
			$stmt = $conn->prepare("SELECT * FROM sanpham WHERE id_thuonghieu=:thuonghieu AND gioitinh='Nữ'");
			$stmt->bindParam(':thuonghieu', $thuonghieu);
			// statement
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			// Lấy kết quả sql đưa vào mảng
			$kq = $stmt->fetchAll();
			// trả về mảng kq
			return $kq;
		}
		if($thuonghieu=="" && $gia=="ASC"){
			// Gọi hàm connectdb() để kết nối db
			$conn = connectdb();
			// Lệnh sql
			$stmt = $conn->prepare("SELECT * FROM sanpham WHERE gioitinh='Nữ' ORDER BY gia ASC");
			// statement
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			// Lấy kết quả sql đưa vào mảng
			$kq = $stmt->fetchAll();
			// trả về mảng kq
			return $kq;
		}
		if($thuonghieu=="" && $gia=="DESC"){
			// Gọi hàm connectdb() để kết nối db
			$conn = connectdb();
			// Lệnh sql
			$stmt = $conn->prepare("SELECT * FROM sanpham WHERE gioitinh='Nữ' ORDER BY gia DESC");
			// statement
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			// Lấy kết quả sql đưa vào mảng
			$kq = $stmt->fetchAll();
			// trả về mảng kq
			return $kq;
		}
	}
?>