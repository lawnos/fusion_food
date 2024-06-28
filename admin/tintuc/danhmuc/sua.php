<?php
include("tintuc/danhmuc/title.php");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form_them">
                <?php
                if (isset($listdmtintucone) && is_array($listdmtintucone)) {
                    extract($listdmtintucone);
                }
                ?>
                <form action="index.php?act=capnhatdmtintuc" method="post">
                    <div class="mb-3">
                        <input type="hidden" name="id_danhmuc_tintuc" value="<?= $id_danhmuc_tintuc ?>">
                        <label for="exampleInputPassword1" class="form-label">Tên danh mục tin tức</label>
                        <input type="text" name="ten_danhmuc_tintuc" class="form-control" id="exampleInputPassword1"
                            placeholder="Nhập tên danh mục tin tức" value="<?= $ten_danhmuc_tintuc ?>" required>
                        <label for="exampleInputPassword1" class="form-label">Phụ lục danh mục tin tức</label>
                        <input type="text" name="phuluc_danhmuc_tintuc" class="form-control" id="exampleInputPassword1"
                            placeholder="Nhập phụ lục danh mục tin tức" value="<?= $phuluc_danhmuc_tintuc ?>" required>
                    </div>
                    <div class="mb-3 form_btn form-check">
                        <input class="btn btn-primary mr-3 text-left" type="submit" name="capnhat" value="Cập nhật"
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