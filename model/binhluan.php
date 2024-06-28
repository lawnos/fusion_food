<?php
function thembinhluan($noidung, $id_nguoidung, $id_monan, $ngaybinhluan)
{
    $sql = "INSERT INTO `tbl_binhluan`( `noidung`, `id_nguoidung`, `id_monan`, `ngaybinhluan`) VALUES (?,?,?,?)";
    pdo_execute($sql, $noidung, $id_nguoidung, $id_monan, $ngaybinhluan);
}
function loadbinhluanAll($id)
{
    $sql = "SELECT `hoten`,anh_taikhoan, `noidung`,  `ngaybinhluan` FROM `tbl_binhluan` a INNER JOIN
    tbl_taikhoan b ON a.id_nguoidung=b.id_nguoidung WHERE id_monan = ?";
    $listbinhluan = pdo_query($sql, $id);
    return $listbinhluan;
}

function delete_binhluan($id)
{
    $sql = "DELETE FROM tbl_binhluan WHERE id_binhluan = ?";
    pdo_execute($sql, $id);
}
function capnhatbinhluan($id, $noidung)
{
    $sql = "UPDATE tbl_binhluan SET noidung = ? WHERE id_binhluan = ?";
    pdo_execute($sql, $noidung, $id);
}

function list_all_cmt()
{
    $sql = "SELECT tbl_taikhoan.id_nguoidung, tbl_taikhoan.hoten, tbl_taikhoan.anh_taikhoan, COUNT(tbl_binhluan.id_binhluan) AS total_comments FROM tbl_taikhoan LEFT JOIN tbl_binhluan ON tbl_taikhoan.id_nguoidung = tbl_binhluan.id_nguoidung GROUP BY tbl_taikhoan.id_nguoidung, tbl_taikhoan.hoten, tbl_taikhoan.anh_taikhoan HAVING total_comments > 0 ORDER BY total_comments DESC;";
    $list = pdo_query($sql);
    return $list;
}


// phân trang
function list_cmt_page($begin)
{
    $sql = "SELECT * FROM tbl_binhluan ORDER BY id_tintuc DESC LIMIT $begin, 6";
    $list = pdo_query($sql);
    return $list;
}

function list_id_cmt($id_nguoidung)
{
    $sql = "SELECT
    tbl_taikhoan.id_nguoidung,
    tbl_taikhoan.hoten,
    tbl_binhluan.noidung,
    tbl_binhluan.id_monan,
    tbl_binhluan.ngaybinhluan,
    tbl_binhluan.id_binhluan,
    tbl_monan.ten_monan,
    tbl_monan.anh_monan
FROM
    tbl_binhluan
INNER JOIN
    tbl_taikhoan ON tbl_taikhoan.id_nguoidung = tbl_binhluan.id_nguoidung
INNER JOIN 
    tbl_monan ON tbl_monan.id_monan = tbl_binhluan.id_monan
WHERE tbl_taikhoan.id_nguoidung = ?
ORDER BY
    tbl_binhluan.id_binhluan DESC;";
    $list = pdo_query($sql, $id_nguoidung);
    return $list;
}
function list_id_cmt_page($id_nguoidung, $begin)
{
    $sql = "SELECT
    tbl_taikhoan.id_nguoidung,
    tbl_taikhoan.hoten,
    tbl_binhluan.noidung,
    tbl_binhluan.id_monan,
    tbl_binhluan.ngaybinhluan,
    tbl_binhluan.id_binhluan,
    tbl_monan.ten_monan,
    tbl_monan.anh_monan
FROM
    tbl_binhluan
INNER JOIN
    tbl_taikhoan ON tbl_taikhoan.id_nguoidung = tbl_binhluan.id_nguoidung
INNER JOIN 
    tbl_monan ON tbl_monan.id_monan = tbl_binhluan.id_monan
WHERE tbl_taikhoan.id_nguoidung = ?
ORDER BY
    tbl_binhluan.id_binhluan DESC
LIMIT $begin,5;";
    $list = pdo_query($sql, $id_nguoidung);
    return $list;
}

function list_id_cmt_detail($id_binhluan)
{
    $sql = "SELECT
    tbl_binhluan.noidung,
    tbl_binhluan.id_binhluan
    FROM
        tbl_binhluan
    WHERE tbl_binhluan.id_binhluan = ?
    ORDER BY
        tbl_binhluan.id_binhluan DESC;";
    $list = pdo_query($sql, $id_binhluan);
    return $list;
}


function delete_id_cmt_detail($id_binhluan)
{
    $sql = "DELETE FROM tbl_binhluan WHERE id_binhluan =  ?";
    $list = pdo_query($sql, $id_binhluan);
    return $list;
}
