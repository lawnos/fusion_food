<?php
function thong_ke_hoadon()
{
    $sql = "SELECT COUNT(*) AS donmoi FROM tbl_hoadon WHERE id_trangthai = 1";
    $list = pdo_query($sql);
    return $list;
}

function doanh_thu_hoadon()
{
    $sql = "SELECT SUM(doanhthu) as doanhthu FROM tbl_thongke;";
    $list = pdo_query($sql);
    return $list;
}


function thongke_donhang_ma_donhang($id)
{
    $sql = "SELECT * FROM tbl_hoadon_chitiet 
    INNER JOIN tbl_monan ON tbl_hoadon_chitiet.id_monan = tbl_monan.id_monan 
    INNER JOIN tbl_hoadon ON tbl_hoadon.ma_donhang = tbl_hoadon_chitiet.ma_donhang 
    WHERE tbl_hoadon.ma_donhang = ?";
    $list = pdo_query($sql, $id);
    return $list;
}

function don_thanh_cong()
{
    $sql = "SELECT COUNT(*) AS donthanhcong FROM tbl_hoadon WHERE id_trangthai = 4";
    $list = pdo_query($sql);
    return $list;
}
function don_huy()
{
    $sql = "SELECT COUNT(*) AS donhuy FROM tbl_hoadon WHERE id_trangthai = 5";
    $list = pdo_query($sql);
    return $list;
}

function thongke($ngaydat)
{
    $sql = "SELECT * FROM tbl_thongke WHERE ngaydat = ?";
    $list = pdo_query($sql, $ngaydat);
    return $list;
}

function insert_thongke($ngaydat, $doanhthu, $donhang, $soluongban)
{
    $sql = "INSERT INTO tbl_thongke(ngaydat, doanhthu, donhang, soluongban) VALUES (?,?,?,?)";
    return pdo_execute($sql, $ngaydat, $doanhthu, $donhang, $soluongban);
}

function update_thongke($doanhthu, $donhang, $soluongban, $ngaydat)
{
    $sql = "UPDATE tbl_thongke SET doanhthu=?, donhang=?, soluongban = ? WHERE ngaydat = ?";
    return pdo_execute($sql, $doanhthu, $donhang, $soluongban, $ngaydat);
}


// thống kê theo doanh thu theo danh mục
function thongke_doanhthu_theo_danhmuc()
{
    $sql = "SELECT 
    tbl_danhmuc.id_danhmuc AS madm,
    tbl_danhmuc.tendanhmuc AS tendm,
    COUNT(tbl_monan.id_monan) AS countmonan,
    MIN(tbl_monan.gia_monan) AS minprice,
    MAX(tbl_monan.gia_monan) AS maxprice,
    ROUND(AVG(tbl_monan.gia_monan)) AS trungbinh
FROM 
    tbl_monan
LEFT JOIN 
    tbl_danhmuc ON tbl_danhmuc.id_danhmuc = tbl_monan.id_danhmuc
GROUP BY 
    tbl_danhmuc.id_danhmuc
ORDER BY 
    tbl_danhmuc.id_danhmuc DESC;";
    $list = pdo_query($sql);
    return $list;
}


function thongke_binhluan()
{
    $sql = "SELECT ngaybinhluan, COUNT(*) as comment_count
    FROM tbl_binhluan
    GROUP BY ngaybinhluan
    ORDER BY ngaybinhluan;";
    $list = pdo_query($sql);
    return $list;
}
