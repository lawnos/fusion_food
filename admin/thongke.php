<?php
include("../model/carbon_date/autoload.php");
include("../model/pdo.php");

use Carbon\Carbon;

if (isset($_POST['thoigian'])) {
    $thoigian = $_POST['thoigian'];
} else {
    $thoigian = "";
    $subdays = Carbon::now("Asia/Ho_Chi_Minh")->subdays(365)->toDateString();
}

if ($thoigian == "7ngay") {
    $subdays = Carbon::now("Asia/Ho_Chi_Minh")->subdays(7)->toDateString();
} else if ($thoigian == "28ngay") {
    $subdays = Carbon::now("Asia/Ho_Chi_Minh")->subdays(28)->toDateString();
} else if ($thoigian == "60ngay") {
    $subdays = Carbon::now("Asia/Ho_Chi_Minh")->subdays(60)->toDateString();
} else if ($thoigian == "90ngay") {
    $subdays = Carbon::now("Asia/Ho_Chi_Minh")->subdays(90)->toDateString();
} else if ($thoigian == "180ngay") {
    $subdays = Carbon::now("Asia/Ho_Chi_Minh")->subdays(180)->toDateString();
} else if ($thoigian == "365ngay") {
    $subdays = Carbon::now("Asia/Ho_Chi_Minh")->subdays(365)->toDateString();
} else {
    // Xử lý trường hợp $thoigian không hợp lệ ở đây nếu cần thiết
}

$now = Carbon::now("Asia/Ho_Chi_Minh")->toDateString();

$sql = "SELECT * FROM tbl_thongke WHERE ngaydat BETWEEN '$subdays' AND '$now' ORDER BY ngaydat ASC";
// $sql = "SELECT * FROM tbl_thongke WHERE ngaydat BETWEEN '2023-11-01' AND '2023-11-28' ORDER BY ngaydat ASC";
$result = pdo_query($sql);

$chart_data = array();

foreach ($result as $row) {
    $chart_data[] = array(
        'date' => $row['ngaydat'],
        'order' => $row['donhang'],
        'sales' => $row['doanhthu'],
        'quantity' => $row['soluongban'],
    );
}

echo json_encode($chart_data);
