<?php
function themdanhmuc($tendanhmuc)
{
    $sql = "INSERT INTO tbl_danhmuc(tendanhmuc) VALUES ('$tendanhmuc')";
    pdo_execute($sql);
}

function loaddanhmucAll()
{
    $sql = "SELECT * FROM tbl_danhmuc Order by id_danhmuc desc";
    $listdm = pdo_query($sql);
    return $listdm;
}
function loaddanhmucone($id)
{
    $sql = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc = ? Order by id_danhmuc desc";
    $listdm = pdo_query_one($sql, $id);
    return $listdm;
}

function xoadanhmuc($id)
{
    $sql = "DELETE FROM tbl_danhmuc WHERE id_danhmuc = ?";
    pdo_execute($sql, $id);
}


function capnhatdanhmuc($id, $tendanhmuc)
{
    $sql = "UPDATE tbl_danhmuc SET tendanhmuc = ? WHERE id_danhmuc = ?";
    pdo_execute($sql, $tendanhmuc, $id);
}



?>