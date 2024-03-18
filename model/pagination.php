<?php
	// TÌM TỔNG SỐ RECORDS
	function total_records(){
		$conn = connectdb();
		// TÌM TỔNG SỐ RECORDS
		$stmt = $conn->prepare("SELECT count(id_sanpham) as total from sanpham");
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$total_records = $stmt->fetchAll();
		return $total_records[0]['total'];
	}

	function dssp($start, $limit){
		$conn = connectdb();
		$stmt = $conn->prepare("SELECT * FROM sanpham LIMIT $start, $limit");
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq = $stmt->fetchAll();
		return $kq;
	}
?>