<style>
    .table-container {
        max-height: 400px;
        /* Đặt độ dài tối đa của bảng là 400px */
        overflow-y: auto;
        /* Thiết lập cuộn dọc khi nội dung vượt quá độ dài tối đa */
        position: relative;
        /* Đặt vị trí của container là relative */
    }

    .table-container table {
        width: 100%;
        /* Đảm bảo bảng rộng 100% của container */
    }

    .table-container thead {
        position: sticky;
        /* Đặt vị trí của header là sticky */
        top: 0;
        /* Giữ header ở đỉnh container */
        z-index: 1;
        /* Đảm bảo header hiển thị trên cùng */
        background-color: #fff;
        /* Màu nền cho header */

    }
</style>

<div class="main-content">
    <h3 class="h1-head-name">Thống kê</h3>
    <div style=" display:flex; align-items: baseline;">
        <p style="font-size: 18px;">Từ: </p>
        <input type="date" id="startDay" style="margin-left: 10px;">
        <p style="font-size: 18px; margin-left:20px">Đến: </p>
        <input type="date" id="endDay" style="margin-left: 10px;">
        <button type="button" id="button-filter-day" class="btn btn-success" style=" margin-left: 20px; ">
            <i class="fa-solid fa-circle-plus"></i> Chọn</button>
    </div>
    <div class="table-container">
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th scope="col">Mã HD</th>
                    <th scope="col">Mã SP</th>
                    <th scope="col">Tên SP</th>
                    <th scope="col">Size</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">SL</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col">Thời gian</th>
                </tr>
            </thead>

            <tbody class="table-group-divider " id="cthdTable">
                <?php

                $thong_ke_model = new thong_ke_model();
                $querycthd = $thong_ke_model->getThongKeCTHD('', '');

                while ($rowcthd = mysqli_fetch_array($querycthd)) {
                ?>
                    <tr class="tr-body">
                        <td><?php echo $rowcthd['MaHD'] ?></td>
                        <td> <b> <?php echo $rowcthd['MaSP'] ?> </b></td>
                        <td><?php echo $rowcthd['TenSP'] ?></td>
                        <td><?php echo $rowcthd['MaSize'] ?></td>
                        <td><?php echo $rowcthd['DonGia'] ?></td>
                        <td> <b> <?php echo $rowcthd['SoLuong'] ?></b></td>
                        <td><?php echo $rowcthd['ThanhTien'] ?></td>
                        <td><?php echo $rowcthd['ThoiGian'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>



    <div style="display: flex; justify-content: center;border-top: 2px solid #000;">
        <h3 style="padding-left: 15px; margin-top: 10px; " class="h1-head-name">Sản phẩm bán chạy</h3>

    </div>

    <div style="width:100px">
        <select id="select_top" class="form-select select-filter-type" aria-label="Default select example">
            <option value="1">Top 1</option>
            <option value="2">Top 2</option>
            <option value="3">Top 3</option>
            <option value="4">Top 4</option>
            <option value="5" selected>Top 5</option>
            <option value="6">Top 6</option>
            <option value="7">Top 7</option>
            <option value="8">Top 8</option>
            <option value="9">Top 9</option>
            <option value="10">Top 10</option>
        </select>
    </div>

    <!-- Thống kê bán chạy -->
    <div style=" display:flex; margin-bottom:20px; justify-content:baseline;">
        <table class="table table-striped table-hover " style="margin-top: 10px; margin-right:20px">
            <thead>
                <tr>
                    <th scope="col">Số thứ tự</th>
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Tổng tiền</th>
                </tr>
            </thead>

            <tbody class="table-group-divider " id="topTable">
                <?php

                $thong_ke_model = new thong_ke_model();
                $query = $thong_ke_model->soLuongSPDaBanTrongKhoangThoiGian('', '', 5);
                $i = 1;
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <tr class="tr-body">
                        <td><b> <?php echo $i ?></b></td>
                        <td><?php echo $row['MaSP'] ?></td>
                        <td><?php echo $row['TenSP'] ?></td>
                        <td> <b><?php echo $row['TongSanPhamDaBan'] ?></b></td>
                        <td><?php echo $row['TienDaBan'] ?></td>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
        <div>
            <canvas id="pieChart" style="width:400px" height="500"></canvas>
        </div>
    </div>

    <div style="display: flex; justify-content: center;border-top: 2px solid #000;">
        <h3 style="padding-left: 15px; margin-top: 10px; " class="h1-head-name">Tình hình kinh doanh</h3>
    </div>

    <div style="display: flex; justify-content:baseline;">
        <select id="select_month" class="form-select select-filter-type" style="width:200px;" aria-label="Default select example">
            <option value="0" selected disabled hidden >Chọn tháng</option>
            <option value="1">Tháng 1</option>
            <option value="2">Tháng 2</option>
            <option value="3">Tháng 3</option>
            <option value="4">Tháng 4</option>
            <option value="5">Tháng 5</option>
            <option value="6">Tháng 6</option>
            <option value="7">Tháng 7</option>
            <option value="8">Tháng 8</option>
            <option value="9">Tháng 9</option>
            <option value="10">Tháng 10</option>
            <option value="11">Tháng 11</option>
            <option value="12">Tháng 12</option>
        </select>
        <select id="select_sp" class="form-select select-filter-type" style="width:200px; margin-left:20px;" aria-label="Default select example">
            <option value="0">Tất cả sản phẩm</option>
            <?php
            $category_model = new category_model();
            $query = $category_model->getcategoryData();
            while ($row = mysqli_fetch_array($query)) { ?>
                <option value="<?php echo $row['MaDM'] ?> "><?php echo $row['TenDM'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div style="display: flex;">
        <!-- <canvas id="lineChart" width="800" height="300"></canvas> -->
        <canvas id="myChart"></canvas>
    </div>


</div>
<script>
    $(document).ready(function() {
        var startDay = document.getElementById("startDay");
        var endDay = document.getElementById("endDay");
        var top = document.getElementById("select_top")
        var select_month = document.getElementById("select_month");
        var select_sp = document.getElementById("select_sp");
        var top_data = 5;
        var arrName = [];
        var arrData = [];
        let pieChart;
        let myChart; // Biến toàn cục để lưu trữ tham chiếu đến biểu đồ
        let arrDate = [];
        let maDM_data = 0;

        $.post("../admin/controller/thong_ke_controller.php", {
            startFirstPieChart: 'startFirstPieChart',
        }, function(data, status) {

            var arrData = data.arrData;
            for (var i = 0; i < arrData.length; i++) {
                arrData[i] = parseInt(arrData[i]);
            }
            bieuDoTron(data.arrName, arrData)
            // bieuDoTron();
        }, 'json');


       


        function bieuDoTron(arrName, arrData) {
            const ctx = document.getElementById('pieChart').getContext('2d');

            // Kiểm tra nếu biểu đồ đã được tạo, thì chỉ cần cập nhật dữ liệu
            if (pieChart) {
                pieChart.data.labels = arrName;
                pieChart.data.datasets[0].data = arrData;
                pieChart.update(); // Cập nhật biểu đồ
            } else {
                pieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: arrName,
                        datasets: [{
                            data: arrData,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.7)',
                                'rgba(54, 162, 235, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(153, 102, 255, 0.7)',
                                'rgba(255, 159, 64, 0.7)',
                                'rgba(128, 0, 128, 0.7)',
                                'rgba(0, 128, 0, 0.7)',
                                'rgba(255, 0, 255, 0.7)',
                                'rgba(0, 255, 255, 0.7)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(128, 0, 128, 1)',
                                'rgba(0, 128, 0, 1)',
                                'rgba(255, 0, 255, 1)',
                                'rgba(0, 255, 255, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            }
        }

        document.getElementById('select_top').addEventListener('change', function() {

            top_data = top.value;
            console.log(top_data);
            startDay_data = startDay.value;
            endDay_data = endDay.value;

            $.post("../admin/controller/thong_ke_controller.php", {
                    top: top_data,
                    startDay: startDay_data,
                    endDay: endDay_data,
                    startPieChart: 'startPieChart',
                },
                function(data, status) {
                    $('#topTable').html(data.topTableHTML); // Set dữ liệu vào #topTable

                    var arrData = data.arrData;
                    for (var i = 0; i < arrData.length; i++) {
                        arrData[i] = parseInt(arrData[i]);
                    }

                    bieuDoTron(data.arrName, arrData)

                }, 'json');
        });


        $('#button-filter-day').click(function() {


            top_data = top.value;
            startDay_data = startDay.value;
            endDay_data = endDay.value;
            console.log(startDay_data);
            console.log(endDay_data);

            $.post("../admin/controller/thong_ke_controller.php", {
                    top: top_data,
                    startDay: startDay_data,
                    endDay: endDay_data,
                    startPieChart: 'startPieChart',
                },

                function(data, status) {

                    $('#topTable').html(data.topTableHTML); // Set dữ liệu vào #topTable
                    $('#cthdTable').html(data.cthdTableHTML); // Set dữ liệu vào #ctpnTable

                    var arrData = data.arrData;
                    for (var i = 0; i < arrData.length; i++) {
                        arrData[i] = parseInt(arrData[i]);
                    }

                    bieuDoTron(data.arrName, arrData)

                }, 'json');

        });

        document.getElementById('select_sp').addEventListener('change', function() {
            select_moth_data = select_month.value;
            maDM_data = select_sp.value;
            $.post("../admin/controller/thong_ke_controller.php", {
                    moth: select_moth_data,
                    maDM : maDM_data,
                },
                function(data, status) {
                    var mangTenSP = data.mangTenSP;
                    var mangDoanhThu = data.mangDoanhThu;
                    bieuDoDuong(mangTenSP, mangDoanhThu, select_moth_data)


                }, 'json');
        });




        document.getElementById('select_month').addEventListener('change', function() {
            select_moth_data = select_month.value;
            maDM_data = select_sp.value;
            $.post("../admin/controller/thong_ke_controller.php", {
                    moth: select_moth_data,
                    maDM : maDM_data,
                },
                function(data, status) {
                    var mangTenSP = data.mangTenSP;
                    var mangDoanhThu = data.mangDoanhThu;

                    bieuDoDuong(mangTenSP, mangDoanhThu, select_moth_data)


                }, 'json');
        });


        function getDaysInMonth(month, year) {
            // Tạo một đối tượng Date với ngày là 1 và tháng và năm được truyền vào
            let date = new Date(year, month - 1, 1);

            // Khởi tạo mảng kết quả
            let days = [];

            // Lặp qua tất cả các ngày trong tháng
            while (date.getMonth() === month - 1) {
                // Định dạng ngày hiện tại thành chuỗi "ngày/tháng"
                let dayString = date.getDate() + "/" + (date.getMonth() + 1);

                // Thêm chuỗi định dạng vào mảng
                days.push(dayString);

                // Chuyển sang ngày tiếp theo
                date.setDate(date.getDate() + 1);
            }

            return days;
        }

        function bieuDoDuong(mangTenSP, mangDoanhThu, month) {

            // mangTenSP = ['sp1', 'sp2'];
            // mangDoanhThu = [
            //     [1200, 900, 1500, 1300, 1700,4555],
            //     [1000, 1200, 900, 1000, 1300, 1700]
            // ];

            console.log(getDaysInMonth(month, 2024));
            if (myChart) {
                myChart.destroy();
            }
            // Tạo cấu trúc data
            const data = {
                label: getDaysInMonth(month, 2024), // arrDate chứa các ngày/tháng như đã tạo trước đó
                datasets: []
            };

            // Sử dụng vòng lặp để thêm dữ liệu vào datasets
            for (let i = 0; i < mangTenSP.length; i++) {
                var randomColor = getRandomColor(0.2); // Tạo màu nền ngẫu nhiên với độ mờ 0.2
                var backgroundColor = randomColor.color;
                var borderColor = `rgba(${randomColor.r}, ${randomColor.g}, ${randomColor.b}, 1)`; // Tạo màu viền tương tự nhưng với độ mờ 1
                data.datasets.push({
                    label: mangTenSP[i],
                    data: mangDoanhThu[i],
                    backgroundColor: backgroundColor,
                    borderColor: borderColor,
                    borderWidth: 2
                });
            }

            // Lấy thẻ canvas từ HTML
            const ctx = document.getElementById('myChart').getContext('2d');

            // Khởi tạo biểu đồ đường
            myChart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            console.log(getDaysInMonth(month, 2024));
        }


        // Hàm tạo màu ngẫu nhiên
        function getRandomColor(opacity) {
            const r = Math.floor(Math.random() * 255);
            const g = Math.floor(Math.random() * 255);
            const b = Math.floor(Math.random() * 255);
            return {
                r,
                g,
                b,
                color: `rgba(${r}, ${g}, ${b}, ${opacity})`
            };
        }


    });
</script>