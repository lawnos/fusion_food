<?php
function list_monan_special()
{
    $sql = "SELECT * FROM tbl_monan, tbl_danhmuc WHERE tbl_monan.id_danhmuc = tbl_danhmuc.id_danhmuc AND tbl_monan.noibat > 5 ORDER BY id_monan DESC";
    $list_monan = pdo_query($sql);
    return $list_monan;
}

function list_monan_special_detail()
{
    $sql = "SELECT * FROM tbl_monan, tbl_danhmuc WHERE tbl_monan.id_danhmuc = tbl_danhmuc.id_danhmuc AND tbl_monan.noibat > 5 ORDER BY id_monan DESC";
    $list_monan = pdo_query($sql);
    return $list_monan;
}

function list_menu_today()
{
    $sql = "SELECT * FROM tbl_monan, tbl_danhmuc WHERE tbl_monan.id_danhmuc = tbl_danhmuc.id_danhmuc AND tbl_monan.noibat = 1 ORDER BY id_monan DESC limit 4";
    $list_monan = pdo_query($sql);
    return $list_monan;
}
function list_menu_home()
{
    $sql = "SELECT * FROM tbl_monan, tbl_danhmuc WHERE tbl_monan.id_danhmuc = tbl_danhmuc.id_danhmuc AND tbl_monan.noibat = 1 ORDER BY id_monan DESC";
    $list_monan = pdo_query($sql);
    return $list_monan;
}

function list_monan_cart($id)
{
    $sql = "SELECT * FROM tbl_monan WHERE tbl_monan.id_monan = ? limit 1";
    $list_monan = pdo_query($sql, $id);
    return $list_monan;
}

function list_monan_same_cart($id_dm)
{
    $sql = "SELECT * FROM tbl_monan WHERE tbl_monan.id_danhmuc != ?";
    $list_monan = pdo_query($sql, $id_dm);
    return $list_monan;
}

function list_monan_all()
{
    $sql = "SELECT * FROM tbl_monan";
    $list_monan = pdo_query($sql);
    return $list_monan;
}
function list_monan_One($id)
{
    $sql = "SELECT * FROM tbl_monan WHERE id_monan = ?";
    $listMonan = pdo_query_one($sql, $id);
    return $listMonan;
}
function list_douong()
{
    $sql = "SELECT * FROM tbl_monan, tbl_danhmuc WHERE tbl_monan.id_danhmuc = tbl_danhmuc.id_danhmuc AND tbl_danhmuc.id_danhmuc = 23 ORDER BY tbl_danhmuc.id_danhmuc DESC LIMIT 4;";
    $listMonan = pdo_query($sql);
    return $listMonan;
}






?>