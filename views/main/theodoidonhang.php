<div class="page-content bg-white">
    <!-- Banner  -->
    <div class="dz-bnr-inr style-1 text-center bg-parallax" style="background-image:url('assets/images/banner/bnr4.jpg'); background-size:cover; background-position:center;">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h1>Theo dõi đơn hàng của bạn</h1>
                <!-- Breadcrumb Row -->
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Theo dõi đơn hàng của bạn</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Team Section -->
    <section class="custom-container">
        <div class="row">
            <div class="col-12">
                <div class="team-detail">
                    <div class="dz-info">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <form action="index.php?act=theodoidonhang&id_nguoidung=<?= $_GET["id_nguoidung"] ?>" class="form-inline" id="search_food" method="post">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group mx-sm-2 mb-2">
                                                <input type="number" class="form-control" value="<?php if (isset($_POST["ma_donhang"])) {
                                                                                                        echo  $_POST["ma_donhang"];
                                                                                                    } else {
                                                                                                        echo "";
                                                                                                    } ?>" name="ma_donhang" placeholder="Tìm kiếm theo mã đơn hàng">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="form-group m-b20">
                                                <select class="form-select default-select" name="select_trangthai" required>
                                                    <option value="0" <?php if (isset($_POST["select_trangthai"]) && $_POST["select_trangthai"] == "0") echo "selected"; ?>>Tất cả</option>
                                                    <option value="1" <?php if (isset($_POST["select_trangthai"]) && $_POST["select_trangthai"] == "1") echo "selected"; ?>>Đơn mới</option>
                                                    <option value="2" <?php if (isset($_POST["select_trangthai"]) && $_POST["select_trangthai"] == "2") echo "selected"; ?>>Đã xác nhận thực hiện</option>
                                                    <option value="3" <?php if (isset($_POST["select_trangthai"]) && $_POST["select_trangthai"] == "3") echo "selected"; ?>>Đang giao hàng</option>
                                                    <option value="4" <?php if (isset($_POST["select_trangthai"]) && $_POST["select_trangthai"] == "4") echo "selected"; ?>>Giao hàng thành công</option>
                                                    <option value="5" <?php if (isset($_POST["select_trangthai"]) && $_POST["select_trangthai"] == "5") echo "selected"; ?>>Đã hủy</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <input type="submit" id="btn_search" value="Tìm kiếm" class="btn btn-primary mb-2" required>
                                        </div>
                                    </div>
                                </form>


                                <table class="table table-striped" id="table_list">
                                    <tbody>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã đơn hàng</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Số lượng mua</th>
                                            <th>Phương thức thanh toán</th>
                                            <th>Ngày mua</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                        <?php
                                        $stt = 0;
                                        foreach ($chitiet as $key => $chitiet) {
                                            $stt++;
                                        ?>
                                            <tr>

                                                <td>
                                                    <?php echo $stt; ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?php echo $chitiet['ma_donhang']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $chitiet['sodienthoai']; ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?php echo $chitiet['diachi']; ?>
                                                </td>

                                                <td style="text-align: center;">
                                                    <?php echo $chitiet['tongluongmua']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $chitiet['loai_thanhtoan']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $chitiet['ngaymua']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $chitiet['tentrangthai']; ?>
                                                </td>


                                                <?php if ($chitiet['tentrangthai'] == "Đơn mới") { ?>
                                                    <td>
                                                        <a href="index.php?act=huydonhang&ma_donhang=<?php echo $chitiet['ma_donhang']; ?>&id_nguoidung=<?= $_SESSION["user"] ?>&id_huy=<?= $chitiet["id_trangthai"] ?>" class="btn btn-danger">Hủy đơn</a>
                                                        <a href="index.php?act=xemchitietdonhang&ma_donhang=<?php echo $chitiet['ma_donhang']; ?>&id_nguoidung=<?= $_SESSION["user"] ?>" class="btn btn-primary">Xem chi tiết</a>
                                                    </td>
                                                <?php } else {  ?>
                                                    <td>
                                                        <a href="index.php?act=xemchitietdonhang&ma_donhang=<?php echo $chitiet['ma_donhang']; ?>&id_nguoidung=<?= $_SESSION["user"] ?>" class="btn btn-primary">Xem chi tiết</a>
                                                    </td>
                                                <?php }   ?>

                                            </tr>

                                        <?php } ?>

                                        <?php


                                        ?>

                                    </tbody>
                                </table>

                                <!-- </div> -->
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Team Section -->
</div>