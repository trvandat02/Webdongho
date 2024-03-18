<h1>Dashboard</h1>
<hr>
<div class="row d-flex">
    <div class="col">
        <div class="dash-border-blue">
            <h5>SẢN PHẨM</h5>
            <h2><i class="fas fa-user"></i>
                <?php
                if (!empty($thongke_sp)) {
				    foreach ($thongke_sp as $row) {
				        echo $row['thongke_sp'];
				    }
				}
                ?>
            </h2>
        </div>
    </div>
    <div class="col">
        <div class="dash-border-red">
            <h5>THƯƠNG HIỆU</h5>
            <h2><i class="fas fa-user"></i>
            <?php
                if (!empty($thongke_th)) {
				    foreach ($thongke_th as $row) {
				        echo $row['thongke_th'];
				    }
				}
                ?>
            </h2>
        </div>
    </div>
    <div class="col">
        <div class="dash-border-pink">
            <h5>TÀI KHOẢN</h5>
            <h2><i class="fas fa-user"></i>
            	<?php
                if (!empty($thongke_tk)) {
				    foreach ($thongke_tk as $row) {
				        echo $row['thongke_tk'];
				    }
				}
                ?>
            </h2>
        </div>
    </div>
    <div class="col">
        <div class="dash-border-aqua">
            <h5>LIÊN HỆ</h5>
            <h2><i class="fas fa-user"></i>
            	<?php
                if (!empty($thongke_lh)) {
				    foreach ($thongke_lh as $row) {
				        echo $row['thongke_lh'];
				    }
				}
                ?>
            </h2>
        </div>
    </div>	
</div>