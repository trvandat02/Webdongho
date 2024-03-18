<hr>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ADD_PRODUCT">
  Thêm sản phẩm
</button>
<?php if(isset($upload_err)) echo $upload_err; ?>
<hr>

<!-- Modal thêm-->

  <div class="modal fade" id="ADD_PRODUCT" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm sản phẩm mới</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>        
        <div class="modal-body">
          <div class="form-themsp d-block">
            <!-- Form thêm -->
            <form action="index.php?action=themsanpham" method="POST" enctype="multipart/form-data">    
              <label for="tensp">Tên sản phẩm</label><br>
              <input type="text" name="tensp" id="tensp" placeholder="Tên sản phẩm"><br>

              <label for="thuonghieu">Thương hiệu</label><br>
              <select name="thuonghieu" id="thuonghieu">
                <option value="0">Chọn thương hiệu</option>
                <?php
                  if(isset($layTH)&&count($layTH)>0){
                    foreach($layTH as $i){
                      echo '<option value="'. htmlspecialchars($i['id_thuonghieu']) .'">'. htmlspecialchars($i['ten']) .'</option>';
                    }
                  }
                ?>
              </select><br>

              <label for="image1">Ảnh 1</label><br>
              <input type="file" name="image1" id="image1"><br>

              <label for="image2">Ảnh 2</label><br>
              <input type="file" name="image2" id="image2"><br>

              <label for="gioitinh">Giới tính</label><br>
              <input type="text" name="gioitinh" id="gioitinh" placeholder="Giới tính"><br>

              <label for="xuatxu">xuất xứ</label><br>
              <input type="text" name="xuatxu" id="xuatxu" placeholder="Xuất xứ"><br>

              <label for="kinh">Kính</label><br>
              <input type="text" name="kinh" id="kinh" placeholder="Kính"><br>

              <label for="may">Máy</label><br>
              <input type="text" name="may" id="may" placeholder="Máy"><br>

              <label for="chongnuoc">Chống nước</label><br>
              <input type="text" name="chongnuoc" id="chongnuoc" placeholder="Chống nước"><br>

              <label for="giasp">Giá</label><br>
              <input type="text" name="giasp" id="giasp" placeholder="Giá"><br>

              <label for="mota">Mô tả</label><br>
              <textarea name="mota" id="mota" cols="50" rows="3" placeholder="Mô tả sản phẩm"></textarea>

              <div class="modal-footer">           
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <input type="submit" name="themmoi" class="btn btn-primary" value="thêm">
              </div>
            </form>
          </div>
        </div>        
      </div>
    </div>
  </div>

<!-- Modal -->

