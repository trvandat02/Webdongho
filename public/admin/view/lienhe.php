<style>
</style>
<h1>Thông tin liên hệ</h1>
<hr>
<?php
if (isset($lay_lienhe)) {
    if (isset($_POST['submit'])) {
        $trangthai = $_POST['trangthai']; // Mảng chứa các giá trị trạng thái đã chọn

        // Thực hiện cập nhật trạng thái cho từng liên hệ
        foreach ($trangthai as $id) {
            update_tt($id);
        }

        // Chuyển hướng về trang hiện tại để tải lại dữ liệu
        header("Location: index.php?action=qllienhe");
        exit();
    }
    ?>
    <form method="POST" action="">
        <div class="my-container">
            <input type="submit" name="submit" value="Cập nhật" class="btn btn-primary"></input>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="row-1">STT</th>
                    <th class="row-2">Họ và tên</th>
                    <th class="row-3">Email</th>
                    <th class="row-4">Số điện thoại</th>
                    <th class="row-4">Tiêu đề</th>
                    <th>Nội dung</th>
                    <th class="row-2">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lay_lienhe as $contact) { ?>
                    <tr>
                        <td><?= htmlspecialchars($contact['id']) ?></td>
                        <td><?= htmlspecialchars($contact['hoten']) ?></td>
                        <td><?= htmlspecialchars($contact['email']) ?></td>
                        <td><?= htmlspecialchars($contact['sdt']) ?></td>
                        <td><?= htmlspecialchars($contact['tieude']) ?></td>
                        <td><?= htmlspecialchars($contact['noidung']) ?></td>
                        <td>
                            <input type="checkbox" name="trangthai[]" value="<?= htmlspecialchars($contact['id']) ?>" <?= ($contact['trangthai'] == 0) ? 'checked' : '' ?>>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </form>
    <?php
} else {
    echo "Không có liên hệ để hiển thị.";
}
?>