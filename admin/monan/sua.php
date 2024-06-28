<?php
include("monan/title.php");

if (isset($list_monan_one) && is_array($list_monan_one)) {
    extract($list_monan_one);
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form_them">
                <h4>Cập nhật món ăn</h4>
                <form action="index.php?act=capnhatmonan" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_sua" value="<?= $id_monan ?>">
                    <div class="mb-3">
                        <label for="ok" class="form-label">Tên món ăn</label>
                        <input type="text" name="ten_monan" class="form-control" id="ok" placeholder="Nhập tên món ăn" value="<?= $ten_monan ?>">
                    </div>
                    <p class="text-danger"><?= $err_tenmonan ?? "" ?></p>

                    <div class="mb-3">
                        <label for="ok1" class="form-label">Giá món ăn</label>
                        <input type="text" name="gia_monan" class="form-control" id="ok1" placeholder="Nhập tên món ăn" value="<?= $gia_monan ?>">
                    </div>
                    <p class="text-danger"><?= $err_giamonan ?? "" ?></p>

                    <div class="mb-3">
                        <label for="ok2" class="form-label">Hình ảnh món ăn</label><br>
                        <img src="../uploads/monan/<?= $anh_monan ?>" width="150" alt="">
                        <input type="file" name="anh_monan" class="form-control" id="ok2" placeholder="Nhập tên món ăn">
                    </div>
                    <p class="text-danger"><?= $err_anhmoan ?? "" ?></p>

                    <div class="chosen-select-single mg-b-20 mb-3">
                        <label class="form-label">Thêm loại danh mục</label>
                        <select name="id_danhmuc" class="select2_demo_3 form-control">
                            <?php
                            foreach ($listdanhmuc as $key => $value) {
                                $selected = ($id_danhmuc == $value['id_danhmuc']) ? "selected" : "";
                            ?>
                                <option <?= $selected ?> value="<?= $value["id_danhmuc"] ?>">
                                    <?= $value["tendanhmuc"] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group shadow-textarea ">
                        <label for="exampleFormControlTextarea6">Mô tả món ăn</label>
                        <textarea name="mota_monan" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Nhập mô tả món ăn"><?= $mota_monan ?></textarea>
                    </div>
                    <p class="text-danger"><?= $err_motamonan ?? "" ?></p>


                    <div class="chosen-select-single mg-b-20 mb-3">
                        <label class="form-label">Xuất hiện ở đâu</label>
                        <select name="noibat" class="select2_demo_3 form-control">
                            <option <?php if ($noibat == 1) {
                                        echo "selected";
                                    } ?> value="1">Thực đơn hôm nay</option>
                            <option <?php if ($noibat == 20) {
                                        echo "selected";
                                    } ?> value="20">Menu đặc biệt</option>
                            <option <?php if ($noibat == 2) {
                                        echo "selected";
                                    } ?> value="2">Tất cả</option>
                        </select>
                    </div>

                    <div class="mb-3 form_btn form-check">
                        <input class="btn btn-primary mr-3 text-left" type="submit" name="capnhat" value="CẬP NHẬT MỚI">
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