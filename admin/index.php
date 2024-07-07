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

include("../model/carbon_date/autoload.php");

use Carbon\Carbon;
// printf("Now: %s", Carbon::now("Asia/Ho_Chi_Minh"));

include("./header.php");

if (isset($_GET['act']) && $_GET['act'] != '') {
    $act = $_GET['act'];

    switch ($act) {
            // Quản lý danh mục
        case 'themdanhmuc':
            $tendanhmuc     = $err_tendanhmuc = "";
            if (isset($_POST['themmoi'])) {
                $tendanhmuc = $_POST['tendanhmuc'];
                $check      = 0;
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
            $anh_monan      = $gia_monan    = $mota_monan       = $ten_monan = "";
            $err_anhmoan    = $err_giamonan = $err_motamonan    = $err_tenmonan = "";
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $ten_monan  = $_POST['ten_monan'];
                $gia_monan  = $_POST['gia_monan'];
                $id_danhmuc = $_POST['id_danhmuc'];
                $mota_monan = $_POST['mota_monan'];
                $noibat     = $_POST['noibat'];
                $check      = 0;

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

                $anh_monan      = $_FILES['anh_monan']['name'];
                $anh_monan_tmp  = $_FILES['anh_monan']['tmp_name'];
                $upload_dir     = "../uploads/monan/";

                $new_anhmonan   = time() . "_" . $anh_monan . '.' . pathinfo($anh_monan, PATHINFO_EXTENSION);

                $target_file    = $upload_dir . $new_anhmonan;

                $allowed_extensions = array("jpg", "jpeg", "png", "gif");
                $file_extension     = strtolower(pathinfo($anh_monan, PATHINFO_EXTENSION));

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
                $id_monan       = $_GET['id_monan'];
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
            $anh_monan      = $gia_monan    = $mota_monan       = $ten_monan    = "";
            $err_anhmoan    = $err_giamonan = $err_motamonan    = $err_tenmonan = "";
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $id_sua     = $_POST['id_sua'];
                $ten_monan  = $_POST['ten_monan'];
                $gia_monan  = $_POST['gia_monan'];
                $id_danhmuc = $_POST['id_danhmuc'];
                $mota_monan = $_POST['mota_monan'];
                $noibat     = $_POST['noibat'];
                $check      = 0;

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
                $new_anhmonan       = "";
                $anh_monan          = $_FILES['anh_monan']['name'];
                $anh_monan_tmp      = $_FILES['anh_monan']['tmp_name'];
                $upload_dir         = "../uploads/monan/";
                $allowed_extensions = array("jpg", "jpeg", "png", "gif");

                if (!empty($anh_monan)) {
                    $file_extension = strtolower(pathinfo($anh_monan, PATHINFO_EXTENSION));

                    if (!in_array($file_extension, $allowed_extensions)) {
                        $err_anhmoan    = "Phải là ảnh có đuôi jpg, jpeg, png, gif";
                        $check++;
                    } else {
                        $new_anhmonan   = time() . "_" . $anh_monan . '.' . $file_extension;
                        $target_file    = $upload_dir . $new_anhmonan;

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
                        $linkanh    = '../uploads/monan/' . $list_monan_one['anh_monan'];
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
            break;

        case 'capnhatmonan':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                    $id_sua     = $_POST['id_sua'];
                    $ten_monan  = $_POST['ten_monan'];
                    $gia_monan  = $_POST['gia_monan'];
                    $id_danhmuc = $_POST['id_danhmuc'];
                    $mota_monan = $_POST['mota_monan'];
                    $noibat     = $_POST['noibat'];

                    $anhs       = $_FILES['anh'];
                    $ten        = $_POST['ten'];
                    $tien       = $_POST['tien'];

                    $list_monan_one = list_monan_One($id_sua);
                    $anh_monan      = $_FILES['anh_monan']['name'];
                    $anh_monan_tmp  = $_FILES['anh_monan']['tmp_name'];
                    $upload         = "../uploads/monan/";

                    $new_anhmonan = "";
                    if ($anh_monan != "") {
                        $linkanh = '../uploads/monan/' . $list_monan_one['anh_monan'];
                        if (is_file($linkanh)) {
                            unlink($linkanh);
                        }

                        $new_anhmonan = time() . "_" . basename($anh_monan);

                        $target_file = $upload . $new_anhmonan;
                        if (move_uploaded_file($anh_monan_tmp, $target_file)) {
                        } else {
                            echo "Lỗi khi tải lên ảnh mới";
                        }
                    }

                    if ($anhs !== []) {
                        foreach ($list_id_bienthe as $key => $b) {
                            extract($b);
                            if ($anhs["name"][$key] != $anh) {
                                # code...
                                $img = $upload . $anh;
                                if (is_file($img)) {
                                    unlink($img);
                                }
                            }
                        }
                        for ($i = 0; $i < count($anhs['name']); $i++) {
                            $target_file = $upload . time() . "_" . $anhs['name'][$i];
                            move_uploaded_file($anhs['tmp_name'][$i], $target_file);
                        }
                    } else {
                        $imgs = [];
                    }
                    capnhat_monan_bienthe($id_sua, $ten, $tien, $list_id_bienthe, $anhs["name"]);
                    capnhat_monan($id_sua, $ten_monan, $gia_monan, $id_danhmuc, $mota_monan, $new_anhmonan, $noibat);
                }
            }

            $listmonan = list_monan_All();
            include('./monan/lietke.php');
            break;

            //danh muc tintuc
        case 'themdmtintuc':
            if (isset($_POST['themmoi'])) {
                $ten_danhmuc_tintuc     = $_POST['ten_danhmuc_tintuc'];
                $phuluc_danhmuc_tintuc  = $_POST['phuluc_danhmuc_tintuc'];
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
            $iddmtintuc     = $_GET['id_danhmuc_tintuc'];
            xoadmtintuc($iddmtintuc);
            $listdmtintuc   = loaddmtintucAll();
            include('./tintuc/danhmuc/lietke.php');
            break;

        case 'suadmtintuc':
            if (isset($_GET["id_danhmuc_tintuc"]) && $_GET["id_danhmuc_tintuc"] > 0) {
                $id_danhmuc_tintuc  = $_GET['id_danhmuc_tintuc'];
                $listdmtintucone    = loaddmtintucone($id_danhmuc_tintuc);
            }
            include('./tintuc/danhmuc/sua.php');
            break;

        case 'capnhatdmtintuc':
            if (isset($_POST["capnhat"])) {
                $id_danhmuc_tintuc      = $_POST["id_danhmuc_tintuc"];
                $ten_danhmuc_tintuc     = $_POST["ten_danhmuc_tintuc"];
                $phuluc_danhmuc_tintuc  = $_POST["phuluc_danhmuc_tintuc"];
                capnhatdmtintuc($id_danhmuc_tintuc, $ten_danhmuc_tintuc, $phuluc_danhmuc_tintuc);
                $thongbao = "Thêm thành công";
            }
            $listdmtintuc = loaddmtintucAll();
            include('./tintuc/danhmuc/lietke.php');
            break;


            //tintuc
        case 'themtintuc':
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $ten_tintuc         = $_POST['ten_tintuc'];
                $mota_tintuc        = $_POST['mota_tintuc'];
                $motangan           = $_POST['motangan'];
                $id_danhmuc_tintuc  = $_POST['id_danhmuc_tintuc'];
                $anh_tintuc         = $_FILES['anh_tintuc']['name'];
                $anh_tintuc_tmp     = $_FILES['anh_tintuc']['tmp_name'];
                $upload             = "../uploads/monan/";

                $new_anhtintuc  = time() . "_" . basename($anh_tintuc);
                $target_file    = $upload . $new_anhtintuc;

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

            $loaddonhangAll_page    = loaddonhangAll_page($begin);
            $loaddonhang            = loaddonhangAll();

            include('./trangthaidonhang/hienthi.php');
            break;

        case 'suatrangthai':
            include("../model/connect_pdo.php");
            $trangthai      = loadtrangthaiAll();
            $id             = $_GET['iddh'];
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
                    $doanhthu   = 0;

                    while ($row = $stmt_lietke_dh->fetch(PDO::FETCH_ASSOC)) {
                        $soluongmua += $row['soluongmua'];
                        $doanhthu   += $row['gia_monan'] * $row['soluongmua'];
                    }

                    $sql_thongke    = "SELECT * FROM tbl_thongke WHERE ngaydat=?";
                    $stmt_thongke   = $conn->prepare($sql_thongke);
                    $stmt_thongke->execute([$ngaydat]);

                    if ($stmt_thongke->rowCount() == 0) {
                        $soluongban = $soluongmua;
                        $donhang    = 1;

                        $sql_update_thongke     = "INSERT INTO tbl_thongke (ngaydat, soluongban, doanhthu, donhang) VALUES (?, ?, ?, ?)";
                        $stmt_update_thongke    = $conn->prepare($sql_update_thongke);
                        $stmt_update_thongke->execute([$ngaydat, $soluongban, $doanhthu, $donhang]);
                    } else {
                        $row_tk     = $stmt_thongke->fetch(PDO::FETCH_ASSOC);
                        $soluongban = $row_tk['soluongban'] + $soluongmua;
                        $doanhthu  += $row_tk['doanhthu'];
                        $donhang    = $row_tk['donhang'] + 1;

                        $sql_update_thongke     = "UPDATE tbl_thongke SET soluongban=?, doanhthu=?, donhang=? WHERE ngaydat=?";
                        $stmt_update_thongke    = $conn->prepare($sql_update_thongke);
                        $stmt_update_thongke->execute([$soluongban, $doanhthu, $donhang, $ngaydat]);
                    }
                }
                echo '<script>window.location.href = "index.php?act=quanlydonhang";</script>';
            }
            $loaddonhang = loaddonhangAll();
            include('./trangthaidonhang/suatrangthai.php');
            break;
    }

    include("main.php");
}
include("./footer.php");
