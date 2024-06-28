<?php
include("tintuc/tintuc/title.php");

if (isset($list_tintuc_one) && is_array($list_tintuc_one)) {
    extract($list_tintuc_one);
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form_them">
                <h4>Cập nhật tin tức</h4>
                <form action="index.php?act=capnhattintuc" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_sua" value="<?= $id_tintuc ?>">
                    <div class="mb-3">
                        <label for="ok" class="form-label">Tên tin tức</label>
                        <input type="text" name="ten_tintuc" class="form-control" id="ok" placeholder="Nhập tên tin tức"
                            required value="<?= $ten_tintuc ?>">
                    </div>
                    <div class="mb-3">
                        <label for="ok1" class="form-label">Mô tả ngắn</label>
                        <input type="text" name="motangan" class="form-control" id="ok1" placeholder="Nhập mô tả tin tức"
                            required value="<?= $motangan ?>">
                    </div>
                    <div class="mb-3">
                        <label for="ok1" class="form-label">Mô tả</label>
                        <input type="text" name="mota_tintuc" class="form-control" id="ok1" placeholder="Nhập mô tả tin tức"
                            required value="<?= $mota_tintuc ?>">
                    </div>
                  

                    <div class="chosen-select-single mg-b-20 mb-3">
                        <label class="form-label">Thêm loại danh mục tin tức</label>
                        <select name="id_danhmuc_tintuc" class="select2_demo_3 form-control">
                            <?php

                            foreach ($listdmtintuc as $key => $value) {
                                $selected = ($id_danhmuc_tintuc == $value['id_danhmuc_tintuc']) ? "selected" : "";
                                ?>
                                <option <?= $selected ?> value="<?= $value["id_danhmuc_tintuc"] ?>">
                                    <?= $value["ten_danhmuc_tintuc"] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="ok2" class="form-label">Hình ảnh tin tức</label><br>
                        <img src="../uploads/monan/<?= $anh_tintuc ?>" width="150" alt="">
                        <input type="file" name="anh_tintuc" class="form-control" id="ok2" placeholder="">
                    </div>

                    <div class="mb-3 form_btn form-check">
                        <input class="btn btn-primary mr-3 text-left" type="submit" name="capnhat" value="CẬP NHẬT MỚI"
                            required>
                        <a href="index.php?act=lietketintuc"><input class="btn btn-success text-left" type="button"
                                value="DANH SÁCH"></a>
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