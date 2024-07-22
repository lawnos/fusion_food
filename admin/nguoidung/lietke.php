<?php
include("nguoidung/title.php");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-status-wrap">
                <h4>Liệt kê người dùng</h4>
                <table>
                    <tbody>
                        <tr>
                            <th>Số thứ tự</th>
                            <th>Tên</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Vai trò</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php
                        foreach ($list_users as $key => $value) {
                            extract($value);
                            ?>
                        <tr>
                            <td>
                                <?= $key + 1 ?>
                            </td>
                            <td>
                                <?= $hoten ?>
                            </td>
                            <td>
                                <?= $sodienthoai ?>
                            </td>
                            <td>
                                <?= $email ?>
                            </td>
                            <td>
                                <?= $diachi ?>
                            </td>
                            <td>
                                <?= $vaitro == 1 ? "Admin" : "Khách hàng" ?>
                            </td>

                            <td>
                                <a href="index.php?act=suanguoidung&id_nguoidung=<?= $id_nguoidung ?>">
                                    <button data-toggle="tooltip" title="" class="pd-setting-ed"
                                        data-original-title="Sửa"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></button>
                                </a>
                                <a onclick="return confirm('Bạn có muốn xóa không?')" ;
                                    href="index.php?act=xoanguoidung&id_nguoidung=<?= $id_nguoidung ?>">
                                    <button data-toggle="tooltip" title="" class="pd-setting-ed"
                                        data-original-title="Xóa"><i class="fa fa-trash-o"
                                            aria-hidden="true"></i></button>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>