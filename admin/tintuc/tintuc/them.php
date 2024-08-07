<?php
include("tintuc/tintuc/title.php");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form_them">
                <h4>Thêm tin tức</h4>
                <form action="index.php?act=themtintuc" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="ok" class="form-label">Tên tin tức</label>
                        <input type="text" name="ten_tintuc" class="form-control" id="ok" placeholder="Nhập tên tin tức" required>
                    </div>
                    <div class="mb-3">
                        <label for="ok1" class="form-label">Mô tả ngắn</label>
                        <input type="text" name="motangan" class="form-control" id="ok1" placeholder="Nhập mô tả tin tức">
                    </div>
                    <div class="mb-3">
                        <label for="ok1" class="form-label">Mô tả</label>
                        <input type="text" name="mota_tintuc" class="form-control" id="ok1" placeholder="Nhập mô tả tin tức" required>
                    </div>

                    <div class="chosen-select-single mg-b-20 mb-3">
                        <label class="form-label">Thêm loại danh mục</label>
                        <select name="id_danhmuc_tintuc" class="select2_demo_3 form-control">
                            <?php
                            foreach ($listdmtintuc as $key => $value) {
                                extract($value);
                            ?>
                                <option value="<?= $id_danhmuc_tintuc ?>">
                                    <?= $ten_danhmuc_tintuc ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="ok2" class="form-label">Hình ảnh tin tức</label>
                        <input type="file" name="anh_tintuc" class="form-control" id="ok2" placeholder="" required>
                    </div>

                    <div class="mb-3 form_btn form-check">
                        <input class="btn btn-primary mr-3 text-left" type="submit" name="themmoi" value="THÊM MỚI" required>
                        <a href="index.php?act=lietketintuc"><input class="btn btn-success text-left" type="button" value="DANH SÁCH"></a>
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