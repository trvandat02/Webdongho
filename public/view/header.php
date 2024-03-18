<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product page</title>

  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script
        type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"
  ></script>
  <script type="text/javascript" src="./script.js"></script>
</head>
<body>
  <header>
    <!-- <div class="container"> -->
      <div class="row">
        <div class="col-2">
          <div class="logo">
              <!-- <img src="images/logo.jpg" alt="Logo"> -->
              <span class="logo-sun">Sun </span><span class="logo-swatch">Swatch</span>
          </div>
        </div>
        <div class="col-10">
          <nav>
            <ul>
              <li><a href="index.php?action=home">TRANG CHỦ</a></li>
              <li class="dropdown">
                <a href="index.php?action=product">SẢN PHẨM</a>
                <ul class="dropdown-menu">
                  <li><a href="index.php?action=productmen">SẢN PHẨM NAM</a></li>
                  <li><a href="index.php?action=productwomen">SẢN PHẨM NỮ</a></li>
                </ul>
              </li>
              <li><a href="index.php?action=contact">LIÊN HỆ</a></li>
              <?php
                if(isset($_SESSION['username'])){
              ?>
                  <li><a href="#"><?=htmlspecialchars($_SESSION['username']);?></a></li>
                  <li><a href="index.php?action=logout"><i class="fas fa-sign-out-alt"></i></a></li>
              <?php } else {?>
                  <li><a href="index.php?action=register">ĐĂNG KÝ</a></li>
                  <li><a href="index.php?action=login">ĐĂNG NHẬP</a></li>
              <?php } ?>
                <li>
                  <input type="text" placeholder="Tìm kiếm">
                  <button type="submit"><i class="fa fa-search"></i></button>
                </li>
                <li>
                  <a href="index.php?action=shoppingcart"><i class="fa fa-shopping-cart"></i></a>
                </li>
                <!-- <li>
                  <a> <i class=" text-white fa-solid fa-right-from-bracket"></i></a>
                </li> -->
              </ul>
          </nav>
        </div>
      </div>
    <!-- </div> -->
  </header>