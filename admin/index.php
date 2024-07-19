<?php
session_start();
if (!$_SESSION["dangnhap_admin"]) {
    header("location: ./login/login.php");
}

include("../model/pdo.php");
include("../model/danhmuc.php");
include("../model/moan.php");
include("../model/dmtintuc.php");
include("../model/tintuc.php");
include("../model/trangthaidonhang.php");
include("../model/dangnhap.php");
include("../model/thongke.php");
include("../model/binhluan.php");
include("../model/lienhe.php");


include("../model/carbon_date/autoload.php");

use Carbon\Carbon;
// printf("Now: %s", Carbon::now("Asia/Ho_Chi_Minh"));



include("./header.php");

// Thống kê
$thong_ke_hoadon = thong_ke_hoadon();
$doanh_thu_hoadon = doanh_thu_hoadon();
$don_thanh_cong = don_thanh_cong();
$don_huy = don_huy();

// $thongke_all = thongke_all();



if (isset($_GET['act']) && $_GET['act'] != '') {
    $act = $_GET['act'];

    switch ($act) {
            // Quản lý danh mục
        case 'themdanhmuc':
            $tendanhmuc = $err_tendanhmuc = "";
            if (isset($_POST['themmoi'])) {
                $tendanhmuc = $_POST['tendanhmuc'];
                $check = 0;
                if (empty(trim($tendanhmuc))) {
                    $check++;
                    $err_tendanhmuc = "Bạn chưa nhập trường này";
                }

                if ($check == 0) {
                    themdanhmuc($tendanhmuc);
                    echo '<script>alert("Thêm thành công")</script>';
                    echo '<script>window.location.href = "index.php?act=lietkedanhmuc";</script>';
                }
            }
            include('./danhmuc/them.php');
            break;

        case 'lietkedanhmuc':
            $listdanhmuc = loaddanhmucAll();
            include('./danhmuc/lietke.php');
            break;
        case 'xoadm':
            $iddm = $_GET['iddm'];
            xoadanhmuc($iddm);
            $listdanhmuc = loaddanhmucAll();
            include('./danhmuc/lietke.php');
            break;

        case 'suadm':
            if (isset($_GET["iddm"]) && $_GET["iddm"] > 0) {
                $iddm = $_GET['iddm'];
                $listdanhmucone = loaddanhmucone($iddm);
            }
            include('./danhmuc/sua.php');
            break;

        case 'capnhatdm':
            $tendanhmuc = $err_tendanhmuc = "";
            if (isset($_POST["capnhat"])) {
                $id = $_POST["id"];
                $tendanhmuc = $_POST["tendanhmuc"];
                $check = 0;;

                if (empty(trim($tendanhmuc))) {
                    $check++;
                    $err_tendanhmuc = "Bạn chưa nhập trường này";
                }

                if ($check == 0) {
                    capnhatdanhmuc($id, $tendanhmuc);
                    echo '<script>alert("Cập nhật thành công")</script>';
                    echo '<script>window.location.href = "index.php?act=lietkedanhmuc";</script>';
                }
            }
            include('./danhmuc/sua.php');
            break;

            // Món ăn
        case 'themmonan':
            $anh_monan = $gia_monan = $mota_monan = $ten_monan = "";
            $err_anhmoan = $err_giamonan = $err_motamonan = $err_tenmonan = "";
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $ten_monan = $_POST['ten_monan'];
                $gia_monan = $_POST['gia_monan'];
                $id_danhmuc = $_POST['id_danhmuc'];
                $mota_monan = $_POST['mota_monan'];
                $noibat = $_POST['noibat'];
                $check = 0;
                if (empty(trim($ten_monan))) {
                    $check++;
                    $err_tenmonan = "Bạn chưa nhập trường này";
                }
                if (empty(trim($gia_monan))) {
                    $check++;
                    $err_giamonan = "Bạn chưa nhập trường này";
                } elseif (!preg_match("/^[0-9]+$/", $gia_monan)) {
                    $check++;
                    $err_giamonan = "Bạn phải nhập số";
                }

                if (empty(trim($mota_monan))) {
                    $check++;
                    $err_motamonan = "Bạn chưa nhập trường này";
                }

                $anh_monan = $_FILES['anh_monan']['name'];
                $anh_monan_tmp = $_FILES['anh_monan']['tmp_name'];
                $upload_dir = "../uploads/monan/";

                $new_anhmonan = time() . "_" . $anh_monan . '.' . pathinfo($anh_monan, PATHINFO_EXTENSION);

                $target_file = $upload_dir . $new_anhmonan;

                $allowed_extensions = array("jpg", "jpeg", "png", "gif");
                $file_extension = strtolower(pathinfo($anh_monan, PATHINFO_EXTENSION));

                if (empty($anh_monan)) {
                    $check++;
                    $err_anhmoan = "Bạn chưa chọn ảnh";
                } else if (!in_array($file_extension, $allowed_extensions)) {
                    $err_anhmoan = "Phải là ảnh có đuôi jpg, jpeg, png, gif";
                    $check++;
                } else if (!move_uploaded_file($anh_monan_tmp, $target_file)) {
                    $err_anhmoan = "Lỗi khi tải lên ảnh";
                    $check++;
                }


                if ($check == 0) {
                    insert_monan($ten_monan, $gia_monan, $new_anhmonan, $id_danhmuc, $mota_monan, $noibat);
                    echo '<script>alert("Thêm thành công")</script>';
                    echo '<script>window.location.href = "index.php?act=lietkemonan";</script>';
                }
            }

            $listdanhmuc = loaddanhmucAll();

            include('./monan/them.php');
            break;

        case 'xoamonan':
            if (isset($_GET['id_monan']) && $_GET['id_monan'] > 0) {
                $id_monan = $_GET['id_monan'];
                $list_monan_one = list_monan_One($id_monan);
                extract($list_monan_one);
                $linkanh = '../uploads/monan/' . $anh_monan;
                if (is_file($linkanh)) {
                    unlink($linkanh);
                }
                delete_monan($id_monan);
            }

            $listmonan = list_monan_All();
            include('./monan/lietke.php');
            break;

        case 'lietkemonan':
            $listmonan = list_monan_All();
            include('./monan/lietke.php');
            break;

        case 'suamonan':
            if (isset($_GET['id_monan']) && $_GET['id_monan'] > 0) {
                $id_monan = $_GET['id_monan'];
                $list_monan_one = list_monan_One($id_monan);
            }
            $listdanhmuc = loaddanhmucAll();
            include('./monan/sua.php');
            break;


        case 'capnhatmonan':
            $anh_monan = $gia_monan = $mota_monan = $ten_monan = "";
            $err_anhmoan = $err_giamonan = $err_motamonan = $err_tenmonan = "";
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $id_sua = $_POST['id_sua'];
                $ten_monan = $_POST['ten_monan'];
                $gia_monan = $_POST['gia_monan'];
                $id_danhmuc = $_POST['id_danhmuc'];
                $mota_monan = $_POST['mota_monan'];
                $noibat = $_POST['noibat'];
                $check = 0;

                if (empty(trim($ten_monan))) {
                    $check++;
                    $err_tenmonan = "Bạn chưa nhập trường này";
                }
                if (empty(trim($gia_monan))) {
                    $check++;
                    $err_giamonan = "Bạn chưa nhập trường này";
                } elseif (!preg_match("/^[0-9]+$/", $gia_monan)) {
                    $check++;
                    $err_giamonan = "Bạn phải nhập số";
                }

                if (empty(trim($mota_monan))) {
                    $check++;
                    $err_motamonan = "Bạn chưa nhập trường này";
                }
                $new_anhmonan = "";
                $anh_monan = $_FILES['anh_monan']['name'];
                $anh_monan_tmp = $_FILES['anh_monan']['tmp_name'];
                $upload_dir = "../uploads/monan/";
                $allowed_extensions = array("jpg", "jpeg", "png", "gif");

                if (!empty($anh_monan)) {
                    $file_extension = strtolower(pathinfo($anh_monan, PATHINFO_EXTENSION));

                    if (!in_array($file_extension, $allowed_extensions)) {
                        $err_anhmoan = "Phải là ảnh có đuôi jpg, jpeg, png, gif";
                        $check++;
                    } else {
                        $new_anhmonan = time() . "_" . $anh_monan . '.' . $file_extension;
                        $target_file = $upload_dir . $new_anhmonan;

                        if (!move_uploaded_file($anh_monan_tmp, $target_file)) {
                            echo "Lỗi khi tải lên ảnh mới";
                        }
                    }
                } elseif (!empty($anh_monan) && isset($_POST['capnhat']) && $_POST['capnhat']) {
                    $check++;
                    $err_anhmoan = "Bạn chưa chọn ảnh";
                }

                if ($check == 0) {
                    $list_monan_one = list_monan_One($id_sua);
                    if ($anh_monan != "") {
                        $linkanh = '../uploads/monan/' . $list_monan_one['anh_monan'];
                        if (is_file($linkanh)) {
                            unlink($linkanh);
                        }
                        if (move_uploaded_file($anh_monan_tmp, $target_file)) {
                        } else {
                            echo "Lỗi khi tải lên ảnh mới";
                        }
                    }
                    capnhat_monan($id_sua, $ten_monan, $gia_monan, $id_danhmuc, $mota_monan, $new_anhmonan, $noibat);
                    echo '<script>alert("Cập nhật thành công")</script>';
                    echo '<script>window.location.href = "index.php?act=lietkemonan";</script>';
                }
            }
            $listdanhmuc = loaddanhmucAll();
            $listmonan = list_monan_All();
            include('./monan/sua.php');

            // include('./monan/lietke.php');
            break;
       
            //danh muc tintuc
        case 'themdmtintuc':
            if (isset($_POST['themmoi'])) {
                $ten_danhmuc_tintuc = $_POST['ten_danhmuc_tintuc'];
                $phuluc_danhmuc_tintuc = $_POST['phuluc_danhmuc_tintuc'];
                themdmtintuc($ten_danhmuc_tintuc, $phuluc_danhmuc_tintuc);
                $thongbao = "Thêm thành công";
            }
            include('./tintuc/danhmuc/them.php');
            break;

        case 'lietkedmtintuc':
            $listdmtintuc = loaddmtintucAll();
            include('./tintuc/danhmuc/lietke.php');
            break;

        case 'xoadmtintuc':
            $iddmtintuc = $_GET['id_danhmuc_tintuc'];
            xoadmtintuc($iddmtintuc);
            $listdmtintuc = loaddmtintucAll();
            include('./tintuc/danhmuc/lietke.php');
            break;

        case 'suadmtintuc':
            if (isset($_GET["id_danhmuc_tintuc"]) && $_GET["id_danhmuc_tintuc"] > 0) {
                $id_danhmuc_tintuc = $_GET['id_danhmuc_tintuc'];
                $listdmtintucone = loaddmtintucone($id_danhmuc_tintuc);
            }
            include('./tintuc/danhmuc/sua.php');
            break;

        case 'capnhatdmtintuc':
            if (isset($_POST["capnhat"])) {
                $id_danhmuc_tintuc = $_POST["id_danhmuc_tintuc"];
                $ten_danhmuc_tintuc = $_POST["ten_danhmuc_tintuc"];
                $phuluc_danhmuc_tintuc = $_POST["phuluc_danhmuc_tintuc"];
                capnhatdmtintuc($id_danhmuc_tintuc, $ten_danhmuc_tintuc, $phuluc_danhmuc_tintuc);
                $thongbao = "Thêm thành công";
            }
            $listdmtintuc = loaddmtintucAll();
            include('./tintuc/danhmuc/lietke.php');
            break;


            //tintuc
        case 'themtintuc':
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $ten_tintuc = $_POST['ten_tintuc'];
                $mota_tintuc = $_POST['mota_tintuc'];
                $motangan = $_POST['motangan'];
                $id_danhmuc_tintuc = $_POST['id_danhmuc_tintuc'];

                $anh_tintuc = $_FILES['anh_tintuc']['name'];
                $anh_tintuc_tmp = $_FILES['anh_tintuc']['tmp_name'];
                $upload = "../uploads/monan/";

                $new_anhtintuc = time() . "_" . basename($anh_tintuc);
                $target_file = $upload . $new_anhtintuc;

                if (move_uploaded_file($anh_tintuc_tmp, $target_file)) {
                    echo "Thêm ảnh thành công";
                } else {
                    echo "Lỗi";
                }

                insert_tintuc($ten_tintuc, $motangan, $mota_tintuc, $new_anhtintuc, $id_danhmuc_tintuc);
                $thongbao = "Thêm thành công";
            }

            $listdmtintuc = loaddmtintucAll();

            include('./tintuc/tintuc/them.php');
            break;

        case 'quanlydonhang':
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

            $loaddonhangAll_page = loaddonhangAll_page($begin);
            $loaddonhang = loaddonhangAll();

            include('./trangthaidonhang/hienthi.php');
            break;

        case 'suatrangthai':
            include("../model/connect_pdo.php");
            $trangthai = loadtrangthaiAll();
            $id = $_GET['iddh'];
            $list_sua_tt_dh = list_sua_tt_dh($id);

            if (isset($_POST['capnhatdonhang']) && $_POST['capnhatdonhang'] > 0) {
                $id_trangthai = $_POST['id_trangthai'];

                capnhattrangthai($id, $id_trangthai);

                // Khi thành công update vào biểu đồ to đổ ra
                if ($id_trangthai == 4) {
                    $ngaydat = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
                    $sql_lietke_dh = "SELECT * FROM tbl_hoadon_chitiet 
                    INNER JOIN tbl_monan ON tbl_hoadon_chitiet.id_monan = tbl_monan.id_monan 
                    INNER JOIN tbl_hoadon ON tbl_hoadon.ma_donhang = tbl_hoadon_chitiet.ma_donhang 
                    WHERE tbl_hoadon.ma_donhang = ?";

                    $stmt_lietke_dh = $conn->prepare($sql_lietke_dh);
                    $stmt_lietke_dh->execute([$id]);

                    $soluongmua = 0;
                    $doanhthu = 0;

                    while ($row = $stmt_lietke_dh->fetch(PDO::FETCH_ASSOC)) {
                        $soluongmua += $row['soluongmua'];
                        $doanhthu += $row['gia_monan'] * $row['soluongmua'];
                    }

                    $sql_thongke = "SELECT * FROM tbl_thongke WHERE ngaydat=?";
                    $stmt_thongke = $conn->prepare($sql_thongke);
                    $stmt_thongke->execute([$ngaydat]);

                    if ($stmt_thongke->rowCount() == 0) {
                        $soluongban = $soluongmua;
                        $donhang = 1;

                        $sql_update_thongke = "INSERT INTO tbl_thongke (ngaydat, soluongban, doanhthu, donhang) VALUES (?, ?, ?, ?)";
                        $stmt_update_thongke = $conn->prepare($sql_update_thongke);
                        $stmt_update_thongke->execute([$ngaydat, $soluongban, $doanhthu, $donhang]);
                    } else {
                        $row_tk = $stmt_thongke->fetch(PDO::FETCH_ASSOC);
                        $soluongban = $row_tk['soluongban'] + $soluongmua;
                        $doanhthu += $row_tk['doanhthu'];
                        $donhang = $row_tk['donhang'] + 1;

                        $sql_update_thongke = "UPDATE tbl_thongke SET soluongban=?, doanhthu=?, donhang=? WHERE ngaydat=?";
                        $stmt_update_thongke = $conn->prepare($sql_update_thongke);
                        $stmt_update_thongke->execute([$soluongban, $doanhthu, $donhang, $ngaydat]);
                    }
                }

                echo '<script>window.location.href = "index.php?act=quanlydonhang";</script>';
            }
            $loaddonhang = loaddonhangAll();

            include('./trangthaidonhang/suatrangthai.php');
            break;
            
        case 'giaothanhcong':
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

            $loaddonhangtk_page = loaddonhangtk_page($begin);
            $loaddonhangtk = loaddonhangtk();

            include('./trangthaidonhang/giaothanhcong.php');
            break;

        case 'dahuy':
            $loaddonhanghuy = loaddonhanghuy();
            include('./trangthaidonhang/huydon.php');
            break;

        case 'chitietdonhang':
            $id = $_GET['iddh'];
            $chitiet = list_chitiet_One($id);
            include('./trangthaidonhang/chitietdonhang.php');
            break;

        case 'xoatintuc':
            if (isset($_GET['id_tintuc']) && $_GET['id_tintuc'] > 0) {
                $id_tintuc = $_GET['id_tintuc'];
                $list_tintuc_one = list_tintuc_One($id_tintuc);
                extract($list_tintuc_one);
                $linkanh = '../uploads/monan/' . $anh_tintuc;
                unlink($linkanh);
                delete_tintuc($id_tintuc);
            }

            $listtintuc = list_tintuc_All();
            include('./tintuc/tintuc/lietke.php');
            break;

        case 'lietketintuc':
            $listtintuc = list_tintuc_All();
            include('./tintuc/tintuc/lietke.php');
            break;

        case 'suatintuc':
            if (isset($_GET['id_tintuc']) && $_GET['id_tintuc'] > 0) {
                $id_tintuc = $_GET['id_tintuc'];
                $list_tintuc_one = list_tintuc_One($id_tintuc);
            }
            $listdmtintuc = loaddmtintucAll();
            include('./tintuc/tintuc/sua.php');
            break;

        case 'capnhattintuc':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $id_sua = $_POST['id_sua'];
                $ten_tintuc = $_POST['ten_tintuc'];
                $motangan = $_POST['motangan'];
                $id_danhmuc_tintuc = $_POST['id_danhmuc_tintuc'];
                $anh_tintuc = $_FILES['anh_tintuc']['name'];
                $anh_tintuc_tmp = $_FILES['anh_tintuc']['tmp_name'];
                $upload = "../uploads/tintuc/";

                $list_tintuc_one = list_tintuc_One($id_sua);

                $mota_tintuc = $_POST['mota_tintuc'];

                if (!empty($anh_tintuc)) {
                    $linkanh = '../uploads/tintuc/' . $list_tintuc_one['anh_tintuc'];
                    if (file_exists($linkanh)) {
                        unlink($linkanh);
                    }

                    $new_anhtintuc = time() . "_" . basename($anh_tintuc);

                    $target_file = $upload . $new_anhtintuc;
                    if (move_uploaded_file($anh_tintuc_tmp, $target_file)) {
                        echo "Thêm ảnh thành công";
                    } else {
                        echo "Lỗi khi tải lên ảnh mới";
                        $new_anhtintuc = $list_tintuc_one['anh_tintuc'];
                    }
                } else {
                    $new_anhtintuc = $list_tintuc_one['anh_tintuc'];
                }
                capnhat_tintuc($id_sua, $ten_tintuc, $motangan, $mota_tintuc, $id_danhmuc_tintuc, $new_anhtintuc);
            }

            $listtintuc = list_tintuc_All();

            include('./tintuc/tintuc/lietke.php');
            break;

            // Người dùng
        case 'thongkenguoidung':
            $list_users = list_users();

            include("./nguoidung/lietke.php");
            break;

        case 'suanguoidung':
            if (isset($_GET["id_nguoidung"]) > 0) {
                $id_nguoidung = $_GET["id_nguoidung"];
                $user = list_check_tk_id($id_nguoidung);
            }
            include("./nguoidung/capnhat.php");
            break;

        case "capnhattaikhoan":
            if (isset($_POST["capnhat"])) {
                $id_nguoidung = $_POST["id_sua"];
                $hoten = $_POST["hoten"];
                $sodienthoai = $_POST["sodienthoai"];
                $email = $_POST["email"];
                $diachi = $_POST["diachi"];
                $matkhau = $_POST["pass"];
                $vaitro = $_POST["vaitro"];

                $anh_taikhoan = $_FILES["anh_taikhoan"]["name"];
                $anh_taikhoan_tmp = $_FILES['anh_taikhoan']['tmp_name'];
                $upload = "../uploads/avatar/";

                $user = list_check_tk_id($id_nguoidung);
                $new_anhtk = "";
                if ($anh_taikhoan != "") {
                    $linkanh = '../uploads/avatar/' . $user['anh_taikhoan'];

                    if (file_exists($linkanh)) {
                        unlink($linkanh);
                    }

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

                echo '<script>alert("Thành công")</script>';
            }

            $list_users = list_users();
            include("./nguoidung/lietke.php");
            break;


        case 'xoanguoidung':
            if (isset($_GET['id_nguoidung']) && $_GET['id_nguoidung'] > 0) {
                $id_nguoidung = $_GET['id_nguoidung'];
                $user = list_check_tk_id($id_nguoidung);
                extract($user);
                $linkanh = '../uploads/avatar/' . $anh_taikhoan;
                if (file_exists($linkanh)) {
                    unlink($linkanh);
                }
                delete_user($id_nguoidung);
                echo '<script>alert("Thành công")</script>';
            }

            $list_users = list_users();
            include("./nguoidung/lietke.php");
            break;

        case 'lietkebinhluan':
            $list_all_cmt = list_all_cmt();
            include("./binhluan/lietke.php");
            break;

        case 'chitietbinhluan':
            if (isset($_GET["idnd"]) && $_GET["idnd"] > 0) {
                $id_nguoidung = $_GET["idnd"];

                if (isset($_GET['trang'])) {
                    $page = intval($_GET['trang']);
                } else {
                    $page = 1;
                }

                if ($page == "" || $page == 1) {
                    $begin = 0;
                } else {
                    $begin = ($page * 5) - 5;
                }

                $list_id_cmt = list_id_cmt_page($id_nguoidung, $begin);
                $list_id_cmt_all = list_id_cmt($id_nguoidung);
            }
            include("./binhluan/chitietbinhluan.php");
            break;


        case 'suabinhluan':
            if (isset($_GET["idbl"]) && $_GET["idbl"] > 0) {
                $id_binhluan = $_GET["idbl"];
                $id_nguoidung = $_GET["idnd"];

                $list_id_cmt_detail = list_id_cmt_detail($id_binhluan);
                $list_id_cmt = list_id_cmt($id_nguoidung);
            }
            include("./binhluan/sua.php");
            break;

        case 'capnhatbinhluan':
            if (isset($_POST["capnhat"])) {
                $id = $_POST["id"];
                $noidung = $_POST["noidung"];
                $trang = $_GET["trang"];
                capnhatbinhluan($id, $noidung);

                $id_nguoidung = $_GET["id"];
                $list_id_cmt = list_id_cmt($id_nguoidung);

                echo '<script>alert("Cập nhật thành công")</script>';
                echo '<script>window.location.href="index.php?act=chitietbinhluan&idnd=' . $id_nguoidung . '&trang=' . $trang . '"</script>';
            }
            break;

        case 'xoabinhluan':
            if (isset($_GET["idbl"]) && $_GET["idbl"] > 0) {
                $id_binhluan = $_GET["idbl"];
                $delete_id_cmt_detail = delete_id_cmt_detail($id_binhluan);

                $trang = $_GET["trang"];
                $id_nguoidung = $_GET["idnd"];
                $list_id_cmt = list_id_cmt($id_nguoidung);
                echo '<script>alert("Cập nhật thành công")</script>';
                echo '<script>window.location.href="index.php?act=chitietbinhluan&idnd=' . $id_nguoidung . '&trang=' . $trang . '"</script>';
            }
            break;

        case 'lienhe':
            $list_contact = list_contact();
            include("./lienhe/lietke.php");
            break;

        case 'capnhatlienhe':
            if (isset($_GET["id"]) && $_GET["id"] > 0) {
                $id = $_GET["id"];
                $trangthai = 1;
                update_contact($trangthai, $id);
            }


            $list_contact = list_contact();
            include("./lienhe/lietke.php");
            break;
    }
} else {
    $thongke_doanhthu_theo_danhmuc = thongke_doanhthu_theo_danhmuc();

    $thongke_binhluan = thongke_binhluan();
    include("main.php");
}


include("./footer.php");
