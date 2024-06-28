<?php
include("danhmuc/title.php");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-status-wrap">
                <h4>Liệt kê danh mục</h4>
                <div class="add-product">
                    <a href="index.php?act=themdanhmuc">Thêm danh mục</a>
                </div>
                <table>
                    <tbody>
                        <tr>
                            <th>Số thứ tự</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên danh mục</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php
                        foreach ($listdanhmuc as $key => $value) {
                            extract($value);
                            ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?= $id_danhmuc ?>
                                </td>
                                <td>
                                    <?= $tendanhmuc ?>
                                </td>
                                <td>
                                    <a href="index.php?act=suadm&iddm=<?= $id_danhmuc ?>">
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed"
                                            data-original-title="Sửa"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i></button>
                                    </a>
                                    <a onclick="return confirm('Bạn có muốn xóa không?')" ;
                                        href="index.php?act=xoadm&iddm=<?= $id_danhmuc ?>">
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed"
                                            data-original-title="Xóa"><i class="fa fa-trash-o"
                                                aria-hidden="true"></i></button>
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