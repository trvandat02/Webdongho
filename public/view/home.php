    <section style="padding: 10px 0;">
        <div id="carouselExampleIndicators" class="carousel slide">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="./images/banner/banner-images1.jpg" class="d-block w-100" alt="banner-images1">
            </div>
            <div class="carousel-item">
              <img src="./images/banner/banner-images2.jpg" class="d-block w-100" alt="banner-images2">
            </div>
            <!-- <div class="carousel-item">
              <img src="..." class="d-block w-100" alt="...">
            </div> -->
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
    </section>
    <section class="container">
        <h3 class="text-center">SẢN PHẨM NAM BÁN CHẠY</h3>
        <div class="row">
          <?php
          if (isset($spnam_banchay)) {
              foreach ($spnam_banchay as $product) {
                  ?>
                  <div class="col-md-3">
                      <div class="mb-3">
                          <img src="./uploads/sanpham/<?= htmlspecialchars($product['image1']) ?>" class="card-img-top" alt="Product Image">
                          <div class="card-body">
                              <h5 class="card-title text-center"><?= htmlspecialchars($product['tensp']) ?></h5>
                              <!-- <p class="card-text">Kính: <?= htmlspecialchars($product['kinh']) ?></p>
                              <p class="card-text">Máy: <?= htmlspecialchars($product['may']) ?></p> -->
                              <p class="card-text text-center">Giá: <?= number_format($product['gia'], 0, ".", ".") ?>₫</p>
                          </div>
                      </div>
                  </div>
                  <?php
              }
          } else {
              // Xử lý khi biến $spnu_banchay không có giá trị
              echo "Không có sản phẩm để hiển thị.";
          }
          ?>
      </div>
        <h3 class="text-center">SẢN PHẨM NỮ BÁN CHẠY</h3>
        <div class="row">
          <?php
          if (isset($spnu_banchay)) {
              foreach ($spnu_banchay as $product) {
                  ?>
                  <div class="col-md-3">
                      <div class="mb-3 ">
                          <img src="./uploads/sanpham/<?= htmlspecialchars($product['image1']) ?>" class="card-img-top" alt="Product Image">
                          <div class="card-body">
                              <h5 class="card-title text-center"><?= htmlspecialchars($product['tensp']) ?></h5>
                              <!-- <p class="card-text">Kính: <?= htmlspecialchars($product['kinh']) ?></p>
                              <p class="card-text">Máy: <?= htmlspecialchars($product['may']) ?></p> -->
                              <p class="card-text text-center">Giá: <?= number_format($product['gia'], 0, ".", ".") ?>₫</p>
                          </div>
                      </div>
                  </div>
                  <?php
              }
          } else {
              // Xử lý khi biến $spnam_banchay không có giá trị
              echo "Không có sản phẩm để hiển thị.";
          }
          ?>
      </div>
      <div class="horizontal-line"></div>
        <h3 class="text-center">THƯƠNG HIỆU ĐỒNG HỒ NỔI TIẾNG</h3>
        <div class="row">
          <?php
          if (isset($get_thuonghieu)) {
            foreach($get_thuonghieu as $product){
              ?>
              <div class="col-md-2">
                <div class="mb-3 image-container">
                  <img src="./uploads/thuonghieu/<?= htmlspecialchars($product['image']) ?>" class="card-img-top" alt="Product Image">
                </div>
              </div>
              <?php
            }
          } else {
            echo "Không có sản phẩm để hiển thị.";}
          ?>
        </div>
        <h3 class="text-center">TIN TỨC</h3>
  <div class="row">
    <div class="col">
      <article class="news">
        <img src="./images/tintuc/tintuc1.jpg" alt="Ảnh minh họa" style="width: 100%; height: auto;">
        <h5 class="news-title"><a href="#" style="text-decoration: none; color: inherit;">15 dòng đồng hồ cơ dây da nổi tiếng nhất thế giới</a></h5>
        <!-- <p class="news-summary">Dây da là một trong những món phụ kiện phổ biến trên đồng hồ, mang đến sự thanh lịch và gọn nhẹ. Những mẫu đồng hồ cơ dây da rất được giới mộ điệu ưa chuộng. Vậy đâu là các mẫu bán chạy nhất hiện nay? Hãy cùng Hải Triều tham khảo một số phiên bản sau.</p> -->
        <!-- <p class="news-date">Ngày đăng: 17/11/2023</p> -->
      </article>
    </div>
    <div class="col">
      <article class="news">
        <img src="./images/tintuc/tintuc2.jpg" alt="Ảnh minh họa" style="width: 100%; height: auto;">
        <h5 class="news-title"><a href="#" style="text-decoration: none; color: inherit;">Đồng hồ Orient Star Joker (mặt hề) tôn vinh nghệ thuật điện ảnh Hollywood</a></h5>
        <!-- <p class="news-summary">Đồng hồ Orient Star Joker (mặt hề), nghe tên gọi thôi đã rất lôi cuốn và muốn tìm hiểu. Orient Star Joker là dòng sản phẩm đặc biệt nhất của Orient Star khi tô đậm nghệ thuật điện ảnh và tôn vinh di sản chất lượng ngành đồng hồ Nhật Bản.</p> -->
        <!-- <p class="news-date">Ngày đăng: 17/11/2023</p> -->
      </article>
    </div>
    <div class="col">
      <article class="news">
        <img src="./images/tintuc/tintuc3.jpg" alt="Ảnh minh họa" style="width: 100%; height: auto;">
        <h5 class="news-title"><a href="#" style="text-decoration: none; color: inherit;">100 mẫu đồng hồ Casio nam đẹp nhất năm 2023</a></h5>
        <!-- <p class="news-summary">Casio được biết đến là thương hiệu đồng hồ đến từ Nhật Bản với hàng loạt cỗ máy thời gian mang tiêu chí rẻ, bền và đẹp. Vậy đâu là những mẫu đồng hồ Casio nam đẹp đáng mua nhất thời điểm hiện tại? Sau đây sẽ là một số sản phẩm để bạn tham khảo.</p> -->
        <!-- <p class="news-date">Ngày đăng: 17/11/2023</p> -->
      </article>
    </div>
    <div class="col">
      <article class="news">
        <img src="./images/tintuc/tintuc4.jpg" alt="Ảnh minh họa" style="width: 100%; height: auto;">
        <h5 class="news-title"><a href="#" style="text-decoration: none; color: inherit;">Đồng hồ Seiko Solar Titanium có gì đặc biệt?</a></h5>
        <!-- <p class="news-summary">Seiko Solar Titanium là dòng đồng hồ nổi bật của thương hiệu Seiko Nhật Bản. Với thiết kế chất liệu sang trọng và công nghệ máy thân thiện với môi trường, dòng sản phẩm này đang ngày càng được nhiều người yêu thích.</p> -->
        <!-- <p class="news-date">Ngày đăng: 17/11/2023</p> -->
      </article>
    </div>
  </div>
    </section>