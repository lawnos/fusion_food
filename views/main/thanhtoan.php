<div class="page-content bg-white">
    <!-- Banner  -->
    <div class="dz-bnr-inr style-1 text-center bg-parallax" style="background-image:url('views/assets/images/banner/bnr3.jpg'); background-size:cover; background-position:center;">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h1>Thanh toán</h1>
                <!-- Breadcrumb Row -->
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Cart Section -->
    <?php
    if (is_array($list_diachi)) {
        extract($list_diachi);
    }
    ?>
    <section class="content-inner">
        <div class="container">
            <form class="shop-form" action="index.php?act=capnhatdiachi&id_nguoidung=<?= $id_nguoidung ?>" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget">
                            <h4 class="widget-title">Địa chỉ thanh toán & giao hàng</h4>
                            <input type="hidden" name="id_diachi" value="<?= $id_diachi ?>">
                            <div class="form-group col-md-12 m-b20">
                                <label class="form-label" for="hoten">Họ tên</label>
                                <input name="hoten" required type="text" id="hoten" value="<?= $hoten ?>" class="form-control" placeholder="Họ tên">
                            </div>
                            <div class="form-group m-b20">
                                <label class="form-label" for="diachi">Địa chỉ nhận hàng</label>
                                <input name="diachi" required type="text" id="diachi" value="<?= $diachi ?>" class="form-control" placeholder="Địa chỉ">
                            </div>
                            <div class="form-group col-md-12 m-b20">
                                <label class="form-label" for="email">Email </label>
                                <input name="email" required type="email" id="email" value="<?= $email ?>" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group col-md-12 m-b20">
                                <label class="form-label" for="phone">Số điện thoại</label>
                                <input name="sodienthoai" required type="text" id="phone" value="<?= $sodienthoai ?>" class="form-control dz-number" placeholder="Số điện thoại">
                            </div>
                            <button class="btn btn-gray btnhover mb-3" type="submit" name="capnhat" data-bs-toggle="collapse" data-bs-target="#create-an-account">Cập nhật địa chỉ
                                <!-- <i class="fa fa-angle-down m-l10"></i> -->
                            </button>
                            <!-- <div id="create-an-account" class="collapse">
                                <p>Create an account by entering the information below. If you are a returning customer
                                    please login at the top of the page.</p>
                                <div class="form-group">
                                    <input name="Password" type="password" class="form-control" placeholder="Password">
                                </div>
                            </div> -->
                        </div>
                    </div>

                </div>
            </form>
            <div class="dz-divider bg-gray-dark icon-center my-5">
                <i class="fa fa-circle bg-white text-primary"></i>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <div class="widget">
                        <h4 class="widget-title">Đơn hàng của bạn</h4>
                        <table class="table-bordered check-tbl">
                            <thead class="text-center">
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Tên món ăn</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($_SESSION["cart"] as $key => $value) {
                                    extract($value);
                                ?>
                                    <tr>
                                        <td class="product-item-img"><img src="uploads/monan/<?= $anh_monan ?>" alt="Ảnh món ăn"></td>
                                        <td class="product-item-name">
                                            <?= $ten_monan ?>
                                        </td>
                                        <td class="product-item-name">
                                            <?= $soluongmua ?>
                                        </td>
                                        <td class="product-price">
                                            <?= number_format($gia_monan, 0, ",", ".") ?> VNĐ
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-5">
                    <form action="index.php?act=dathang" class="shop-form widget" method="post" enctype="application/x-www-form-urlencoded">
                        <h4 class="widget-title">Tổng số đơn hàng</h4>
                        <table class="table-bordered check-tbl mb-4">
                            <tbody>
                                <tr>
                                    <td>Tổng phụ đơn hàng</td>
                                    <td class="product-price">
                                        <?php
                                        $i = 0;
                                        $tongtien = 0;

                                        foreach ($_SESSION['cart'] as $key => $value) {
                                            $thanhtien = $value['soluongmua'] * $value['gia_monan'];
                                            $tongtien = $tongtien + $thanhtien;
                                            $i++;
                                        }
                                        echo number_format($tongtien, 0, ",", ".");
                                        ?> VNĐ
                                    </td>
                                </tr>
                                <tr>
                                    <td>Vận chuyển</td>
                                    <td>Miễn phí vận chuyển</td>
                                </tr>
                                <!-- <tr>
                                    <td>Coupon</td>
                                    <td class="product-price">Free</td>
                                </tr> -->
                                <tr>
                                    <td>Tổng cộng</td>
                                    <td class="product-price-total">
                                        <?php
                                        $i = 0;
                                        $tongtien = 0;

                                        foreach ($_SESSION['cart'] as $key => $value) {
                                            $thanhtien = $value['soluongmua'] * $value['gia_monan'];
                                            $tongtien = $tongtien + $thanhtien;
                                            $i++;
                                        }
                                        echo number_format($tongtien, 0, ",", ".");
                                        ?> VNĐ
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <h4 class="widget-title">Phương thức thanh toán</h4>

                        <div class="form-group m-b20">
                            <select class="form-select default-select" name="phuongthucthanhtoan">
                                <option selected value="tienmat">Tiền mặt</option>
                                <option value="vnp">VNPay</option>
                                <option value="momo">Momo ATM</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <?php
                            $ma_donhang = rand(0, 9999);
                            $_SESSION["madonhang"] = $ma_donhang;

                            $i = 0;
                            $tongtien = 0;
                            foreach ($_SESSION["cart"] as $key => $value) {
                                extract($value);
                                $thanhtien = $value['soluongmua'] * $value['gia_monan'];
                                $tongtien = $tongtien + $thanhtien;
                                $i++;
                            }
                            ?>
                            <input type="hidden" name="tongtien" value="<?= $tongtien ?>">
                            <input type="hidden" name="ma_donhang" value="<?= $_SESSION["madonhang"] ?>">

                            <input class="btn btn-gray btn-hover-2" type="submit" name="redirect" value="Đặt hàng ngay" id="redirect">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- cart Section -->

</div>