<?php
function themdmtintuc($ten_danhmuc_tintuc,$phuluc_danhmuc_tintuc)
{
    $sql = "INSERT INTO tbl_danhmuc_tintuc(ten_danhmuc_tintuc,phuluc_danhmuc_tintuc) VALUES ('$ten_danhmuc_tintuc','$phuluc_danhmuc_tintuc')";
    pdo_execute($sql);
}

function loaddmtintucAll()
{
    $sql = "SELECT * FROM tbl_danhmuc_tintuc Order by id_danhmuc_tintuc desc";
    $listdmtintuc = pdo_query($sql);
    return $listdmtintuc;
}

function loaddmtintucone($id)
{
    $sql = "SELECT * FROM tbl_danhmuc_tintuc WHERE id_danhmuc_tintuc = ? Order by id_danhmuc_tintuc desc";
    $listdmtintuc = pdo_query_one($sql, $id);
    return $listdmtintuc;
}


function xoadmtintuc($id)
{
    $sql = "DELETE FROM tbl_danhmuc_tintuc WHERE id_danhmuc_tintuc = ?";
    pdo_execute($sql, $id);
}

function capnhatdmtintuc($id_danhmuc_tintuc, $ten_danhmuc_tintuc, $phuluc_danhmuc_tintuc)
{
    $sql = "UPDATE tbl_danhmuc_tintuc SET ten_danhmuc_tintuc = ? , phuluc_danhmuc_tintuc = ? WHERE id_danhmuc_tintuc = ?";
    pdo_execute($sql, $ten_danhmuc_tintuc, $phuluc_danhmuc_tintuc ,$id_danhmuc_tintuc);
}
?>