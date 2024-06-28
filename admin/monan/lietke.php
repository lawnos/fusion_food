<?php
include("monan/title.php");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-status-wrap">
                <h4>Liệt kê món ăn</h4>
                <div class="add-product">
                    <a href="index.php?act=themmonan">Thêm món ăn</a>
                </div>
                <table>
                    <tbody>
                        <tr>
                            <th>Số thứ tự</th>
                            <th>Tên món ăn</th>
                            <th>Ảnh món ăn</th>
                            <th>Giá món ăn</th>
                            <th>Danh mục</th>
                            <th>Mô tả món ăn</th>
                            <th>Nổi bật</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php
                        foreach ($listmonan as $key => $value) {
                            extract($value);
                        ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?= $ten_monan ?>
                                </td>
                                <td>
                                    <img src="../uploads/monan/<?= $anh_monan ?>" alt="">
                                </td>
                                <td>
                                    <?= number_format($gia_monan, 0, ",", ".") ?> VNĐ
                                </td>
                                <td>
                                    <?= $tendanhmuc ?>
                                </td>
                                <td>
                                    <?= $mota_monan ?>
                                </td>
                                <td>
                                    <?php if ($noibat == 1) {
                                        echo "Thực đơn hôm nay";
                                    }elseif ($noibat == 20) {
                                        echo "Menu đặc biệt";
                                    }else {
                                        echo "Tất cả";
                                    }
                                    ?>
                                </td>

                                <td>
                                    <a href="index.php?act=suamonan&id_monan=<?= $id_monan ?>">
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    </a>
                                    <a onclick="return confirm('Bạn có muốn xóa không?')" ; href="index.php?act=xoamonan&id_monan=<?= $id_monan ?>">
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Xóa"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </a>
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