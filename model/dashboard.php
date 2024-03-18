<?php
  function thongke_sp(){
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT COUNT(*) AS thongke_sp FROM sanpham;");
    $stmt->execute();
    $thongke_sp = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $thongke_sp;
  }
  function thongke_th(){
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT COUNT(*) AS thongke_th FROM thuong_hieu;");
    $stmt->execute();
    $thongke_th = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $thongke_th;
  }
  function thongke_tk(){
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT COUNT(*) AS thongke_tk FROM user;");
    $stmt->execute();
    $thongke_tk = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $thongke_tk;
  }
  function thongke_lh(){
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT COUNT(*) AS thongke_lh FROM lienhe;");
    $stmt->execute();
    $thongke_lh = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $thongke_lh;
  }
?>