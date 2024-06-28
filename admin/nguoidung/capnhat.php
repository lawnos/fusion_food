<?php
include("nguoidung/title.php");

if (isset($user) && is_array($user)) {
    extract($user);
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form_them">
                <h4>Cập nhật món ăn</h4>
                <form action="index.php?act=capnhattaikhoan" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_sua" value="<?= $id_nguoidung ?>">
                    <div class="mb-3">
                        <label for="ok" class="form-label">Họ tên</label>
                        <input type="text" name="hoten" class="form-control" id="ok" placeholder="Nhập họ tên" required value="<?= $hoten ?>">
                    </div>
                    <div class="mb-3">
                        <label for="ok" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="ok" placeholder="Nhập họ tên" required value="<?= $email ?>">
                    </div>
                    <div class="mb-3">
                        <label for="ok1" class="form-label">Số điện thoại</label>
                        <input type="text" name="sodienthoai" class="form-control" id="ok1" placeholder="Số điện thoại" required value="<?= $sodienthoai ?>">
                    </div>

                    <div class="mb-3">
                        <label for="ok20" class="form-label">Mật khẩu</label>
                        <input type="password" name="pass" class="form-control" value="<?= $matkhau ?>" id="ok20" placeholder="Mật khẩu" required>
                    </div>

                    <div class="mb-3">
                        <label for="ok2" class="form-label">Ảnh đại diện</label><br>
                        <img src="../uploads/avatar/<?= $anh_taikhoan ?>" width="100" alt="">
                        <input type="file" name="anh_taikhoan" class="form-control" id="ok2">
                    </div>

                    <div class="mb-3">
                        <label for="ok20" class="form-label">Địa chỉ</label>
                        <input type="text" name="diachi" class="form-control" value="<?= $diachi ?>" id="ok20" placeholder="Địa chỉ" required>
                    </div>

                    <div class="chosen-select-single mg-b-20 mb-3">
                        <label class="form-label">Vai trò</label>
                        <select name="vaitro" class="select2_demo_3 form-control">
                            <option value="1">Admin</option>
                            <option value="0">Khách hàng</option>
                        </select>
                    </div>



                    <div class="mb-3 form_btn form-check">
                        <input class="btn btn-primary mr-3 text-left" type="submit" name="capnhat" value="CẬP NHẬT MỚI" required>
                        <a href="index.php?act=lietkemonan"><input class="btn btn-success text-left" type="button" value="DANH SÁCH"></a>
                    </div>
                </form>

                <?php
                if (isset($thongbao) && $thongbao != "") {
                    echo '<div class="alert alert-success" role="alert">' . $thongbao . '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>