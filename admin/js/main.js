var myChart; // Khai báo biến biểu đồ ở mức toàn cục

$(document).ready(function () {
    myChart = new Morris.Area({
        element: 'myfirstchart',

        xkey: 'date',

        ykeys: ['order', "sales", "quantity"],

        labels: ['Đơn hàng', 'Doanh Thu', 'Số lượng bán ra'],
        lineColors: ['#3498db', '#3fb394', '#01f'],
        // fillOpacity: 0,
        animate: 'bounce',
    });

    $('#select-date').change(function () {
        var thoigian = $(this).val();
        if (thoigian == '7ngay') {
            var text = "7 ngày qua";
        } else if (thoigian == '28ngay') {
            var text = "28 ngày qua";
        } else if (thoigian == '60ngay') {
            var text = "60 ngày qua";
        } else if (thoigian == '90ngay') {
            var text = "90 ngày qua";
        } else if (thoigian == '180ngay') {
            var text = "180 ngày qua";
        } else if (thoigian == '365ngay') {
            var text = "365 ngày qua";
        }
        $('#text-date').text(text);
        $.ajax({
            url: "thongke.php",
            method: "POST",
            dataType: "JSON",
            data: { thoigian: thoigian },
            success: function (data) {
                myChart.setData(data); // Sử dụng biến biểu đồ đã khai báo ở trên
                $('#text-date').text(text);
            }
        });

    })


    // Mặc định chạy 365 ngày
    function thongke() {
        var text = "365 ngày qua";
        $('#text-date').text(text);

        $.ajax({
            url: "thongke.php",
            method: "POST",
            dataType: "JSON",

            success: function (data) {
                myChart.setData(data); // Sử dụng biến biểu đồ đã khai báo ở trên
                $('#text-date').text(text);
            }
        });
    }

    // Gọi hàm thongke để tạo biểu đồ ban đầu
    thongke();
});


