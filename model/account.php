<?php
	function check_user($user, $pass){		
		// Gọi hàm connectdb() để kết nối db
		$conn = connectdb();
		// Lệnh sql
		$stmt = $conn->prepare("SELECT * FROM user WHERE username=:user AND password=:pass");
		// statement
		$stmt->bindParam(':user', $user);
		$stmt->bindParam(':pass', $pass);
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		// Lấy kết quả sql đưa vào mảng
		$kq = $stmt->fetchAll();
		// trả về mảng kq
		return $kq;
	}

	function check_user_exist($user){
		$conn = connectdb();
		$stmt = $conn->prepare("SELECT * FROM user WHERE username=:user");
		$stmt->bindParam(':user', $user);
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq = $stmt->fetchAll();
		return $kq;
	}

	function register($user, $pass, $ten, $email, $sdt){
		$conn = connectdb();
		$sql = "INSERT INTO user (username, password, hoten, sdt, email) VALUES (:user, :pass, :ten, :sdt, :email)";

		$stmt = $conn->prepare($sql);

		$stmt->bindParam(':user', $user);
		$stmt->bindParam(':pass', $pass);
		$stmt->bindParam(':ten', $ten);
		$stmt->bindParam(':sdt', $sdt);
		$stmt->bindParam(':email', $email);
		$stmt->execute();
	}

	function lay_taikhoan(){
		$conn = connectdb();
		$stmt = $conn->prepare("SELECT * FROM user WHERE role = 0");
		$stmt->execute();
		$lay_lienhe = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $lay_lienhe;
	}

	function sua_taikhoan($id,$username,$password,$hoten,$sdt,$email){
	    $conn = connectdb();
	    $sql = "call db_product.sua_taikhoan('".$id."', '".$username."', '".$password."', '".$hoten."', '".$sdt."', '".$email."');";
	    $conn -> exec($sql);
  	}
	function xoa_taikhoan($id){
		$conn = connectdb();
		$sql = "DELETE FROM user WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		$conn = null;
	}
?>