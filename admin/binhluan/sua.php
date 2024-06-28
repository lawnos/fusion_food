<?php
include("binhluan/title.php");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form_them">
                <?php
                foreach ($list_id_cmt_detail as $key => $value) {
                    extract($value);
                }
                ?>
                <form action="index.php?act=capnhatbinhluan&id=<?= $id_nguoidung ?>&trang=<?= $_GET["trang"] ?>" method="post">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $id_binhluan ?>">
                        <label for="exampleInputPassword1" class="form-label">Tên danh mục</label>
                        <div class="mb-3">
                            <textarea class="form-control" name="noidung" rows="3"><?= $noidung ?></textarea>
                        </div>
                    </div>
                    <div class="mb-3 form_btn form-check">
                        <input class="btn btn-primary mr-3 text-left" type="submit" name="capnhat" value="Cập nhật" required>
                        <a href="index.php?act=chitietbinhluan&idnd=<?= $id_nguoidung ?>"><input class="btn btn-success text-left" type="button" value="DANH SÁCH"></a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>