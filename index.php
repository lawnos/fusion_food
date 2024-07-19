<?php
ob_start();
session_start();
include("./model/pdo.php");
include("./model/connect_vnpay.php");
include("./model/trangthaidonhang.php");
include("./model/lienhe.php");
include("./model/dangnhap.php");
include("./model/binhluan.php");
include("./model/addcart.php");
include("./model/list_monan_home.php");
include("./model/bankking.php");
include("./model/list_monan_cuahang.php");
include("./model/mail.php");
// include("./model/mail_pass.php");



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
                        echo '<script>alert("Đăng nhập thành công")</script>';
                        echo '<script>window.location.href = "index.php";</script>';
                    } else {
                        $err_pass = "Bạn nhập sai số điện thoại hoặc mật khẩu.";
                    }
                }
            }
            include "./views/main/dangnhap.php";
            break;

        case "dangki":

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $hoten = $_POST["hoten"];
                $sodienthoai = $_POST["sodienthoai"];
                $email = $_POST["email"];
                $pass = $_POST["matkhau"];
                $anh_taikhoan = "";
                $diachi = "Địa chỉ ?";

                $id_nguoidung = insert_tk($hoten, $sodienthoai, $email, $pass, $vaitro = 0, $anh_taikhoan, $diachi);
                // Thêm luôn địa chỉ mặc định
                insert_diachi_order($hoten, $diachi, $email, $sodienthoai, $id_nguoidung);
            }
            break;

        case "quenmatkhau":
            $email = "";
            $errEmail = "";
            if (isset($_POST["submit"])) {
                $email = $_POST["email"];
                $check = 0;
                if (empty(trim($email))) {
                    $check++;
                    $errEmail = "Bạn chưa nhập trường này";
                } elseif (!preg_match("/^[^\s@]+@[^\s@]+\.[^\s@]+$/", $email)) {
                    $check++;
                    $errEmail = "Bạn phải nhập đúng định dạng email";
                }

                if ($check == 0) {
                    $list = list_users_in_pass($email);
                    foreach ($list as $key => $value) {
                        $pass = $value['matkhau'];
                        submit_mailpass($pass, $email);
                    }
                    echo '<script>alert("Chúng tôi đã cấp cho bạn mật khẩu vui lòng check mail của bạn.")</script>';
                    echo '<script>window.location.href = "index.php?act=dangnhap";</script>';
                }
            }
            include "./views/main/quenmatkhau.php";
            break;

        case "suataikhoan":
            if (isset($_GET["id_nguoidung"]) > 0) {
                $id_nguoidung = $_GET["id_nguoidung"];
                $user = list_check_tk_id($id_nguoidung);
            }
            include("./views/main/capnhat_user.php");
            break;


        case "capnhattaikhoan":
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $id_nguoidung = $_POST["id_sua"];
                $hoten = $_POST["hoten"];
                $sodienthoai = $_POST["sodienthoai"];
                $email = $_POST["email"];
                $diachi = $_POST["diachi"];
                $matkhau = $_POST["pass"];
                $vaitro = 0;

                $anh_taikhoan = $_FILES["anh_taikhoan"]["name"];
                $anh_taikhoan_tmp = $_FILES['anh_taikhoan']['tmp_name'];
                $upload = "uploads/avatar/";

                $user = list_check_tk_id($id_nguoidung);

                $new_anhtk = "";
                if ($anh_taikhoan != "") {
                    $linkanh = 'uploads/avatar/' . $user['anh_taikhoan'];
                    unlink($linkanh);

                    $new_anhtk = time() . "_" . basename($anh_taikhoan);

                    $target_file = $upload . $new_anhtk;
                    if (move_uploaded_file($anh_taikhoan_tmp, $target_file)) {
                        echo "Thêm ảnh thành công";
                    } else {
                        echo "Lỗi khi tải lên ảnh mới";
                    }
                }

                unset($_SESSION["user"]);
                $_SESSION["user"] = $id_nguoidung;
                update_taikhoan($hoten, $sodienthoai, $email, $matkhau, $vaitro, $new_anhtk, $diachi, $id_nguoidung);

                echo '<script>alert("Sửa tài khoản thành công")</script>';
                echo '<script>window.location.href = "index.php";</script>';
            }
            break;



        case "dangxuat":
            if (isset($_SESSION["user"])) {
                unset($_SESSION["user"]);
                echo '<script>window.location.href = "index.php";</script>';
            }
            break;

        case "theodoidonhang":
            if (isset($_GET["id_nguoidung"]) > 0) {
                if (isset($_GET['trang'])) {
                    $page = intval($_GET['trang']);
                } else {
                    $page = 1;
                }

                if ($page == "" || $page == 1) {
                    $begin = 0;
                } else {
                    $begin = ($page * 10) - 10;
                }

                $ma_donhang = $_POST['ma_donhang'] ?? "";
                $select_trangthai = $_POST['select_trangthai'] ?? "";

                $id = $_GET["id_nguoidung"];
                $chitiet = loaddonhangAll_user($ma_donhang, $select_trangthai, $id);
            }
            include("./views/main/theodoidonhang.php");
            break;

        case "xemchitietdonhang":
            if (isset($_GET["id_nguoidung"]) > 0) {
                $id = $_GET["ma_donhang"];
                $chitiet = list_chitiet_one_donhang_chitiet($id);
            }
            include("./views/main/xemchitietdonhang.php");
            break;

        case "huydonhang":
            $_SESSION["user"] = $id_nguoidung;

            $id = $_GET["ma_donhang"];
            $id_huy = $_GET["id_huy"];
            $id_trangthai = 5;

            if ($id_huy == 1) {
                huydonhang($id, $id_trangthai);
                echo '<script>alert("Đơn hàng đã hủy thành công ")</script>';
                echo '<script>window.location.href = "index.php?act=theodoidonhang&id_nguoidung=' . $id_nguoidung . '";</script>';
            } else {
                echo '<script>alert("Đơn hàng không thể hủy ")</script>';
                echo '<script>window.location.href = "index.php?act=theodoidonhang&id_nguoidung=' . $id_nguoidung . '";</script>';
            }

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


            // Giỏ hàng
        case "giohang":
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
            include("./views/main/giohang.php");
            break;


        case "themgiohang":
            // Thêm món vào giỏ hàng
            if (isset($_GET["id_monan"]) || $_POST["themgio"]) {
                $id = $_GET["id_monan"];
                $list_monan_cart = list_monan_cart($id);

                $soluongmua = 1;

                if (is_array($list_monan_cart)) {
                    foreach ($list_monan_cart as $food) {
                        $new_food = [
                            "id_monan" => $food['id_monan'],
                            "ten_monan" => $food['ten_monan'],
                            "gia_monan" => $food['gia_monan'],
                            "anh_monan" => $food['anh_monan'],
                            "soluongmua" => $_POST["soluongmua"] ?? $soluongmua,
                        ];
                    }
                }

                // Kiểm tra session tồn tại hay không nếu chưa thì tăng lên
                if (isset($_SESSION['cart'])) {
                    $i = 0;
                    while ($i < count($_SESSION['cart'])) {
                        if ($_SESSION['cart'][$i]['id_monan'] == $id) {
                            $_SESSION['cart'][$i]['soluongmua'] += $soluongmua;
                            break;
                        }
                        $i++;
                    }
                    if ($i == count($_SESSION['cart'])) {
                        array_push($_SESSION['cart'], $new_food);
                    }
                } else {
                    $_SESSION['cart'] = array($new_food);
                }
                echo "<script>alert('Đã thêm thành công');</script>";
                echo '<script>window.location.href = "index.php";</script>';
            }
            break;

        case "themgiohangchitiet":
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


        case "xoamonan":
            if (isset($_SESSION["cart"]) && isset($_GET["id_monan"])) {
                $id_monan = $_GET["id_monan"];
                $updatedCart = [];

                foreach ($_SESSION["cart"] as $item) {
                    if ($item["id_monan"] != $id_monan) {
                        $updatedCart[] = $item;
                    }
                }

                // Cập nhật phiên giỏ hàng với danh sách đã lọc
                $_SESSION["cart"] = $updatedCart;

                // Kiểm tra xem giỏ hàng còn sản phẩm không
                if (count($_SESSION["cart"]) == 0) {
                    include("./views/main/giohang_null.php");
                } else {
                    include("./views/main/giohang.php");
                }
            }
            break;

        case "thanhtoan":
            if (isset($_SESSION["user"])) {
                $id_nguoidung = $_SESSION["user"];
                $list_diachi = list_diachi_id($id_nguoidung);
            }

            if (isset($_POST["thanhtoan"])) {
                foreach ($_POST['soluongmua'] as $key => $soluong) {
                    $_SESSION['cart'][$key]['soluongmua'] = $soluong;
                }
            }

            $err_pay = "";
            if (isset($_POST["redirect"])) {
                if ($select_pay == "0") {
                    $err_pay .= "Bạn chưa chọn phương thức thanh toán.";
                }
            }

            include("./views/main/thanhtoan.php");
            break;

        case "capnhatdiachi":
            if (isset($_GET["id_nguoidung"]) > 0 && isset($_POST["capnhat"])) {
                $id_nguoidung = $_GET["id_nguoidung"];

                $id_diachi = $_POST["id_diachi"];

                $hoten = $_POST["hoten"];
                $diachi = $_POST["diachi"];
                $email = $_POST["email"];
                $sodienthoai = $_POST["sodienthoai"];

                update_diachi_order($hoten, $diachi, $email, $sodienthoai, $id_nguoidung, $id_diachi);
                echo "<script>alert('Đã cập thành công');</script>";
                echo '<script>window.location.href = "index.php?act=thanhtoan";</script>';
            }
            break;

            // case "dathang":
            //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //         $select_pay = $_POST['phuongthucthanhtoan'];

            //         // thanh toán bằng tiền mặt
            //         if ($select_pay == "tienmat") {
            //             date_default_timezone_set('Asia/Ho_Chi_Minh');
            //             $ngaymua = date("Y-m-d H:i:s");
            //             $ma_donhang = rand(0, 9999);
            //             $_SESSION["madonhang"] = $ma_donhang;

            //             if (isset($_SESSION["user"])) {
            //                 $id = $_SESSION["user"];
            //                 $loai_thanhtoan = "Tiền mặt";

            //                 insert_bill($id, $ma_donhang, $ngaymua, $id_trangthai = 1, $loai_thanhtoan);
            //                 foreach ($_SESSION["cart"] as $key => $value) {
            //                     extract($value);
            //                     insert_bill_detail($ma_donhang, $id_monan, $soluongmua);
            //                 }
            //             }

            //             //Gửi mail
            //             submitmail();

            //             unset($_SESSION["cart"]);
            //             unset($_SESSION["madonhang"]);
            //             echo "<script>alert('Đặt hàng thành công');</script>";
            //             include("./views/main/camon.php");

            //             // Thanh tóan bằng vnpay
            //         } else if ($select_pay == "vnp") {
            //             $ma_donhang = rand(0, 9999);
            //             $_SESSION["madonhang"] = $ma_donhang;
            //             $vnp_TxnRef = $ma_donhang; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY

            //             $i = 0;
            //             $tongtien = 0;
            //             foreach ($_SESSION["cart"] as $key => $value) {
            //                 extract($value);
            //                 $thanhtien = $value['soluongmua'] * $value['gia_monan'];
            //                 $tongtien = $tongtien + $thanhtien;
            //                 $i++;
            //             }

            //             $vnp_OrderInfo = "Thanh tóan đơn hàng đặt tại Fusion Food";
            //             $vnp_OrderType = "Billpayment";
            //             $vnp_Amount = $tongtien * 100; //Giá tiền
            //             $vnp_Locale = "VN";
            //             $vnp_BankCode = "NCB";
            //             $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            //             $vnp_ExpireDate = $expire;
            //             $inputData = array(
            //                 "vnp_Version" => "2.1.0",
            //                 "vnp_TmnCode" => $vnp_TmnCode,
            //                 "vnp_Amount" => $vnp_Amount,
            //                 "vnp_Command" => "pay",
            //                 "vnp_CreateDate" => date('YmdHis'),
            //                 "vnp_CurrCode" => "VND",
            //                 "vnp_IpAddr" => $vnp_IpAddr,
            //                 "vnp_Locale" => $vnp_Locale,
            //                 "vnp_OrderInfo" => $vnp_OrderInfo,
            //                 "vnp_OrderType" => $vnp_OrderType,
            //                 "vnp_ReturnUrl" => $vnp_Returnurl,
            //                 "vnp_TxnRef" => $vnp_TxnRef,
            //                 "vnp_ExpireDate" => $vnp_ExpireDate
            //             );

            //             if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            //                 $inputData['vnp_BankCode'] = $vnp_BankCode;
            //             }

            //             // var_dump($inputData);
            //             // die();

            //             ksort($inputData);
            //             $query = "";
            //             $i = 0;
            //             $hashdata = "";
            //             foreach ($inputData as $key => $value) {
            //                 if ($i == 1) {
            //                     $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            //                 } else {
            //                     $hashdata .= urlencode($key) . "=" . urlencode($value);
            //                     $i = 1;
            //                 }
            //                 $query .= urlencode($key) . "=" . urlencode($value) . '&';
            //             }

            //             $vnp_Url = $vnp_Url . "?" . $query;
            //             if (isset($vnp_HashSecret)) {
            //                 $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            //                 $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            //             }
            //             $returnData = array(
            //                 'code' => '00',
            //                 'message' => 'success',
            //                 'data' => $vnp_Url
            //             );

            //             if (isset($_POST['redirect'])) {
            //                 echo '<script>window.location.href = "' . $vnp_Url . '";</script>';
            //                 die();
            //             } else {
            //                 echo json_encode($returnData);
            //             }


            //             // MomoATM
            //         } else if ($select_pay == "momo") {
            //             header('Content-type: text/html; charset=utf-8');
            //             function execPostRequest($url, $data)
            //             {
            //                 $ch = curl_init($url);
            //                 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            //                 curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            //                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //                 curl_setopt(
            //                     $ch,
            //                     CURLOPT_HTTPHEADER,
            //                     array(
            //                         'Content-Type: application/json',
            //                         'Content-Length: ' . strlen($data)
            //                     )
            //                 );
            //                 curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            //                 curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            //                 //execute post
            //                 $result = curl_exec($ch);
            //                 //close connection
            //                 curl_close($ch);
            //                 return $result;
            //             }


            //             $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


            //             $partnerCode = 'MOMOBKUN20180529';
            //             $accessKey = 'klm05TvNBzhg7h7j';
            //             $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

            //             $orderInfo = "Thanh toán qua MoMo";
            //             $amount = $_POST["tongtien"];
            //             $orderId = $_POST["ma_donhang"];
            //             // $orderId = time() . "";
            //             $redirectUrl = "http://localhost/fusionfood/index.php?act=camon-momo";
            //             $ipnUrl = "http://localhost/fusionfood/index.php?act=camon-momo";
            //             $extraData = "";

            //             $requestId = time() . "";
            //             $requestType = "payWithATM";
            //             $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");

            //             //before sign HMAC SHA256 signature
            //             $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            //             $signature = hash_hmac("sha256", $rawHash, $secretKey);
            //             $data = array(
            //                 'partnerCode' => $partnerCode,
            //                 'partnerName' => "Test",
            //                 "storeId" => "MomoTestStore",
            //                 'requestId' => $requestId,
            //                 'amount' => $amount,
            //                 'orderId' => $orderId,
            //                 'orderInfo' => $orderInfo,
            //                 'redirectUrl' => $redirectUrl,
            //                 'ipnUrl' => $ipnUrl,
            //                 'lang' => 'vi',
            //                 'extraData' => $extraData,
            //                 'requestType' => $requestType,
            //                 'signature' => $signature
            //             );
            //             $result = execPostRequest($endpoint, json_encode($data));
            //             $jsonResult = json_decode($result, true);  // decode json

            //             //Just a example, please check more in there

            //             header('Location: ' . $jsonResult['payUrl']);
            //         }
            //     }
            //     break;

        case "dathang":
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $select_pay = $_POST['phuongthucthanhtoan'];

                // Thanh toán bằng tiền mặt
                if ($select_pay == "tienmat") {
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngaymua = date("Y-m-d H:i:s");
                    $ma_donhang = rand(0, 9999);
                    $_SESSION["madonhang"] = $ma_donhang;

                    if (isset($_SESSION["user"])) {
                        $id = $_SESSION["user"];
                        $loai_thanhtoan = "Tiền mặt";

                        try {
                            insert_bill($id, $ma_donhang, $ngaymua, $loai_thanhtoan);
                            foreach ($_SESSION["cart"] as $key => $value) {
                                extract($value);
                                insert_bill_detail($ma_donhang, $id_monan, $soluongmua);
                            }

                            // Hiển thị chi tiết hóa đơn đã chèn
                            $pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $pdo->prepare("SELECT * FROM tbl_hoadon WHERE ma_donhang = ?");
                            $stmt->execute([$ma_donhang]);
                            $data = $stmt->fetch(PDO::FETCH_ASSOC);

                            echo "<pre>Inserted Data: " . print_r($data, true) . "</pre>";
                        } catch (Exception $e) {
                            echo "Error: " . $e->getMessage();
                        }
                    }

                    // Gửi mail
                    submitmail();

                    unset($_SESSION["cart"]);
                    unset($_SESSION["madonhang"]);
                    echo "<script>alert('Đặt hàng thành công');</script>";
                    include("./views/main/camon.php");

                    // Thanh toán bằng vnpay
                } else if ($select_pay == "vnp") {
                    $ma_donhang = rand(0, 9999);
                    $_SESSION["madonhang"] = $ma_donhang;
                    $vnp_TxnRef = $ma_donhang;

                    $tongtien = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        extract($value);
                        $thanhtien = $value['soluongmua'] * $value['gia_monan'];
                        $tongtien += $thanhtien;
                    }

                    $vnp_OrderInfo = "Thanh toán đơn hàng đặt tại Fusion Food";
                    $vnp_OrderType = "Billpayment";
                    $vnp_Amount = $tongtien * 100;
                    $vnp_Locale = "VN";
                    $vnp_BankCode = "NCB";
                    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                    $vnp_ExpireDate = $expire;
                    $inputData = array(
                        "vnp_Version" => "2.1.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $vnp_Amount,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => $vnp_Locale,
                        "vnp_OrderInfo" => $vnp_OrderInfo,
                        "vnp_OrderType" => $vnp_OrderType,
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef,
                        "vnp_ExpireDate" => $vnp_ExpireDate
                    );

                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
                    }

                    ksort($inputData);
                    $query = "";
                    $hashdata = "";
                    $i = 0;
                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                        } else {
                            $hashdata .= urlencode($key) . "=" . urlencode($value);
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }

                    $vnp_Url = $vnp_Url . "?" . $query;
                    if (isset($vnp_HashSecret)) {
                        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                    }
                    $returnData = array(
                        'code' => '00',
                        'message' => 'success',
                        'data' => $vnp_Url
                    );

                    if (isset($_POST['redirect'])) {
                        echo '<script>window.location.href = "' . $vnp_Url . '";</script>';
                        die();
                    } else {
                        echo json_encode($returnData);
                    }

                    // Thanh toán bằng MomoATM
                } else if ($select_pay == "momo") {
                    header('Content-type: text/html; charset=utf-8');

                    function execPostRequest($url, $data)
                    {
                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt(
                            $ch,
                            CURLOPT_HTTPHEADER,
                            array(
                                'Content-Type: application/json',
                                'Content-Length: ' . strlen($data)
                            )
                        );
                        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                        $result = curl_exec($ch);
                        curl_close($ch);
                        return $result;
                    }

                    $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

                    $partnerCode = 'MOMOBKUN20180529';
                    $accessKey = 'klm05TvNBzhg7h7j';
                    $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

                    $orderInfo = "Thanh toán qua MoMo";
                    $amount = $_POST["tongtien"];
                    $orderId = $_POST["ma_donhang"];
                    $redirectUrl = "http://localhost/fusionfood/index.php?act=camon-momo";
                    $ipnUrl = "http://localhost/fusionfood/index.php?act=camon-momo";
                    $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");

                    $requestId = time() . "";
                    $requestType = "payWithATM";
                    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                    $signature = hash_hmac("sha256", $rawHash, $secretKey);
                    $data = array(
                        'partnerCode' => $partnerCode,
                        'partnerName' => "Test",
                        "storeId" => "MomoTestStore",
                        'requestId' => $requestId,
                        'amount' => $amount,
                        'orderId' => $orderId,
                        'orderInfo' => $orderInfo,
                        'redirectUrl' => $redirectUrl,
                        'ipnUrl' => $ipnUrl,
                        'lang' => 'vi',
                        'extraData' => $extraData,
                        'requestType' => $requestType,
                        'signature' => $signature
                    );
                    $result = execPostRequest($endpoint, json_encode($data));
                    $jsonResult = json_decode($result, true);

                    header('Location: ' . $jsonResult['payUrl']);
                }
            }
            break;


        case "camon":
            if (isset($_GET["vnp_Amount"]) && $_GET['vnp_ResponseCode'] == '00') {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $ngaymua = date("Y-m-d H:i:s");

                if (isset($_SESSION["user"])) {
                    $id = $_SESSION["user"];
                    $ma_donhang = $_SESSION["madonhang"];
                    $loai_thanhtoan = "Vnpay";

                    insert_bill($id, $ma_donhang, $ngaymua, $id_trangthai = 1, $loai_thanhtoan);
                    foreach ($_SESSION["cart"] as $key => $value) {
                        extract($value);
                        insert_bill_detail($ma_donhang, $id_monan, $soluongmua);
                    }
                }

                $vnp_BankCode = $_GET["vnp_BankCode"];
                $vnp_BankTranNo = $_GET["vnp_BankTranNo"];
                $vnp_CardType = $_GET["vnp_CardType"];
                $vnp_OrderInfo = $_GET["vnp_OrderInfo"];
                $vnp_PayDate = $_GET["vnp_PayDate"];
                $vnp_TmnCode = $_GET["vnp_TmnCode"];
                $vnp_TransactionNo = $_GET["vnp_TransactionNo"];
                $ma_donhang = $_SESSION["madonhang"];

                $i = 0;
                $tongtien = 0;
                foreach ($_SESSION["cart"] as $key => $value) {
                    extract($value);
                    $thanhtien = $value['soluongmua'] * $value['gia_monan'];
                    $tongtien = $tongtien + $thanhtien;
                    $i++;
                }

                insert_vnpay($tongtien, $ma_donhang, $vnp_BankCode, $vnp_BankTranNo, $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_TmnCode, $vnp_TransactionNo);

                //Gửi mail
                submitmail();

                unset($_SESSION["cart"]);
                unset($_SESSION["madonhang"]);
                include("./views/main/camon.php");
            } else {
                echo "<script>alert('Đã hủy thanh toán');</script>";
                echo '<script>window.location.href = "index.php?act=thanhtoan";</script>';
            }
            break;

        case "camon-momo":
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $ngaymua = date("Y-m-d H:i:s");

            if (isset($_SESSION["user"])) {
                $id = $_SESSION["user"];
                $ma_donhang = $_SESSION["madonhang"];
                $loai_thanhtoan = "MomoATM";

                insert_bill($id, $ma_donhang, $ngaymua, $id_trangthai = 1, $loai_thanhtoan);
                foreach ($_SESSION["cart"] as $key => $value) {
                    extract($value);
                    insert_bill_detail($ma_donhang, $id_monan, $soluongmua);
                }
            }

            //Gửi mail
            submitmail();

            unset($_SESSION["cart"]);
            unset($_SESSION["madonhang"]);

            include("./views/main/camon_momo.php");
            break;

        case "lienhechungtoi":
            $ho_ten = $email = $sodienthoai = $noidung = "";
            $err_ho_ten = $err_email = $err_sodienthoai = $err_noidung = "";

            if (isset($_POST['submit']) && $_POST['submit']) {

                $ho_ten = $_POST['ho_ten'];
                $email = $_POST['email'];
                $sodienthoai = $_POST['sodienthoai'];
                $noidung = $_POST['noidung'];
                $trangthai = 0;

                $check = 0;
                if (empty(trim($ho_ten))) {
                    $err_ho_ten = "Bạn chưa nhập trường này";
                    $check++;
                }
                if (empty(trim($email))) {
                    $err_email = "Bạn chưa nhập trường này";
                    $check++;
                } elseif (!preg_match("/^[^\s@]+@[^\s@]+\.[^\s@]+$/", $email)) {
                    $check++;
                    $err_email = "Bạn phải nhập đúng định dạng email";
                }

                if (empty(trim($sodienthoai))) {
                    $err_sodienthoai = "Bạn chưa nhập trường này";
                    $check++;
                } elseif (!preg_match("/^0\d{9}$/", $sodienthoai)) {
                    $check++;
                    $err_sodienthoai = "Bạn phải nhập đúng định dạng số điện thoại";
                }

                if (empty(trim($noidung))) {
                    $err_noidung = "Bạn chưa nhập trường này";
                    $check++;
                }

                if ($check == 0) {
                    insert_lienhe($ho_ten, $email, $sodienthoai, $noidung, $trangthai);
                    echo "<script>alert('Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất');</script>";
                }
            }
            include("./views/main/lienhe.php");
            break;

        case "vechungtoi":
            include("./views/trang/vechungtoi.php");
            break;

        case "cauhoithuonggap":
            include("./views/trang/cauhoithuonggap.php");
            break;

        case "team":
            include("./views/trang/team.php");
            break;

        case "teamchitiet":
            include("./views/trang/teamchitiet.php");
            break;

        case "danhgia":
            include("./views/trang/danhgia.php");
            break;

        case "dichvu":
            include("./views/trang/dichvu.php");
            break;

        case "dichvuchitiet":
            include("./views/trang/dichvuchitiet.php");
            break;

        case "trang loi":
            include("./views/trang/trangloi.php");
            break;

        case "sapramat":
            include("./views/trang/sapramat.php");
            break;

        case "dangbaotri":
            include("./views/trang/dangbaotri.php");
            break;

        case "lienhe":
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
