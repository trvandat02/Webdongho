<hr>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#thuonghieu_add">
  Thêm thương hiệu
</button>
<?php if(isset($upload_err)) echo $upload_err; ?>
<hr>
<!-- Modal -->
  <div class="modal fade" id="thuonghieu_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm thương hiệu mới</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>        
        <div class="modal-body">
            <!-- Form thêm thương hiệu -->
            <form action="index.php?action=themthuonghieu" method="POST" enctype="multipart/form-data" class="form-them">
              <label for="tenTH">Tên thương hiệu:</label><br>
              <input type="text" name="tenTH" id="tenTH" placeholder="Nhập tên thương hiệu...">
              <br>
              <label for="anhTH">Ảnh thương hiệu:</label><br>
              <input type="file" name="image" id="image">
              <br>
              <!-- Modal footer -->
              <div class="modal-footer">           
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <input type="submit" name="themmoi" class="btn btn-primary" value="thêm">
              </div>
            </form>
            <!-- End form thêm thương hiệu -->
        </div>        
      </div>
    </div>
  </div>
<!-- Modal -->
<h3>Danh Sách Thương Hiệu</h3>

<table class="table table-bordered">
  <tr>
    <th>Mã thương hiệu</th>
    <th>Tên thương hiệu</th>
    <th>Ảnh</th>
    <th>Hành động</th>    
  </tr>
  <?php 
      if(isset($layTH) && count($layTH)>0){
        foreach ($layTH as $i) {
          // code...
          echo '<tr>
                <td>'. htmlspecialchars($i['id_thuonghieu']) .'</td>
                <td>'. htmlspecialchars($i['ten']) .'</td>
                <td><img src="../uploads/thuonghieu/'. htmlspecialchars($i['image']) .'" alt="" width="50px"></td>
                <td>                  
                  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#EDIT_TH'. htmlspecialchars($i['id_thuonghieu']) .'">
                    Sửa
                  </button>
                  <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DEL_TH'. htmlspecialchars($i['id_thuonghieu']) .'">
                    Xóa
                  </button>
                </td>';
          echo '
                <!-- Modal Edit-->
                <form method="POST" action="index.php?action=TH_edit" enctype="multipart/form-data">
                  <div class="modal fade" id="EDIT_TH'. htmlspecialchars($i['id_thuonghieu']) .'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Sửa thương hiệu</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="form-them">
                            <input type="hidden"  name="idTH" value="'. htmlspecialchars($i['id_thuonghieu']) .'">                            
                            <b><p>Tên thương hiệu: </p></b>
                            <input type="text"  name="tenTH" value="'. htmlspecialchars($i['ten']) .'" class="input_tenTH">                            
                            <br>
                            
                            <b><p>Ảnh: </p></b>
                            <input type="file" name="image">                              
                            <br>
                            <img src="../uploads/thuonghieu/'. htmlspecialchars($i['image']) .'" alt="" width="100px">                         
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <input type="submit" name="sua" value="Sửa" class="btn btn-success">          
                        </div>
                      </div>
                    </div>    
                  </div>
                </form>
              </tr>
              <!-- modal -->
              <!-- modal xoa-->
              <div class="modal fade" id="DEL_TH'. htmlspecialchars($i['id_thuonghieu']) .'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa thương hiệu</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <h5>Bạn có muốn xóa thương hiệu: '. htmlspecialchars($i['ten']) .'</h5>         
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="index.php?action=del_TH&id='. htmlspecialchars($i['id_thuonghieu']) .'" class="btn btn-danger">xóa</a>          
                    </div>
                  </div>
                </div>    
              </div>
            </tr>                
            <!-- modal -->';
        }
      }
    ?>
</table>