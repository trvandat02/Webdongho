<h1>Danh sách tài khoản</h1>

<hr>
<table class="table table-bordered">
  <tr>
    <th>ID</th>
    <th>User name</th>
    <th>Password</th>
    <th>Họ tên</th>
    <th>Số điện thoại</th>
    <th>Email</th>
    <th>Hành động</th>
  </tr>
  
    <?php
      if (isset($lay_taikhoan)) {
        foreach ($lay_taikhoan as $account) {
          echo '<tr>
                <td>' . htmlspecialchars($account['id']) . '</td>
                <td>' . htmlspecialchars($account['username']) . '</td>
                <td>' . htmlspecialchars($account['password']) . '</td>
                <td>' . htmlspecialchars($account['hoten']) . '</td>
                <td>' . htmlspecialchars($account['sdt']) . '</td>
                <td>' . htmlspecialchars($account['email']) . '</td>
                <td>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#suataikhoan'.$account['id'].'">
                    Sửa
                </button>
                  <button class="btn btn-danger" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#xoataikhoan'.$account['id'].'">
                    Xóa
                  </button>
                </td>';
          echo '<!-- modal xoa-->
                <div class="modal fade" id="xoataikhoan'.$account['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa tài khoản</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <h5>Bạn có muốn xóa tài khoản: '.$account['username'].'</h5>         
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="index.php?action=xoa_taikhoan&id='.$account['id'].'" class="btn btn-danger">Xóa</a>          
                      </div>
                    </div>
                  </div>    
                </div>
                <!-- modal xoa-->
                <!-- Modal edit -->
                <div class="modal fade" id="suataikhoan'.$account['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thông tin tài khoản</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>        
                      <div class="modal-body">
                        <div class="form-them">
                          <form action="index.php?action=sua_taikhoan" method="post">  
                            <input type="hidden" name="id" value="'.$account['id'].'">  
                            <div class="d-flex">
                            <b><p>User name: </p></b>
                            <input type="text" name="username" value="'.$account['username'].'" readonly>
                            </div>
                            <br>
                            <div class="d-flex">
                            <b><p>Password: </p></b>
                            <input type="text" name="password" value="'.$account['password'].'">
                            </div>
                            <br>
                            <div class="d-flex">
                            <b><p>Họ và tên: </p></b>
                            <input type="text" placeholder="Nhập họ và tên..." name="hoten" value="'.$account['hoten'].'">
                            </div>
                            <br>
                            <div class="d-flex">
                            <b><p>Số điện thoại: </p></b>
                            <input type="text" placeholder="Nhập số điện thoại..." name="sdt" value="'.$account['sdt'].'">
                            </div>
                            <br>
                            <div class="d-flex">
                            <b><p>Email: </p></b>
                            <input type="text" placeholder="Nhập email..." name="email" value="'.$account['email'].'">
                            </div>
                            <br>
                            <div class="modal-footer">           
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" name="sua_taikhoan">Sửa</button>
                            </div>
                          </form>
                        </div>
                      </div>        
                    </div>
                  </div>
                </div>
              </tr>';        

        }
      }
    ?>   
</table>