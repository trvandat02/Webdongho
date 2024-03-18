<?php
	function get_allbrand(){		
		// Gọi hàm connectdb() để kết nối db
		$conn = connectdb();
		// Lệnh sql
		$stmt = $conn->prepare("SELECT * FROM thuong_hieu");
		// statement
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		// Lấy kết quả sql đưa vào mảng
		$kq = $stmt->fetchAll();
		// trả về mảng kq
		return $kq;
	}

	function TH_update($id,$ten,$img){
		$conn = connectdb();

		if($img!=""){
			$sql = "UPDATE thuong_hieu SET image = :image WHERE id_thuonghieu = :id";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':image', $img);
			$stmt->execute();
		}
		$sql = "UPDATE thuong_hieu SET ten = :ten WHERE id_thuonghieu = :id";
  		// Prepare statement
  		$stmt = $conn->prepare($sql);
  		$stmt->bindParam(':id', $id);
  		$stmt->bindParam(':ten', $ten);
  		// execute the query
  		$stmt->execute();
	}

	function TH_them($ten, $img){
		$conn = connectdb();
		$sql = "INSERT INTO thuong_hieu (ten, image) VALUES (:ten, :img)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':ten', $ten);
		$stmt->bindParam(':img', $img);
  		$stmt->execute();
	}

	function del_thuonghieu($id){		
		// Gọi hàm connectdb() để kết nối db
		$conn = connectdb();
		$sql = "DELETE FROM thuong_hieu WHERE id_thuonghieu=:id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
  		$stmt->execute();
	}


	function get_thuonghieu(){
		$conn = connectdb();
		$stmt = $conn->prepare("SELECT image FROM thuong_hieu");	
		$stmt->execute();
		$get_thuonghieu = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $get_thuonghieu;
	}
?>