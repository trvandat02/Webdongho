<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body> -->
  <div class="background">
    <section class="tittle">
      <h3 class="text-center">LIÊN HỆ</h3>
      <?php 
      if (isset($_SESSION['success_message'])) {
              echo '<div class="success-message">' . $_SESSION['success_message'] . '</div>';
              unset($_SESSION['success_message']); // Xóa thông báo thành công sau khi hiển thị
            }  ?>
      <form class="contact-form" method="POST" action="#">
        <div class="form-group">
          <label for="hoten">Họ và tên</label>
          <input type="text" id="hoten" name="hoten" required>
        </div>
        <div class="form-group">
          <label for="sdt">Số điện thoại</label>
          <input type="tel" id="sdt" name="sdt" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="tieude">Tiêu đề</label>
          <input type="text" id="tieude" name="tieude" required>
        </div>
        <div class="form-group">
          <label for="noidung">Nội dung</label>
          <textarea id="noidung" name="noidung" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Gửi</button>
      </form>
    </section>
  </div>
<!--     <?php include 'footer.php'; ?>
</body>
</html> -->