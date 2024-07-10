<?php
ob_start();
session_start();
include("./model/pdo.php");

include("./model/trangthaidonhang.php");
include("./model/lienhe.php");
include("./model/dangnhap.php");
include("./model/binhluan.php");

include("./model/list_monan_home.php");

include("./model/dmtintuc.php");
include("./model/tintuc.php");
include("./model/list_monan_cuahang.php");

// include("./model/mail_pass.php");


$list_all_post  = list_all_tintuc_home();

// session_destroy();
// die();

// print_r($_SESSION["user"]);


$list_monan_special = list_monan_special();
$list_menu_today = list_menu_today();
$list_menu_home = list_menu_home();
$list_monan_all = list_monan_all();
if (isset($list_monan_all)) {
    foreach ($list_monan_all as $value) {
        extract($value);
    }
    $list_monan_same_cart = list_monan_same_cart($id_danhmuc);
}

if (isset($_SESSION["user"])) {
    $id_nguoidung = $_SESSION["user"];
    $list_tk = list_check_tk_id($id_nguoidung);
}


if (isset($_GET["act"]) && $_GET["act"] != "") {
    include("./views/header/header_act.php");
} else {
    include("./views/header/header.php");
}


if (isset($_GET["act"]) && $_GET["act"] != "") {
    $act = $_GET["act"];

    switch ($act) {
            // Tài khoản
        case "dangnhap":
            $sodienthoai = $pass = "";
            $err_sodienthoai = $err_pass = "";
            if (isset($_POST["submit"])) {
                $sodienthoai = $_POST["sodienthoai"];
                $pass = $_POST["pass"];

                $check = 0;
                if (empty(trim($sodienthoai))) {
                    $err_sodienthoai = "Bạn chưa nhập trường này";
                    $check++;
                } else {
                    if (!preg_match("/^0\d{9}$/", $sodienthoai)) {
                        $check++;
                        $err_sodienthoai = "Bạn phải nhập đúng định dạng số điện thoại";
                    }
                }

                if (empty(trim($pass))) {
                    $err_pass = "Bạn chưa nhập trường này";
                    $check++;
                }

                if ($check == 0) {
                    $result = check_tk_one_main($sodienthoai, $pass);
                    if ($result) {
                        extract($result);
                        $_SESSION["email"] = $email;
                        $_SESSION["user"] = $id_nguoidung;
                        echo '<script>alert("Thành công")</script>';
                        echo '<script>window.location.href = "index.php";</script>';
                    } else {
                        $err_pass = "Bạn nhập sai số điện thoại hoặc mật khẩu.";
                    }
                }
            }
            include "./views/main/dangnhap.php";
            break;

            // Menu
        case "cuahang":
            $tukhoa = "";
            if (isset($_POST['timkiem'])) {
                $tukhoa = $_POST['tukhoa'];
            }

            if (isset($_GET['trang'])) {
                $page = intval($_GET['trang']);
            } else {
                $page = 1;
            }

            if ($page == "" || $page == 1) {
                $begin = 0;
            } else {
                $begin = ($page * 9) - 9;
            }

            $gia_start = "";
            $gia_end = "";

            if (isset($_POST["loc_gia"])) {
                $gia_start = $_POST["gia_start"];
                $gia_end = $_POST["gia_end"];
            }

            $list_all_dm = list_all_dm();
            $list_monan_cuahang_all = list_monan_cuahang_all(); //Đếm phân trang
            $list_monan_cuahang_loc = list_monan_cuahang_loc($tukhoa, $gia_start, $gia_end); // Đếm phân trang khi tìm kiếm
            $list_monan_in_page = list_monan_in_page($tukhoa, $begin, $gia_start, $gia_end);

            include("./views/main/cuahang.php");
            break;

            case "cuahangloc":
                $tukhoa = "";
                if (isset($_POST['timkiem'])) {
                    $tukhoa = $_POST['tukhoa'];
                }
    
                if (isset($_GET['trang'])) {
                    $page = intval($_GET['trang']);
                } else {
                    $page = 1;
                }
    
                if ($page == "" || $page == 1) {
                    $begin = 0;
                } else {
                    $begin = ($page * 9) - 9;
                }
    
                $gia_start = "";
                $gia_end = "";
    
                if (isset($_POST["loc_gia"])) {
                    $gia_start = $_POST["gia_start"];
                    $gia_end = $_POST["gia_end"];
                }
    
                $list_all_dm = list_all_dm();
                $list_monan_cuahang_all = list_monan_cuahang_all(); //Đếm phân trang
                $list_monan_cuahang_loc = list_monan_cuahang_loc($tukhoa, $gia_start, $gia_end); // Đếm phân trang khi tìm kiếm
                $list_monan_in_page = list_monan_in_page($tukhoa, $begin, $gia_start, $gia_end);
    
                include("./views/main/cuahangloc.php");
                break;


        case "monandanhmuc":
            if (isset($_GET["iddm"])) {
                $tukhoa = "";
                if (isset($_POST['timkiem'])) {
                    $tukhoa = $_POST['tukhoa'];
                }

                if (isset($_GET['trang'])) {
                    $page = intval($_GET['trang']);
                } else {
                    $page = 1;
                }

                if ($page == "" || $page == 1) {
                    $begin = 0;
                } else {
                    $begin = ($page * 9) - 9;
                }

                $iddm = intval($_GET["iddm"]);
                $list_monan_dm_in_page = list_monan_dm_in_page($tukhoa, $begin, $iddm);
            }


            $list_all_dm = list_all_dm();
            $list_monan_cuahang_all = list_monan_cuahang_all();
            include("./views/main/monan_danhmuc.php");
            break;

        case "chitietmonan":
            if (isset($_GET["id_monan"]) && $_GET["id_monan"] > 0) {
                $id = $_GET["id_monan"];
                $listmonan = list_monan_One($id);
                $listbinhluan =  loadbinhluanAll($id);

                if (isset($_SESSION["user"])) {
                    $id_nguoidung = $_SESSION["user"];
                    $list_tk = list_check_tk_id($id_nguoidung);
                }

                $list_douong = list_douong();

                include("./views/main/chitiet_monan.php");
            }

            break;

            if (isset($_POST["themgio"])) {
                $ids = array();

                // Thêm món ăn từ URL vào mảng nếu tồn tại
                if (isset($_GET["id_monan"])) {
                    $ids[] = $_GET["id_monan"];
                }

                // Thêm món ăn từ checkbox vào mảng nếu tồn tại
                if (isset($_POST["id_monan"]) && is_array($_POST["id_monan"])) {
                    $ids = array_merge($ids, $_POST["id_monan"]);
                }

                foreach ($ids as $key => $value) {
                    $list_monan_cart = list_monan_cart($value);

                    if (is_array($list_monan_cart)) {
                        $soluongmua = isset($_GET["id_monan"]) ? ($_POST["soluongmua"] ?? 1) : ($_POST["soluongmua"][$key] ?? 1);

                        $new_food = [
                            "id_monan" => $list_monan_cart[0]['id_monan'],
                            "ten_monan" => $list_monan_cart[0]['ten_monan'],
                            "gia_monan" => $list_monan_cart[0]['gia_monan'],
                            "anh_monan" => $list_monan_cart[0]['anh_monan'],
                            "soluongmua" => $soluongmua,
                        ];

                        if (isset($_SESSION['cart'])) {
                            $found = false;

                            foreach ($_SESSION['cart'] as $i => $cart_item) {
                                if ($cart_item['id_monan'] == $value) {
                                    $_SESSION['cart'][$i]['soluongmua'] += $soluongmua;
                                    $found = true;
                                    break;
                                }
                            }

                            if (!$found) {
                                array_push($_SESSION['cart'], $new_food);
                            }
                        } else {
                            $_SESSION['cart'] = array($new_food);
                        }
                    }
                }
                // echo "<pre>";
                // print_r($_SESSION['cart']);

                echo "<script>alert('Đã thêm thành công');</script>";
                echo '<script>window.location.href = "index.php?act=giohang";</script>';
            }
            break;


        
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $ho_ten = $_POST['ho_ten'];
                $email = $_POST['email'];
                $sodienthoai = $_POST['sodienthoai'];
                $noidung = $_POST['noidung'];
                $trangthai = 0;

                insert_lienhe($ho_ten, $email, $sodienthoai, $noidung, $trangthai);
            }
            break;
    }
} else {
    include("./views/main/main.php");
}



if (isset($_GET["act"]) && $_GET["act"] != "") {
    include("./views/footer/footer_act.php");
} else {
    include("./views/footer/footer.php");
}

ob_end_flush();