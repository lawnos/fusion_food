<?php
include("danhmuc/title.php");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form_them">
                <?php
                if (isset($listdanhmucone) && is_array($listdanhmucone)) {
                    extract($listdanhmucone);
                }
                ?>
                <form action="index.php?act=capnhatdm" method="post">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $id_danhmuc ?>">
                        <label for="exampleInputPassword1" class="form-label">Tên danh mục</label>
                        <input type="text" name="tendanhmuc" class="form-control" id="exampleInputPassword1" placeholder="Nhập tên danh mục" value="<?= $tendanhmuc ?>">
                    </div>
                    <p class="text-danger"><?php $err = isset($err_tendanhmuc) ? $err_tendanhmuc : ""; echo $err?></p>

                    <div class="mb-3 form_btn form-check">
                        <input class="btn btn-primary mr-3 text-left" type="submit" name="capnhat" value="Cập nhật" required>
                        <a href="index.php?act=lietkedanhmuc"><input class="btn btn-success text-left" type="button" value="DANH SÁCH"></a>
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