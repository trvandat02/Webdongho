<?php
	function them_lienhe($hoten, $sdt, $email, $tieude, $noidung){
		$conn = connectdb();
		try{
			$stmt = $conn->prepare('CALL them_lienhe(?, ?, ?, ?, ?)');	
			$stmt->bindParam(1, $hoten);
	        $stmt->bindParam(2, $sdt);
			$stmt->bindParam(3, $email);
			$stmt->bindParam(4, $tieude);
			$stmt->bindParam(5, $noidung);
			$stmt->execute();
			$_SESSION['success_message'] = "Thêm thông tin liên hệ thành công!";
    }catch (PDOException $e) {
        echo "Lỗi khi thêm thông tin liên hệ: " . $e->getMessage();
    }finally {
        $conn = null;
    }
	}

	function lay_lienhe(){
		$conn = connectdb();
		$stmt = $conn->prepare("SELECT *FROM lienhe");
		$stmt->execute();
		$lay_lienhe = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $lay_lienhe;
	}
	function update_tt($id){
		$conn = connectdb();
		$stmt = $conn->prepare("UPDATE lienhe SET trangthai = 0 WHERE id = :id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
	}
?>