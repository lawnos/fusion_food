<?php
function load_search($ma_donhang, $select_trangthai, $id)
{
    $sql = "SELECT a.loai_thanhtoan, a.ma_donhang, c.hoten, c.diachi, c.sodienthoai, b.ma_donhang, SUM(soluongmua) AS tongluongmua, a.id_trangthai, a.ngaymua, a.id_giohang, d.id_trangthai, d.tentrangthai  
    FROM tbl_hoadon a  
    INNER JOIN tbl_hoadon_chitiet b ON a.ma_donhang = b.ma_donhang
    INNER JOIN tbl_diachinhanhang c ON a.id_nguoidung = c.id_nguoidung 
    INNER JOIN tbl_trangthai d ON a.id_trangthai = d.id_trangthai 
    WHERE a.id_nguoidung = ?";

    if ($ma_donhang != "") {
        $sql .= " AND a.ma_donhang = ?";
    }

    if ($select_trangthai > 0) {
        $sql .= " AND a.id_trangthai = ?";
    }

    $sql .= " GROUP BY b.ma_donhang
              ORDER BY a.id_trangthai DESC;";

    // Thực hiện truy vấn SQL
    if ($ma_donhang != "" && $select_trangthai > 0) {
        $listsp = pdo_query($sql, $id, $ma_donhang, $select_trangthai);
    } elseif ($ma_donhang != "") {
        $listsp = pdo_query($sql, $id, $ma_donhang);
    } elseif ($select_trangthai > 0) {
        $listsp = pdo_query($sql, $id, $select_trangthai);
    } else {
        $listsp = pdo_query($sql, $id);
    }

    return $listsp;
}
