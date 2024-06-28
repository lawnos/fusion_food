<?php
include("binhluan/title.php");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-status-wrap">
                <?php
                if (count($list_id_cmt) > 0) {

                    foreach ($list_id_cmt as $key => $value) {
                        extract($value);
                    }
                ?>
                    <h4>Chi tiết bình luận theo người dùng: <b style="color:aqua"><?= $hoten ?></b></h4>
                    <table>
                        <tbody>
                            <tr>
                                <th>Số thứ tự</th>
                                <th>Ảnh món ăn</th>
                                <th>Ngày bình luận</th>
                                <th>Tên món ăn</th>
                                <th>Nội dung</th>
                                <th>Thao tác</th>
                            </tr>
                            <?php
                            foreach ($list_id_cmt as $key => $value) {
                                extract($value);
                            ?>

                                <tr>
                                    <?php
                                    $startIndex = ($page - 1) * 6;
                                    $continuousIndex = $startIndex + $key + 1;
                                    ?>
                                    <td>
                                        <?= $continuousIndex ?>
                                    </td>
                                    <td>
                                        <img src="../uploads/monan/<?= $anh_monan ?>" alt="">
                                    </td>
                                    <td>
                                        <?= $ngaybinhluan ?>
                                    </td>
                                    <td>
                                        <?= $ten_monan ?>
                                    </td>
                                    <td>
                                        <?= $noidung ?>
                                    </td>
                                    <td>
                                        <a href="index.php?act=suabinhluan&idbl=<?= $id_binhluan ?>&idnd=<?= $id_nguoidung ?>&trang=<?= $page ?>">
                                            <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Sửa nội dung"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </a>
                                        <a onclick="return confirm('Bạn có muốn xóa không?')" ; href="index.php?act=xoabinhluan&idbl=<?= $id_binhluan ?>&idnd=<?= $id_nguoidung ?>&trang=<?= $page ?>">
                                            <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Xóa"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- Phân trang -->
                    <?php
                    $count = count($list_id_cmt_all);
                    $trang = ceil($count / 5);

                    if ($count >= 5) {
                        if (isset($_GET['trang'])) {
                            $page = intval($_GET['trang']);
                        } else {
                            $page = 1;
                        }
                    ?>
                        <nav class="text-center" aria-label="...">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="index.php?act=chitietbinhluan&id=<?= $id_nguoidung ?>&trang=<?= max(1, $page - 1) ?>" class="page-link">
                                        <i class="fas fa-chevron-left"></i> </a>

                                </li>
                                <?php
                                for ($i = 1; $i <= $trang; $i++) {
                                    $activeClass = ($i == $page) ? 'active' : '';
                                ?>
                                    <li class="page-item <?= $activeClass ?>"><a class="page-link" href="index.php?act=chitietbinhluan&id=<?= $id_nguoidung ?>&trang=<?= $i ?>"><?= $i ?></a></li>
                                <?php } ?>
                                <li class="page-item">
                                    <a href="index.php?act=chitietbinhluan&id=<?= $id_nguoidung ?>&trang=<?= min($trang, $page + 1) ?>" class="page-link">
                                        <i class="fas fa-chevron-right"></i> </a>
                            </ul>
                        </nav>
                    <?php }
                } else { ?>

                    <h1>Không có bình luận nào</h1>

                <?php } ?>

            </div>
        </div>
    </div>
</div>