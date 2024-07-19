<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bảng Điều Khiển</title>
    <meta name="description" content>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


    <style id="" media="all">
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 100;
            font-display: swap;
            src: url(https://colorlib.com/fonts.gstatic.com/s/roboto/v30/KFOkCnqEu92Fr1MmgVxIIzc.ttf) format('truetype');
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://colorlib.com/fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmSU5fBBc9.ttf) format('truetype');
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://colorlib.com/fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu4mxP.ttf) format('truetype');
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://colorlib.com/fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmWUlfBBc9.ttf) format('truetype');
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 900;
            font-display: swap;
            src: url(https://colorlib.com/fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmYUtfBBc9.ttf) format('truetype');
        }
    </style>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link rel="stylesheet" href="css/nalika-icon.css">

    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">

    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/normalize.css">

    <link rel="stylesheet" href="css/meanmenu.min.css">

    <link rel="stylesheet" href="css/main.css">

    <link rel="stylesheet" href="css/morrisjs/morris.css">

    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">

    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">

    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="css/responsive.css">

    <!-- <script src="js/vendor/modernizr-2.8.3.min.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <meta name="robots" content="noindex, nofollow">
    <script nonce="d0d43353-1e09-4fa7-9f1f-ffb0f519a722">
        (function(w, d) {
            ! function(bb, bc, bd, be) {
                bb[bd] = bb[bd] || {};
                bb[bd].executed = [];
                bb.zaraz = {
                    deferred: [],
                    listeners: []
                };
                bb.zaraz.q = [];
                bb.zaraz._f = function(bf) {
                    return async function() {
                        var bg = Array.prototype.slice.call(arguments);
                        bb.zaraz.q.push({
                            m: bf,
                            a: bg
                        })
                    }
                };
                for (const bh of ["track", "set", "debug"]) bb.zaraz[bh] = bb.zaraz._f(bh);
                bb.zaraz.init = () => {
                    var bi = bc.getElementsByTagName(be)[0],
                        bj = bc.createElement(be),
                        bk = bc.getElementsByTagName("title")[0];
                    bk && (bb[bd].t = bc.getElementsByTagName("title")[0].text);
                    bb[bd].x = Math.random();
                    bb[bd].w = bb.screen.width;
                    bb[bd].h = bb.screen.height;
                    bb[bd].j = bb.innerHeight;
                    bb[bd].e = bb.innerWidth;
                    bb[bd].l = bb.location.href;
                    bb[bd].r = bc.referrer;
                    bb[bd].k = bb.screen.colorDepth;
                    bb[bd].n = bc.characterSet;
                    bb[bd].o = (new Date).getTimezoneOffset();
                    if (bb.dataLayer)
                        for (const bo of Object.entries(Object.entries(dataLayer).reduce(((bp, bq) => ({
                                ...bp[1],
                                ...bq[1]
                            })), {}))) zaraz.set(bo[0], bo[1], {
                            scope: "page"
                        });
                    bb[bd].q = [];
                    for (; bb.zaraz.q.length;) {
                        const br = bb.zaraz.q.shift();
                        bb[bd].q.push(br)
                    }
                    bj.defer = !0;
                    for (const bs of [localStorage, sessionStorage]) Object.keys(bs || {}).filter((bu => bu.startsWith("_zaraz_"))).forEach((bt => {
                        try {
                            bb[bd]["z_" + bt.slice(7)] = JSON.parse(bs.getItem(bt))
                        } catch {
                            bb[bd]["z_" + bt.slice(7)] = bs.getItem(bt)
                        }
                    }));
                    bj.referrerPolicy = "origin";
                    bj.src = "https://colorlib.com/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bb[bd])));
                    bi.parentNode.insertBefore(bj, bi)
                };
                ["complete", "interactive"].includes(bc.readyState) ? zaraz.init() : bb.addEventListener("DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

<body>
    <div class="left-sidebar-pro">
        <nav id="sidebar" style="overflow-y: scroll; width: 2px;" class>
            <div class="sidebar-header">
                <a href="http://localhost/fusion/admin/index.php"><img class="main-logo" src="img/logo.png" alt="" /></a>
                <!-- <strong><img src="img/logosn.png" alt /></strong> -->
            </div>
            <div class="nalika-profile">
                <div class="profile-dtl">
                    <a href="index.php"><img src="https://cdn0.iconfinder.com/data/icons/man-user-human-profile-avatar-business-person/100/09B-1User-512.png" alt="" /></a>
                    <h2>Admin <span class="min-dtn"></span></h2>
                </div>
                <div class="profile-social-dtl">
                    <ul class="dtl-social">
                        <li><a href="#"><i class="icon nalika-facebook"></i></a></li>
                        <li><a href="#"><i class="icon nalika-twitter"></i></a></li>
                        <li><a href="#"><i class="icon nalika-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li>
                            <a href="index.php">
                                <i class="fa-solid fa-house"></i>
                                Trang chủ</a>
                        </li>

                        <li class='<?php if (($_GET["act"] ?? '') == "themdanhmuc" || ($_GET["act"] ?? '') == "lietkedanhmuc") {
                                        echo "active";
                                    } ?>'>
                            <a class="has-arrow" href="" aria-expanded="false">
                                <i class="fa-brands fa-elementor"></i>
                                <span class="mini-click-non">Danh
                                    mục món ăn</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li>
                                    <a title="Inbox" href="index.php?act=themdanhmuc"><span class="mini-sub-pro">Thêm
                                            danh
                                            mục</span></a>
                                </li>
                                <li>
                                    <a title="Compose Mail" href="index.php?act=lietkedanhmuc"><span class="mini-sub-pro">Liệt kê</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class='<?php if (($_GET["act"] ?? '') == "themmonan" || ($_GET["act"] ?? '') == "lietkemonan") {
                                        echo "active";
                                    } ?>'>
                            <a class="has-arrow" aria-expanded="false"><i class="fa-solid fa-bowl-food"></i> <span class="mini-click-non">Quản lý món ăn</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a href="index.php?act=themmonan"><span class="mini-sub-pro">Thêm món ăn</span></a>
                                </li>
                                <li><a href="index.php?act=lietkemonan"><span class="mini-sub-pro">Liệt kê món
                                            ăn</span></a></li>
                            </ul>
                        </li>
                        <li class='<?php if (($_GET["act"] ?? '') == "themdmtintuc" || ($_GET["act"] ?? '') == "lietkedmtintuc") {
                                        echo "active";
                                    } ?>'>
                            <a class="has-arrow" href="index.php?act=themdmtintuc" aria-expanded="false">
                                <i class="fa-brands fa-elementor"></i>
                                <span class="mini-click-non">Danh mục tin
                                    tức</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a href="index.php?act=themdmtintuc"><span class="mini-sub-pro">Thêm danh mục tin
                                            tức</span></a>
                                </li>
                                <li><a href="index.php?act=lietkedmtintuc"><span class="mini-sub-pro">Liệt kê danh mục
                                            tin
                                            tức</span></a></li>
                            </ul>
                        </li>

                        <li class='<?php if (($_GET["act"] ?? '') == "themtintuc" || ($_GET["act"] ?? '') == "lietketintuc") {
                                        echo "active";
                                    } ?>'>
                            <a class="has-arrow" href="index.php?act=themtintuc" aria-expanded="false">
                                <i class="fa-brands fa-elementor"></i>
                                <span class="mini-click-non">Quản lý Tin
                                    tức</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a href="index.php?act=themtintuc"><span class="mini-sub-pro">Thêm tin
                                            tức</span></a>
                                </li>
                                <li><a href="index.php?act=lietketintuc"><span class="mini-sub-pro">Liệt kê
                                            tin
                                            tức</span></a></li>
                            </ul>
                        </li>

                        <li class='<?php if (($_GET["act"] ?? '') == "quanlydonhang" || ($_GET["act"] ?? '') == "giaothanhcong" || ($_GET["act"] ?? '') == "dahuy") {
                                        echo "active";
                                    } ?>'>
                            <a class="has-arrow" href="index.php?act=quanlydonhang" aria-expanded="false">
                                <i class="fa-solid fa-money-bill-wave"></i>
                                <span class="mini-click-non">
                                    Quản lý đơn hàng</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a href="index.php?act=quanlydonhang"><span class="mini-sub-pro">Trạng thái đơn
                                            hàng</span></a>
                                </li>
                                <li><a href="index.php?act=giaothanhcong"><span class="mini-sub-pro">Đơn hàng giao thành
                                            công</span></a>
                                </li>
                                <li><a href="index.php?act=dahuy"><span class="mini-sub-pro">Đơn hàng đã hủy</span></a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="index.php?act=lietkebinhluan">
                                <i class="fa-brands fa-elementor"></i>
                                <span class="mini-click-non">Quản lý bình luận</span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?act=lienhe">
                                <i class="fa-solid fa-phone"></i>
                                <span class="mini-click-non">Quản lý liên hệ</span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?act=thongkenguoidung"> <i class="fa-solid fa-user"></i>
                                Người dùng</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>

    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a "><img class=" main-logo" src="https://colorlib.com/polygon/nalika/img/logo/logo.png" alt /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="icon nalika-menu-task"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n hd-search-rp">
                                            <div class="breadcome-heading">
                                                <!-- <form role="search" class>
                                                    <input type="text" placeholder="Search..." class="form-control">
                                                    <a href><i class="fa fa-search"></i></a>
                                                </form> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <i class="icon nalika-user"></i>
                                                        <span class="admin-name">Tài khoản</span>
                                                        <i class="icon nalika-down-arrow nalika-angle-dw"></i>
                                                    </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="../index.php"><span class="icon nalika-user author-log-ic"></span>
                                                                Đăng nhập giao diện</a>
                                                        </li>
                                                        <li><a href="login/logout.php"><span class="icon nalika-unlocked author-log-ic"></span>
                                                                Đăng xuất</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="icon nalika-menu-task"></i></a>
                                                    <div role="menu" class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated zoomIn">
                                                        <ul class="nav nav-tabs custon-set-tab">
                                                            <li class="active"><a data-toggle="tab" href="#Notes">News</a>
                                                            </li>
                                                            <li><a data-toggle="tab" href="#Projects">Activity</a>
                                                            </li>
                                                            <li><a data-toggle="tab" href="#Settings">Settings</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content custom-bdr-nt">
                                                            <div id="Notes" class="tab-pane fade in active">
                                                                <div class="notes-area-wrap">
                                                                    <div class="note-heading-indicate">
                                                                        <h2><i class="icon nalika-chat"></i> Latest News
                                                                        </h2>
                                                                        <p>You have 10 New News.</p>
                                                                    </div>
                                                                    <div class="notes-list-area notes-menu-scrollbar">
                                                                        <ul class="notes-menu-list">
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="https://colorlib.com/polygon/nalika/img/contact/4.jpg" alt />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.
                                                                                            </p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="https://colorlib.com/polygon/nalika/img/contact/1.jpg" alt />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.
                                                                                            </p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="https://colorlib.com/polygon/nalika/img/contact/2.jpg" alt />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.
                                                                                            </p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="https://colorlib.com/polygon/nalika/img/contact/3.jpg" alt />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.
                                                                                            </p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="https://colorlib.com/polygon/nalika/img/contact/4.jpg" alt />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.
                                                                                            </p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="https://colorlib.com/polygon/nalika/img/contact/1.jpg" alt />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.
                                                                                            </p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="https://colorlib.com/polygon/nalika/img/contact/2.jpg" alt />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.
                                                                                            </p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="https://colorlib.com/polygon/nalika/img/contact/1.jpg" alt />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.
                                                                                            </p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="https://colorlib.com/polygon/nalika/img/contact/2.jpg" alt />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.
                                                                                            </p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="https://colorlib.com/polygon/nalika/img/contact/3.jpg" alt />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.
                                                                                            </p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="Projects" class="tab-pane fade">
                                                                <div class="projects-settings-wrap">
                                                                    <div class="note-heading-indicate">
                                                                        <h2><i class="icon nalika-happiness"></i> Recent
                                                                            Activity</h2>
                                                                        <p> You have 20 Recent Activity.</p>
                                                                    </div>
                                                                    <div class="project-st-list-area project-st-menu-scrollbar">
                                                                        <ul class="projects-st-menu-list">
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>New User Registered</h2>
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more or less normal.
                                                                                            </p>
                                                                                            <span class="project-st-time">1
                                                                                                hours ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>New Order Received</h2>
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more or less normal.
                                                                                            </p>
                                                                                            <span class="project-st-time">2
                                                                                                hours ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>New Order Received</h2>
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more or less normal.
                                                                                            </p>
                                                                                            <span class="project-st-time">3
                                                                                                hours ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>New Order Received</h2>
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more or less normal.
                                                                                            </p>
                                                                                            <span class="project-st-time">4
                                                                                                hours ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>New User Registered</h2>
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more or less normal.
                                                                                            </p>
                                                                                            <span class="project-st-time">5
                                                                                                hours ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>New Order</h2>
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more or less normal.
                                                                                            </p>
                                                                                            <span class="project-st-time">6
                                                                                                hours ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>New User</h2>
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more or less normal.
                                                                                            </p>
                                                                                            <span class="project-st-time">7
                                                                                                hours ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>New Order</h2>
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more or less normal.
                                                                                            </p>
                                                                                            <span class="project-st-time">9
                                                                                                hours ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="Settings" class="tab-pane fade">
                                                                <div class="setting-panel-area">
                                                                    <div class="note-heading-indicate">
                                                                        <h2><i class="icon nalika-gear"></i> Settings
                                                                            Panel</h2>
                                                                        <p> You have 20 Settings. 5 not completed.</p>
                                                                    </div>
                                                                    <ul class="setting-panel-list">
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Show notifications</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
                                                                                            <label class="onoffswitch-label" for="example">
                                                                                                <span class="onoffswitch-inner"></span>
                                                                                                <span class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Disable Chat</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example3">
                                                                                            <label class="onoffswitch-label" for="example3">
                                                                                                <span class="onoffswitch-inner"></span>
                                                                                                <span class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Enable history</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example4">
                                                                                            <label class="onoffswitch-label" for="example4">
                                                                                                <span class="onoffswitch-inner"></span>
                                                                                                <span class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Show charts</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example7">
                                                                                            <label class="onoffswitch-label" for="example7">
                                                                                                <span class="onoffswitch-inner"></span>
                                                                                                <span class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Update everyday</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" checked class="onoffswitch-checkbox" id="example2">
                                                                                            <label class="onoffswitch-label" for="example2">
                                                                                                <span class="onoffswitch-inner"></span>
                                                                                                <span class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Global search</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" checked class="onoffswitch-checkbox" id="example6">
                                                                                            <label class="onoffswitch-label" for="example6">
                                                                                                <span class="onoffswitch-inner"></span>
                                                                                                <span class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Offline users</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" checked class="onoffswitch-checkbox" id="example5">
                                                                                            <label class="onoffswitch-label" for="example5">
                                                                                                <span class="onoffswitch-inner"></span>
                                                                                                <span class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="https://colorlib.com/polygon/nalika/index.html">Dashboard
                                                        v.1</a></li>
                                                <li><a href="https://colorlib.com/polygon/nalika/index-1.html">Dashboard
                                                        v.2</a></li>
                                                <li><a href="https://colorlib.com/polygon/nalika/index-3.html">Dashboard
                                                        v.3</a></li>
                                                <li><a href="https://colorlib.com/polygon/nalika/product-list.html">Product
                                                        List</a></li>
                                                <li><a href="https://colorlib.com/polygon/nalika/product-edit.html">Product
                                                        Edit</a></li>
                                                <li><a href="https://colorlib.com/polygon/nalika/product-detail.html">Product
                                                        Detail</a></li>
                                                <li><a href="https://colorlib.com/polygon/nalika/product-cart.html">Product
                                                        Cart</a></li>
                                                <li><a href="https://colorlib.com/polygon/nalika/product-payment.html">Product
                                                        Payment</a></li>
                                                <li><a href="https://colorlib.com/polygon/nalika/analytics.html">Analytics</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/widgets.html">Widgets</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="#">Mailbox <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="demo" class="collapse dropdown-header-top">
                                                <li><a href="https://colorlib.com/polygon/nalika/mailbox.html">Inbox</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/mailbox-view.html">View
                                                        Mail</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/mailbox-compose.html">Compose
                                                        Mail</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#others" href="#">Miscellaneous <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="others" class="collapse dropdown-header-top">
                                                <li><a href="https://colorlib.com/polygon/nalika/file-manager.html">File
                                                        Manager</a></li>
                                                <li><a href="https://colorlib.com/polygon/nalika/contacts.html">Contacts
                                                        Client</a></li>
                                                <li><a href="https://colorlib.com/polygon/nalika/projects.html">Project</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/project-details.html">Project
                                                        Details</a></li>
                                                <li><a href="https://colorlib.com/polygon/nalika/blog.html">Blog</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/blog-details.html">Blog
                                                        Details</a></li>
                                                <li><a href="https://colorlib.com/polygon/nalika/404.html">404 Page</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/500.html">500 Page</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Interface
                                                <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                                <li><a href="https://colorlib.com/polygon/nalika/google-map.html">Google
                                                        Map</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/data-maps.html">Data
                                                        Maps</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/pdf-viewer.html">Pdf
                                                        Viewer</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/x-editable.html">X-Editable</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/code-editor.html">Code
                                                        Editor</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/tree-view.html">Tree
                                                        View</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/preloader.html">Preloader</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/images-cropper.html">Images
                                                        Cropper</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Charts <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Chartsmob" class="collapse dropdown-header-top">
                                                <li><a href="https://colorlib.com/polygon/nalika/bar-charts.html">Bar
                                                        Charts</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/line-charts.html">Line
                                                        Charts</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/area-charts.html">Area
                                                        Charts</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/rounded-chart.html">Rounded
                                                        Charts</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/c3.html">C3 Charts</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/sparkline.html">Sparkline
                                                        Charts</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/peity.html">Peity
                                                        Charts</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Tables <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Tablesmob" class="collapse dropdown-header-top">
                                                <li><a href="https://colorlib.com/polygon/nalika/static-table.html">Static
                                                        Table</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/data-table.html">Data
                                                        Table</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#formsmob" href="#">Forms <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="formsmob" class="collapse dropdown-header-top">
                                                <li><a href="https://colorlib.com/polygon/nalika/basic-form-element.html">Basic
                                                        Form
                                                        Elements</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/advance-form-element.html">Advanced
                                                        Form
                                                        Elements</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/password-meter.html">Password
                                                        Meter</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/multi-upload.html">Multi
                                                        Upload</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/tinymc.html">Text
                                                        Editor</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/dual-list-box.html">Dual
                                                        List Box</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Appviewsmob" href="#">App views
                                                <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Appviewsmob" class="collapse dropdown-header-top">
                                                <li><a href="https://colorlib.com/polygon/nalika/basic-form-element.html">Basic
                                                        Form
                                                        Elements</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/advance-form-element.html">Advanced
                                                        Form
                                                        Elements</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/password-meter.html">Password
                                                        Meter</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/multi-upload.html">Multi
                                                        Upload</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/tinymc.html">Text
                                                        Editor</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/dual-list-box.html">Dual
                                                        List Box</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Pagemob" class="collapse dropdown-header-top">
                                                <li><a href="https://colorlib.com/polygon/nalika/login.html">Login</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/register.html">Register</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/lock.html">Lock</a>
                                                </li>
                                                <li><a href="https://colorlib.com/polygon/nalika/password-recovery.html">Password
                                                        Recovery</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>