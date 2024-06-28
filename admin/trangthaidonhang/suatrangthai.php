<?php
include("title.php");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form_them">
                <h4>Cập nhật trạng thái</h4>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ma_donhang" value="<?= $ma_donhang ?>">

                    <div class="chosen-select-single mg-b-20 mb-3">
                        <label class="form-label">Trạng thái</label>
                        <select name="id_trangthai" class="select2_demo_3 form-control">
                            <?php
                            $id = "";
                            foreach ($list_sua_tt_dh as $key => $tt) {
                                $id = $tt["id_trangthai"];
                            }
                            foreach ($trangthai as $key => $value) {
                                $selected = ($id == $value['id_trangthai']) ? "selected" : "";
                                ?>
                                <option <?= $selected ?> value="<?= $value["id_trangthai"] ?>">
                                    <?= $value["tentrangthai"] ?>
                                </option>
                            <?php } ?>
                        </select>

                    </div>





                    <div class="mb-3 form_btn form-check">
                        <input class="btn btn-primary mr-3 text-left" type="submit" name="capnhatdonhang"
                            value="CẬP NHẬT MỚI" required>
                        <a href="index.php?act=quanlydonhang"><input class="btn btn-success text-left" type="button"
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