<?php
include("monan/title.php");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form_them">
                <h4>Thêm món ăn</h4>
                <form action="index.php?act=themmonan" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="ok" class="form-label">Tên món ăn</label>
                        <input type="text" name="ten_monan" class="form-control" id="ok" placeholder="Nhập tên món ăn" required>
                    </div>
                    <div class="mb-3">
                        <label for="ok1" class="form-label">Giá món ăn</label>
                        <input type="text" name="gia_monan" class="form-control" id="ok1" placeholder="Nhập tên món ăn" required>
                    </div>
                    <div class="mb-3">
                        <label for="ok2" class="form-label">Hình ảnh món ăn</label>
                        <input type="file" name="anh_monan" class="form-control" id="ok2" placeholder="Nhập tên món ăn" required>
                    </div>

                    <div class="chosen-select-single mg-b-20 mb-3">
                        <label class="form-label">Thêm loại danh mục</label>
                        <select name="id_danhmuc" class="select2_demo_3 form-control">
                            <?php
                            foreach ($listdanhmuc as $key => $value) {
                                extract($value);
                            ?>
                                <option value="<?= $id_danhmuc ?>">
                                    <?= $tendanhmuc ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group shadow-textarea ">
                        <label for="exampleFormControlTextarea6">Mô tả món ăn</label>
                        <textarea name="mota_monan" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Nhập mô tả món ăn"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="ok2" class="form-label">Nổi bật</label>
                        <input type="number" name="noibat" class="form-control" id="ok2" placeholder="Nhập số" required>
                    </div>
                    
                    <div class="mb-3 form_btn form-check">
                        <input class="btn btn-primary mr-3 text-left" type="submit" name="themmoi" value="THÊM MỚI MÓN ĂN" required>
                        <a href="index.php?act=lietkemonan"><input class="btn btn-success text-left" type="button" value="DANH SÁCH"></a>
                    </div>
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
