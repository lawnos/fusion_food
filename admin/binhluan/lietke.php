<?php
include("binhluan/title.php");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-status-wrap">
                <div class="row">
                    <div class="col-md-9">
                        <div class="product-status-wrap">
                            <h4>Liệt kê bình luận</h4>
                            <!-- Add other content for the left column as needed -->
                        </div>
                    </div>

                    <!-- <div class="col-md-3">
                        <form class="form-search-list d-flex justify-content-between">
                            <input type="text" placeholder="Search..." class="form-control">
                            <button class="btn btn-primary ml-10" href="">Tìm kiếm</button>
                        </form>
                    </div> -->
                </div>
                    <table>
                        <tbody>
                            <tr>
                                <th>Số thứ tự</th>
                                <th>Ảnh nguời bình luận</th>
                                <th>Họ tên</th>
                                <th>Số bình luận</th>
                                <th>Chi tiết</th>
                            </tr>
                            <?php
                            foreach ($list_all_cmt as $key => $value) {
                                extract($value);
                            ?>
                                <tr>
                                    <td>
                                        <?= $key + 1 ?>
                                    </td>
                                    <td>
                                        <img src="../uploads/avatar/<?= $anh_taikhoan ?>" alt="ảnh người bình luận">
                                    </td>
                                    <td>
                                        <?= $hoten ?>
                                    </td>
                                    <td>
                                        <?= $total_comments ?>
                                    </td>
                                    <td>
                                        <a href="index.php?act=chitietbinhluan&idnd=<?= $id_nguoidung ?>" class="btn btn-primary">Xem chi tiết</a>
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