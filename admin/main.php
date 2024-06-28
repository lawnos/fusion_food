<!-- Thống kê -->
<div class="widgets-programs-area mg-t-15">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="hpanel responsive-mg-b-30">
                    <div class="panel-body">
                        <div class="stats-title pull-left">
                            <h4>Doanh thu</h4>
                        </div>
                        <div class="stats-icon pull-right">
                          
                            <i class="fa-brands fa-shopify fa-bounce"></i>
                        </div>
                        <div class="m-t-xl">
                            <?php if (is_array($doanh_thu_hoadon)) {
                                foreach ($doanh_thu_hoadon as $key => $value) {
                                    extract($value);
                                }
                            } ?>
                            <h1 style="color: #48c89f;"><?= number_format($doanhthu, 0, ",", ".") ?> VNĐ</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="hpanel responsive-mg-b-30">
                    <div class="panel-body">
                        <div class="stats-title pull-left">
                            <h4>Đơn hàng mới</h4>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="fa-regular fa-calendar-check fa-beat"></i>
                        </div>
                        <div class="m-t-xl">
                            <?php if (is_array($thong_ke_hoadon)) {
                                foreach ($thong_ke_hoadon as $key => $value) {
                                    extract($value);
                                }
                            } ?>
                            <h1 class="text-info"><?= $donmoi ?></h1>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="hpanel responsive-mg-b-30">
                    <div class="panel-body">
                        <div class="stats-title pull-left">
                            <?php if (is_array($don_thanh_cong)) {
                                foreach ($don_thanh_cong as $key => $value) {
                                    extract($value);
                                }
                            } ?>
                            <h4>Đơn Thành công</h4>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="fa-solid fa-check fa-beat"></i>
                        </div>
                        <div class="m-t-xl">
                            <h1 class="text-success"><?= $donthanhcong ?></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="hpanel">
                    <div class="panel-body">
                        <div class="stats-title pull-left">
                            <?php if (is_array($don_huy)) {
                                foreach ($don_huy as $key => $value) {
                                    extract($value);
                                }
                            } ?>
                            <h4>Đơn hủy</h4>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="fa-solid fa-triangle-exclamation fa-flip"></i>
                        </div>
                        <div class="m-t-xl">
                            <h1 class="text-danger"><?= $donhuy ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-sales-area mg-tb-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="product-sales-chart mg-b-30">
                    <div class="portlet-title">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="caption pro-sl-hd">
                                    <h3 class="caption-subject text-uppercase">Thống Kê Doanh Thu:
                                        <b id="text-date">365 Ngày qua</b>
                                    </h3>

                                    <select id="select-date" name="id_trangthai" class="select2_demo_3 form-control">
                                        <option value="7ngay"> 7 Ngày qua </option>
                                        <option value="28ngay"> 28 Ngày qua </option>
                                        <option value="60ngay"> 60 Ngày qua </option>
                                        <option value="90ngay"> 90 Ngày qua </option>
                                        <option value="180ngay"> 180 Ngày qua </option>
                                        <option selected value="365ngay"> 365 Ngày qua </option>
                                    </select>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="myfirstchart">
                        <!-- Thống kê doanh thu -->
                    </div>
                </div>

                <!-- Biểu đồ thống kê đơn hàng -->
                <div class="product-sales-chart">
                    <div id="line-adwords">
                        <!-- Biểu đồ thống kê doanh thu theo đơn hàng -->
                    </div>
                </div>


            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <!-- Thống kê bình luận -->
                <div class="analytics-rounded mg-b-30 res-mg-t-30">
                    <div class="analytics-rounded-content">
                        <h5>Thống kê bình luận</h5>
                        <!-- <h2><span class="counter">150</span>/<span class="counter">54</span></h2> -->
                        <div class="text-center">
                            <div id="areachart" style="padding-bottom: 33px;"></div>
                        </div>
                    </div>
                </div>

                <div class="analytics-rounded mg-t-30">
                    <div class="analytics-rounded-content">
                        <h5>Thống kê số lượng sản phẩm theo danh mục</h5>
                        <div class="text-center">
                            <!-- Thống kê số lượng sản phẩm trong danh mục -->
                            <div id="chart" style="padding-bottom: 81px;"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="footer-copyright-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-copy-right">
                    <p>Bản quyền Fusion Food © 2023 <a href="https://colorlib.com/wp/templates/">được</a> bảo lưu.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    // Biểu đồ thống kê theo danh mục
    <?php
    $label = "";
    $trungbinh = "";
    $minprice = "";
    $maxprice = ""; //
    foreach ($thongke_doanhthu_theo_danhmuc as $key => $value) {
        $label .= "'" . $value['tendm'] . "', ";
        $trungbinh .= $value['trungbinh'] . ', ';
        $maxprice .= $value['maxprice'] . ', ';
        $minprice .= $value['minprice'] . ', ';
    }

    $label = rtrim($label, ", ");
    $label = "[" . $label . "]";

    $trungbinh = "{name: 'Giá trung bình', data: [" . rtrim($trungbinh, ', ') . "]}";
    $minprice = "{name: 'Giá thấp nhất', data: [" .  rtrim($minprice, ', ') . "]}";
    $maxprice =  "{name: 'Giá cao nhất', data: [" . rtrim($maxprice, ', ') . "]}";

    // echo $label;
    // echo $minprice . "_" . $maxprice . "_" . $trungbinh;
    ?>
    window.Apex = {
        chart: {
            foreColor: '#ccc',
            toolbar: {
                show: false
            },
        },
        stroke: {
            width: 3
        },
        dataLabels: {
            enabled: false
        },
        tooltip: {
            theme: 'dark'
        },
        grid: {
            borderColor: "#535A6C",
            xaxis: {
                lines: {
                    show: true
                }
            }
        }
    };

    var optionsLine = {
        chart: {
            height: 328,
            type: 'line',
            zoom: {
                enabled: false
            },
            dropShadow: {
                enabled: true,
                top: 3,
                left: 2,
                blur: 4,
                opacity: 1,
            }
        },
        stroke: {
            curve: 'smooth',
            width: 2
        },
        //colors: ["#3F51B5", '#2196F3'],

        series: [
            <?= $maxprice ?>,
            <?= $minprice ?>,
            <?= $trungbinh ?>
        ],

        // series: [{
        //         name: "Music",
        //         data: [1, 15, 26, 20, 33, 27]
        //     },
        //     {
        //         name: "Photos",
        //         data: [3, 33, 21, 42, 19, 32]
        //     },
        //     {
        //         name: "Files",
        //         data: [0, 39, 52, 11, 29, 43]
        //     }
        // ],

        title: {
            text: 'Thống kê giá cả theo danh mục',
            align: 'left',
            offsetY: 25,
            offsetX: 5,
        },
        subtitle: {
            text: 'Tổng tiền',
            offsetY: 55,
            offsetX: 5
        },
        markers: {
            size: 8,
            strokeWidth: 0,
            hover: {
                size: 9
            }
        },
        grid: {
            show: true,
            padding: {
                bottom: 0
            }
        },

        labels: <?= $label; ?>,

        xaxis: {
            tooltip: {
                enabled: false
            }
        },
        legend: {
            position: 'top',
            horizontalAlign: 'right',
            offsetY: -20
        }
    }

    var chartLine = new ApexCharts(document.querySelector('#line-adwords'), optionsLine);
    chartLine.render();
    // end biểu đồ thóng kê giá cả danh mục


    // Thống kê biểu đồ số lượng sản phẩm
    <?php
    $tendm = "";
    $countmonan = "";

    foreach ($thongke_doanhthu_theo_danhmuc as $key => $value) {
        $tendm .= "'" . $value["tendm"] . "', ";
        $countmonan .= $value["countmonan"] . ", ";
    }

    $tendm = rtrim($tendm, ", ");
    $tendm = "[" . $tendm . "]";
    $countmonan = rtrim($countmonan, ", ");
    $countmonan = "[" . $countmonan . "]";
    ?>

    var options = {
        series: <?= $countmonan ?>,
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: <?= $tendm ?>,
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
    // End biểu đồ thống kê số hàng trong danh mục

    // Start biểu dồ bình luận

    <?php

    $ngaybinhluan = "";
    $comment_count = "";
    foreach ($thongke_binhluan as $key => $value) {
        $ngaybinhluan .= "'" . $value["ngaybinhluan"] . "', ";
        $comment_count .= $value["comment_count"] . ", ";
    }

    $ngaybinhluan = rtrim($ngaybinhluan, ", ");
    $comment_count = rtrim($comment_count, ", ");

    $ngaybinhluan = "[" . $ngaybinhluan . "]";
    $comment_count = "name: 'Số bình luận',data:[" . $comment_count . "]";

    // echo $ngaybinhluan;
    ?>

    var optionsArea = {
        chart: {
            height: 380,
            type: 'area',
            stacked: false,
        },
        stroke: {
            curve: 'straight'
        },
        series: [{
                // name: "Số bình luận:",
                // data: [11, 15, 26, 20, 33, 27]
                <?= $comment_count ?>,
            }

        ],
        xaxis: {
            categories: <?= $ngaybinhluan ?>,
        },
        tooltip: {
            followCursor: true
        },
        fill: {
            opacity: 1,
        },

    }

    var chartArea = new ApexCharts(
        document.querySelector("#areachart"),
        optionsArea
    );

    chartArea.render();
</script>