<!-- Danh sách sản phẩm -->
<!-- Danh sách nhân viên -->
<h3>Danh sách sản phẩm</h3>
<?php if(isset($update_err)) echo $update_err; ?>
<hr>
<table class="table table-bordered">
  <tr>
    <th>ID</th>
    <th>Tên</th>
    <th>Thương hiệu</th>
    <th>Ảnh 1</th>
    <th>Ảnh 2</th>
    <th>Giá</th>
    <th>Hành động</th>
  </tr>
  
    <?php
      // var_dump($laySP);
      if(isset($laySP) && count($laySP)){
        foreach ($laySP as $i) {     
    ?>
    <!-- show product -->
          <tr>
            <td><?=htmlspecialchars($i['id_sanpham']);?></td>
            <td><?=htmlspecialchars($i['tensp']);?></td>
            <td><?=htmlspecialchars($i['ten']);?></td>
            <td><img src="../uploads/sanpham/<?=htmlspecialchars($i['image1']);?>" alt="" width="80px"></td>
            <td><img src="../uploads/sanpham/<?=htmlspecialchars($i['image2']);?>" alt="" width="80px"></td>
            <td><?=number_format($i['gia'], 0, ".", ".");?> đ</td>
            <td>
              <button class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#CTSP<?=htmlspecialchars($i['id_sanpham']);?>">Chi tiết</button>
              <button class="btn btn-success me-1" data-bs-toggle="modal" data-bs-target="#EDIT_SP<?=htmlspecialchars($i['id_sanpham']);?>">Sửa</button>
              <button class="btn btn-danger me-1" data-bs-toggle="modal" data-bs-target="#DEL_SP<?=htmlspecialchars($i['id_sanpham']);?>">Xóa</button></td>
          </tr>
          
                <!-- modal chi tiet-->
                <div class="modal fade" id="CTSP<?=htmlspecialchars($i['id_sanpham']);?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thông tin sản phẩm</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p class="prd-title"><b>ID:</b></p>
                        <p class="prd-text"><?=htmlspecialchars($i['id_sanpham']);?></p>

                        <p class="prd-title"><b>Tên sản phẩm:</b></p>
                        <p class="prd-text"><?=htmlspecialchars($i['tensp']);?></p>

                        <p class="prd-title"><b>Thương hiệu:</b></p>
                        <p class="prd-text"><?=htmlspecialchars($i['ten']);?></p>

                        <p class="prd-title"><b>Image 1:</b></p>
                        <img src="../uploads/sanpham/<?=htmlspecialchars($i['image1']);?>" alt="" width="80px">
                        <p class="prd-text"></p>

                        <p class="prd-title"><b>Image 2:</b></p>
                        <img src="../uploads/sanpham/<?=htmlspecialchars($i['image2']);?>" alt="" width="80px">
                        <p class="prd-text"></p>

                        <p class="prd-title"><b>Giới tính:</b></p>
                        <p class="prd-text"><?=htmlspecialchars($i['gioitinh']);?></p>

                        <p class="prd-title"><b>Xuất xứ:</b></p>
                        <p class="prd-text"><?=htmlspecialchars($i['xuatxu']);?></p>

                        <p class="prd-title"><b>Kính:</b></p>
                        <p class="prd-text"><?=htmlspecialchars($i['kinh']);?></p>

                        <p class="prd-title"><b>Máy:</b></p>
                        <p class="prd-text"><?=htmlspecialchars($i['may']);?></p>

                        <p class="prd-title"><b>Chống nước:</b></p>
                        <p class="prd-text"><?=htmlspecialchars($i['chongnuoc']);?></p>

                        <p class="prd-title"><b>Mô tả:</b></p>
                        <p class="prd-text"><?=htmlspecialchars($i['mota']);?></p>

                        <p class="prd-title"><b>Giá:</b></p>
                        <p class="prd-text"><?=number_format($i['gia'], 0, ".", ".");?></p>

                        <p class="prd-title"><b>Đã bán:</b></p>
                        <p class="prd-text"><?=htmlspecialchars($i['sl_ban']);?></p>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>            
                      </div>
                    </div>
                  </div>    
                </div>
                <!-- end modal chi tiết -->

                <!-- Modal sửa -->
                <div class="modal fade" id="EDIT_SP<?=htmlspecialchars($i['id_sanpham']);?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Sửa sản phẩm</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>        
                      <div class="modal-body">
                        <div class="form-themsp d-block">
                          <!-- Form thêm -->
                          <form action="index.php?action=suasanpham" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_sanpham" value="<?=htmlspecialchars($i['id_sanpham']);?>"> 
                            <label for="tensp">Tên sản phẩm</label><br>
                            <input type="text" name="tensp" id="tensp" value="<?=htmlspecialchars($i['tensp']);?>"><br>

                            <label for="thuonghieu">Thương hiệu</label><br>
                            <select name="thuonghieu" id="thuonghieu">
                              <option value="0">Chọn thương hiệu</option>
                              <?php
                                if(isset($layTH)&&count($layTH)>0){
                                  foreach($layTH as $j){
                                    if($i['id_thuonghieu'] == $j['id_thuonghieu'])
                                      echo '<option value="'. htmlspecialchars($j['id_thuonghieu']) .'" selected>'. htmlspecialchars($j['ten']) .'</option>';
                                    else
                                      echo '<option value="'. htmlspecialchars($j['id_thuonghieu']) .'">'. htmlspecialchars($j['ten']) .'</option>';
                                  }
                                }
                              ?>
                            </select><br>

                            <label for="image1">Ảnh 1</label><br>
                            <input type="file" name="image1" id="image1"><br>
                            <img src="../uploads/sanpham/<?=htmlspecialchars($i['image1']);?>" alt="" width="80px"><br>


                            <label for="image2">Ảnh 2</label><br>
                            <input type="file" name="image2" id="image2"><br>
                            <img src="../uploads/sanpham/<?=htmlspecialchars($i['image2']);?>" alt="" width="80px"><br>

                            <label for="gioitinh">Giới tính</label><br>
                            <input type="text" name="gioitinh" id="gioitinh" value="<?=htmlspecialchars($i['gioitinh']);?>"><br>

                            <label for="xuatxu">xuất xứ</label><br>
                            <input type="text" name="xuatxu" id="xuatxu" value="<?=htmlspecialchars($i['xuatxu']);?>"><br>

                            <label for="kinh">Kính</label><br>
                            <input type="text" name="kinh" id="kinh" value="<?=htmlspecialchars($i['kinh']);?>"><br>

                            <label for="may">Máy</label><br>
                            <input type="text" name="may" id="may" value="<?=htmlspecialchars($i['may']);?>"><br>

                            <label for="chongnuoc">Chống nước</label><br>
                            <input type="text" name="chongnuoc" id="chongnuoc" value="<?=htmlspecialchars($i['chongnuoc']);?>"><br>

                            <label for="giasp">Giá</label><br>
                            <input type="text" name="giasp" id="giasp" value="<?=htmlspecialchars($i['gia']);?>"><br>

                            <label for="mota">Mô tả</label><br>
                            <textarea name="mota" id="mota" cols="50" rows="3"><?=htmlspecialchars($i['mota']);?></textarea>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                              <input type="submit" name="suasp" class="btn btn-success" value="Sửa">
                            </div>
                          </form>
                        </div>
                      </div>        
                    </div>
                  </div>
                </div>
                <!-- end modal sửa -->

                <!-- Modal xóa -->
                <div class="modal fade" id="DEL_SP<?=htmlspecialchars($i['id_sanpham']);?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa sản phẩm</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <h5>Bạn có muốn xóa sản phẩm: <?=htmlspecialchars($i['tensp']);?></h5>         
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <a href="index.php?action=xoasanpham&id=<?=htmlspecialchars($i['id_sanpham']);?>" class="btn btn-danger">xóa</a>          
                      </div>
                    </div>
                  </div>    
                </div>
                <!-- end modal xóa -->
    <?php } }; ?>
</table>