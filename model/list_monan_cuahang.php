<?php
function list_monan_one_danhmuc($id)
{
    $sql = "SELECT * FROM tbl_monan WHERE id_danhmuc = ?";
    $listMonan = pdo_query_one($sql, $id);
    return $listMonan;
}

function list_monan_cuahang_all()
{
    $sql = "SELECT * FROM tbl_monan";
    $list_monan = pdo_query($sql);
    return $list_monan;
}


function list_monan_cuahang_loc($tukhoa, $gia_start, $gia_end)
{
    $sql = "SELECT * FROM tbl_monan WHERE ten_monan LIKE '%$tukhoa%'";
    if ($gia_start !== "" && $gia_end !== "") {
        $sql .= "AND tbl_monan.gia_monan BETWEEN $gia_start AND $gia_end";
    }
    $list_monan = pdo_query($sql);
    return $list_monan;
}


function list_all_dm()
{
    $sql = "SELECT * FROM tbl_danhmuc Order by id_danhmuc desc";
    $listdm = pdo_query($sql);
    return $listdm;
}

function list_monan_dm_in_page($tukhoa, $begin, $iddm)
{
    $sql = "SELECT * FROM tbl_danhmuc, tbl_monan WHERE tbl_monan.id_danhmuc = tbl_danhmuc.id_danhmuc AND tbl_monan.id_danhmuc = ? AND tbl_monan.ten_monan LIKE '%$tukhoa%' LIMIT $begin,9;";
    $list_monan = pdo_query($sql, $iddm);
    return $list_monan;
}



function list_monan_in_page($tukhoa, $begin, $gia_start, $gia_end)
{
    $sql = "SELECT * FROM tbl_danhmuc, tbl_monan 
            WHERE tbl_monan.id_danhmuc = tbl_danhmuc.id_danhmuc 
            AND tbl_monan.ten_monan LIKE '%$tukhoa%'";

    if ($gia_start !== "" && $gia_end !== "") {
        $sql .= "AND tbl_monan.gia_monan BETWEEN $gia_start AND $gia_end";
    }

    $sql .= " LIMIT $begin, 9";

    $list_monan = pdo_query($sql);
    return $list_monan;
}
