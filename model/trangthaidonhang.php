<?php
function loaddonhangAll()
{
    $sql = "SELECT a.loai_thanhtoan,a.ma_donhang, c.hoten,c.diachi,c.sodienthoai, a.id_trangthai,a.ngaymua, a.id_giohang, d.id_trangthai, d.tentrangthai  
    FROM tbl_hoadon a  
    INNER join tbl_diachinhanhang c ON a.id_nguoidung = c.id_nguoidung 
    INNER JOIN tbl_trangthai d on a.id_trangthai = d.id_trangthai 
    WHERE a.id_trangthai IN (0,1, 2, 3)
    ORDER BY a.ngaymua DESC;";
    $listdh = pdo_query($sql);
    return $listdh;
}
function list_sua_tt_dh($mddh)
{
    $sql = "SELECT id_trangthai FROM tbl_hoadon WHERE ma_donhang = ?";
    $listdh = pdo_query($sql, $mddh);
    return $listdh;
}



function loaddonhangAll_page($begin)
{
    $sql = "SELECT a.loai_thanhtoan,a.ma_donhang, c.hoten,c.diachi,c.sodienthoai, a.id_trangthai,a.ngaymua, a.id_giohang, d.id_trangthai, d.tentrangthai  
    FROM tbl_hoadon a  
    INNER join tbl_diachinhanhang c ON a.id_nguoidung = c.id_nguoidung 
    INNER JOIN tbl_trangthai d on a.id_trangthai = d.id_trangthai 
    WHERE a.id_trangthai IN (0,1, 2, 3)
    ORDER BY a.ngaymua DESC
    LIMIT $begin,10";
    $listdh = pdo_query($sql);
    return $listdh;
}
function loaddonhangtk()
{
    $sql = "SELECT a.loai_thanhtoan,a.ma_donhang, a.id_giohang,c.hoten,c.diachi,c.sodienthoai, a.id_trangthai,a.ngaymua, d.id_trangthai,d.tentrangthai  
    FROM tbl_hoadon a  
    INNER join tbl_diachinhanhang c ON a.id_nguoidung = c.id_nguoidung 
    INNER JOIN tbl_trangthai d on a.id_trangthai = d.id_trangthai 
    WHERE a.id_trangthai IN (4)
    ORDER BY a.id_giohang DESC;";
    $listdhtk = pdo_query($sql);
    return $listdhtk;
}
function loaddonhangtk_page($begin)
{
    $sql = "SELECT a.loai_thanhtoan,a.ma_donhang, a.id_giohang,c.hoten,c.diachi,c.sodienthoai, a.id_trangthai,a.ngaymua, d.id_trangthai,d.tentrangthai  
    FROM tbl_hoadon a  
    INNER join tbl_diachinhanhang c ON a.id_nguoidung = c.id_nguoidung 
    INNER JOIN tbl_trangthai d on a.id_trangthai = d.id_trangthai 
    WHERE a.id_trangthai IN (4)
    ORDER BY a.id_giohang DESC
    LIMIT $begin,10";
    $listdhtk = pdo_query($sql);
    return $listdhtk;
}


function loaddonhanghuy()
{
    $sql = "SELECT a.loai_thanhtoan ,a.ma_donhang, a.id_giohang,c.hoten,c.diachi,c.sodienthoai, a.id_trangthai,a.ngaymua,d.tentrangthai 
    FROM tbl_hoadon a 
    INNER join tbl_diachinhanhang c ON a.id_nguoidung = c.id_nguoidung 
    INNER JOIN tbl_trangthai d on a.id_trangthai = d.id_trangthai 
    WHERE a.id_trangthai IN (5) 
    ORDER BY a.id_giohang DESC;
    ;";
    $listdhhuy = pdo_query($sql);
    return $listdhhuy;
}

function capnhattrangthai($id, $id_trangthai)
{
    $sql = "UPDATE tbl_hoadon SET id_trangthai = ? WHERE ma_donhang = ?";
    pdo_execute($sql, $id_trangthai, $id);
}
function list_trangthai_One($id)
{
    $sql = "SELECT * FROM tbl_hoadon WHERE ma_donhang = ?";
    $trangThai = pdo_query_one($sql, $id);
    return $trangThai;
}
function loadtrangthaiAll()
{
    $sql = "SELECT * FROM tbl_trangthai";
    $listth = pdo_query($sql);
    return $listth;
}

