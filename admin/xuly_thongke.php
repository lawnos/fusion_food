<?php
include("../model/carbon_date/autoload.php");
include("../model/pdo.php");

use Carbon\Carbon;

$ngaydat = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();


function thongke($ngaydat)
{
    $sql = "SELECT * FROM tbl_thongke WHERE ngaydat = ?";
    $list = pdo_query($sql, $ngaydat);
    return $list;
}


$list_donhang = thongke_donhang_ma_donhang();
print_r($list_donhang);

$ngaydat = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
$list_thongke = thongke($ngaydat);

$soluongmua = 0;
$doanhthu = 0;

foreach ($list_donhang as $key => $value) {
    $soluongmua += $value["soluongmua"];
    $doanhthu += $value["gia_monan"] * $value["soluongmua"];
}

if (count($list_donhang) == 0) {
    $soluongban = $soluongmua;
    $donhang = 1;
    // insert
    insert_thongke($ngaydat, $soluongban, $doanhthu, $donhang);
} else {
    $soluongban = 0; // Reset giá trị
    foreach ($list_donhang as $key => $value) {
        $soluongban += $value["soluongmua"];
    }

    // Cập nhật thông tin thống kê
    update_thongke($doanhthu, count($list_donhang), $soluongban, $ngaydat);
}
