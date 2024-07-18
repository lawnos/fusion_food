<?php
include("lienhe/title.php");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-status-wrap">
                <h4>Liệt kê liên hệ</h4>
                <!-- <div class="add-product">
                    <a href="index.php?act=themmonan">Thêm món ăn</a>
                </div> -->
                <table>
                    <tbody>
                        <tr>
                            <th>Số thứ tự</th>
                            <th>Họ tên</th>
                            <th>Trạng thái</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Nội dung</th>
                        </tr>
                        <?php
                        foreach ($list_contact as $key => $value) {
                            extract($value);
                        ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?= $hoten_lienhe ?>
                                </td>
                                <td>
                                    <?php
                                    if ($trangthai == 0) {
                                    ?>
                                        <a href="index.php?act=capnhatlienhe&id=<?=$id_lienhe?>">Chưa xem</a>
                                    <?php
                                    } else {
                                    ?>
                                        <p class="disabled">Đã xem</p>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?= $email_lienhe ?>
                                </td>
                                <td>
                                    <?= $sdt_lienhe ?>
                                </td>
                                <td>
                                    <?= $noidung ?>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- <div class="custom-pagination">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
</div>