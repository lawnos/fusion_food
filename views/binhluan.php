<?php
include "../model/pdo.php";
include "../model/binhluan.php";
session_start();

if (isset($_POST['noidung'])) {
    $noidung = $_POST['noidung'];
    $id_nguoidung = $_POST['id_nguoidung'];
    $id = $_POST['id_monan'];
    $_SESSION["id_monan"] = $id;

    $ngaybinhluan = $_POST['ngaybinhluan'];
    thembinhluan($noidung, $id_nguoidung, $id, $ngaybinhluan);
}


// ĐỔ dữ liệu ra
$id = $_SESSION['id_monan'];
$listbinhluan =  loadbinhluanAll($id);
$output = '<ul class="comment-list">';
foreach ($listbinhluan as $key => $value) {
    if (!is_null($value)) {
        extract($value);
        $output .= '
                    <li class="comment">
                        <div class="comment-body">
                            <div class="comment-author vcard">
                                <img class="avatar photo" src="./uploads/avatar/' . $anh_taikhoan . '" alt="/">
                                <cite class="fn">' . $hoten . '</cite>
                            </div>
                            <p>' . $noidung . '</p>
                            <p>' . $ngaybinhluan . '</p>
                        </div>
                    </li>';
    }
}

$output .= '</ul>';

echo $output;