function list_chitiet_One($id)
{
    $sql = "SELECT b.loai_thanhtoan,b.ngaymua, c.hoten,c.sodienthoai,c.diachi,b.ma_donhang,d.ten_monan,d.gia_monan,d.anh_monan,a.soluongmua,a.soluongmua*d.gia_monan AS tong_tien, id_giohang ,e.tentrangthai 
    FROM tbl_hoadon_chitiet a 
    INNER JOIN tbl_hoadon b ON a.ma_donhang = b.ma_donhang 
    INNER JOIN tbl_diachinhanhang c on b.id_nguoidung = c.id_nguoidung 
    INNER JOIN tbl_monan d ON a.id_monan = d.id_monan 
    INNER JOIN tbl_trangthai e on b.id_trangthai = e.id_trangthai 
    WHERE b.ma_donhang = ?
    ORDER BY id_giohang DESC;";
    $chitiet = pdo_query($sql, $id);
    return $chitiet;
}

function list_chitiet_one_donhang($id)
{
    $sql = "SELECT b.id_trangthai, a.id_monan,b.loai_thanhtoan,b.ngaymua, c.hoten,c.sodienthoai,c.diachi,b.ma_donhang,d.ten_monan,d.gia_monan,d.anh_monan,a.soluongmua,a.soluongmua*d.gia_monan AS tong_tien, id_giohang ,e.tentrangthai 
    FROM tbl_hoadon a 
    INNER JOIN tbl_diachinhanhang c on b.id_nguoidung = c.id_nguoidung 
    INNER JOIN tbl_monan d ON a.id_monan = d.id_monan 
    INNER JOIN tbl_trangthai e on b.id_trangthai = e.id_trangthai 
    WHERE b.id_nguoidung = ?
    ORDER BY b.id_trangthai DESC;";
    $chitiet = pdo_query($sql, $id);
    return $chitiet;
}

function list_chitiet_one_donhang_chitiet($id)
{
    $sql = "SELECT hd.id_giohang, hd.ma_donhang, hd.ngaymua, hd.id_trangthai, hd.loai_thanhtoan ,hdct.ma_donhang, hdct.id_monan, hdct.soluongmua, tt.id_trangthai, tt.tentrangthai, ma.id_monan, ma.ten_monan, ma.gia_monan, ma.anh_monan
    FROM tbl_hoadon as hd
    INNER JOIN tbl_hoadon_chitiet as hdct ON hd.ma_donhang = hdct.ma_donhang
    INNER JOIN tbl_trangthai as tt ON hd.id_trangthai = tt.id_trangthai
    INNER JOIN tbl_monan as ma ON hdct.id_monan = ma.id_monan
    WHERE hd.ma_donhang = ?";
    $chitiet = pdo_query($sql, $id);
    return $chitiet;
}

function huydonhang($id, $id_trangthai)
{
    $sql = "UPDATE tbl_hoadon SET id_trangthai = ? WHERE ma_donhang = ?";
    pdo_execute($sql, $id_trangthai, $id);
}


function loaddonhangAll_user($ma_donhang, $select_trangthai, $id)
{
    $sql = "SELECT a.id_giohang, a.loai_thanhtoan,a.ma_donhang, c.hoten,c.diachi,c.sodienthoai, b.ma_donhang, SUM(soluongmua) AS tongluongmua ,a.id_trangthai,a.ngaymua, a.id_giohang, d.id_trangthai, d.tentrangthai  
    FROM tbl_hoadon a  
    INNER JOIN tbl_hoadon_chitiet b ON a.ma_donhang = b.ma_donhang
    INNER join tbl_diachinhanhang c ON a.id_nguoidung = c.id_nguoidung 
    INNER JOIN tbl_trangthai d on a.id_trangthai = d.id_trangthai 
    WHERE a.id_trangthai IN (0,1, 2, 3) AND a.id_nguoidung = ?";

    if ($ma_donhang != "") {
        $sql .= " AND a.ma_donhang = ?";
    }

    if ($select_trangthai > 0) {
        $sql .= " AND a.id_trangthai = ?";
    }

    $sql .= " GROUP BY b.ma_donhang
    ORDER BY a.id_giohang DESC;";

    $params = [$id];

    if ($ma_donhang != "") {
        $params[] = $ma_donhang;
    }

    if ($select_trangthai > 0) {
        $params[] = $select_trangthai;
    }

    $listdh = pdo_query($sql, ...$params);
    return $listdh;
}
