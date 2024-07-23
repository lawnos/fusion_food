<?php
function themdanhmuc($tendanhmuc)
{
    $sql = "INSERT INTO tbl_danhmuc(tendanhmuc) VALUES ('$tendanhmuc')";
    pdo_execute($sql);
}

function loaddanhmucAll()
{
    $sql = "SELECT * FROM tbl_danhmuc WHERE is_deleted = 0 ORDER BY id_danhmuc DESC";
    $listdm = pdo_query($sql);
    return $listdm;
}

function loaddanhmucone($id)
{
    $sql = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc = ? AND is_deleted = 0 ORDER BY id_danhmuc DESC";
    $listdm = pdo_query_one($sql, $id);
    return $listdm;
}

function xoadanhmuc($id)
{
    $sql = "UPDATE tbl_danhmuc SET is_deleted = 1 WHERE id_danhmuc = ?";
    pdo_execute($sql, $id);
}

function capnhatdanhmuc($id, $tendanhmuc)
{
    $sql = "UPDATE tbl_danhmuc SET tendanhmuc = ? WHERE id_danhmuc = ?";
    pdo_execute($sql, $tendanhmuc, $id);
}

// Hàm khôi phục danh mục đã xóa mềm
function khoiphucdanhmuc($id)
{
    $sql = "UPDATE tbl_danhmuc SET is_deleted = 0 WHERE id_danhmuc = ?";
    pdo_execute($sql, $id);
}
