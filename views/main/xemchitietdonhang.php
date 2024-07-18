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
    <section class="content-inner custom-container">
        <div class="row">
            <div class="col-12">
                <div class="team-detail">
                    <div class="dz-info">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h4>Chi tiết đơn hàng</h4>

                                <table class="table table-striped">
                                    <tbody>
                                        <tr>

                                            <th>STT</th>
                                            <th>Mã đơn hàng</th>
                                            <th>Ảnh món ăn</th>
                                            <th>Số lượng mua</th>
                                            <th>Giá tiền</th>
                                            <th>Loại thanh toán</th>
                                            <th>Ngày mua</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                        <?php
                                        $stt = 0;
                                        foreach ($chitiet as $key => $chitiet) {
                                            $stt++;
                                        ?>
                                            <tr>

                                                <td>
                                                    <?= $stt; ?>
                                                </td>

                                                <td>
                                                    <?= $chitiet['ma_donhang']; ?>
                                                </td>
                                                <td>
                                                    <img width="150" src="uploads/monan/<?= $chitiet['anh_monan']; ?>" alt="">
                                                </td>

                                                <td>
                                                    <?= $chitiet['soluongmua']; ?>
                                                </td>
                                                <td>
                                                    <?= number_format($chitiet['gia_monan'], 0, ",", '.'); ?> VNĐ
                                                </td>
                                                <td>
                                                    <?= $chitiet['loai_thanhtoan']; ?>
                                                </td>
                                                <td>
                                                    <?= $chitiet['ngaymua']; ?>
                                                </td>

                                                <?php
                                                if ($chitiet["id_trangthai"] == 1) {
                                                ?>
                                                    <td class="text-primary">
                                                        <?= $chitiet["tentrangthai"] ?>
                                                    </td>
                                                <?php
                                                } else if ($chitiet["id_trangthai"] == 2) {
                                                ?>
                                                    <td class="text-primary">
                                                        <?= $chitiet["tentrangthai"] ?>
                                                    </td>
                                                <?php
                                                } else if ($chitiet["id_trangthai"] == 3) {
                                                ?>
                                                    <td style="color: #66CC33;">
                                                        <?= $chitiet["tentrangthai"] ?>
                                                    </td>
                                                <?php
                                                } else if ($chitiet["id_trangthai"] == 4) {
                                                ?>
                                                    <td style="color: #66da98;">
                                                        <?= $chitiet["tentrangthai"] ?>
                                                    </td>
                                                <?php
                                                }
                                                ?>



                                            </tr>

                                        <?php } ?>

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