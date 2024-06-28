<?php 
    include("tintuc/danhmuc/title.php");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form_them">
                <form action="index.php?act=themdmtintuc" method="post">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tên tin tức</label>
                        <input type="text" name="ten_danhmuc_tintuc" class="form-control" id="exampleInputPassword1"
                            placeholder="Nhập tên danh mục tin tức" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Phụ lục tin tức</label>
                        <input type="text" name="phuluc_danhmuc_tintuc" class="form-control" id="exampleInputPassword1"
                            placeholder="Nhập phụ lục danh mục tin tức" required>
                    </div>
                    <div class="mb-3 form_btn form-check">
                        <input class="btn btn-primary mr-3 text-left" type="submit" name="themmoi" value="THÊM MỚI"
                            required>
                        <a href="index.php?act=lietkedmtintuc"><input class="btn btn-success text-left" type="button"
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