<?php
require_once('../model/thong_ke_model.php');
require_once('../model/db_config.php');

if (isset($_POST['startDay']) && isset($_POST['endDay']) && isset($_POST['top']) && isset($_POST['startPieChart'])) {
    $startDay = $_POST['startDay'];
    $endDay = $_POST['endDay'];
    $top = $_POST['top'];

    $thong_ke_model = new thong_ke_model();
    $query  = $thong_ke_model->soLuongSPDaBanTrongKhoangThoiGian($startDay, $endDay, $top);
    $i = 0;
    $topTableHTML = '';
    $cthdTableHTML = '';
    $arrName =  [];
    $arrData =  [];
    while ($row = mysqli_fetch_array($query)) {
        $arrName[] = $row['TenSP'];
        $arrData[] = $row['TongSanPhamDaBan'];
        $i++;
        $topTableHTML .= '
        <tr class="tr-body" >
            <td><b> ' . $i . ' </b></td>
            <td> ' . $row['MaSP'] . '</td>
            <td> ' . $row['TenSP'] . '</td>
            <td> <b>' . $row['TongSanPhamDaBan'] . '</b></td>
            <td> ' . $row['TienDaBan'] . '</td>
        </tr>
        ';
    }

    $querycthd = $thong_ke_model->getThongKeCTHD($startDay, $endDay);

    while ($rowcthd = mysqli_fetch_array($querycthd)) {
        $cthdTableHTML .= '
        <tr class="tr-body">
            <td>' . $rowcthd['MaHD'] . '</td>
            <td> <b>' . $rowcthd['MaSP'] . '</b></td>
            <td>' . $rowcthd['TenSP'] . '</td>
            <td>' . $rowcthd['MaSize'] . '</td>
            <td>' . $rowcthd['DonGia'] . '</td>
            <td> <b>' . $rowcthd['SoLuong'] . '</b></td>
            <td>' . $rowcthd['ThanhTien'] . '</td>
            <td>' . $rowcthd['ThoiGian'] . '</td>
        </tr>
        ';
    }

    // echo json_encode(array('topTableHTML' => $topTableHTML, 'cthdTableHTML' => $cthdTableHTML));
    echo json_encode(['topTableHTML' => $topTableHTML, 'cthdTableHTML' => $cthdTableHTML, 'arrName' => $arrName, 'arrData' => $arrData]);
}

if (isset($_POST['startFirstPieChart'])) {
    $thong_ke_model = new thong_ke_model();
    $startDay = '';
    $endDay = '';
    $top = 5;
    $query  = $thong_ke_model->soLuongSPDaBanTrongKhoangThoiGian($startDay, $endDay, $top);
    $arrName =  [];
    $arrData =  [];
    while ($row = mysqli_fetch_array($query)) {
        $arrName[] = $row['TenSP'];
        $arrData[] = $row['TongSanPhamDaBan'];
    }
    echo json_encode(['arrName' => $arrName, 'arrData' => $arrData]);
    // echo json_encode($arrName);
}

if (isset($_POST['moth'])&& isset($_POST['maDM'])) {
    $thong_ke_model = new thong_ke_model();
    $month = $_POST['moth'];
    $maDM = $_POST['maDM'];

    $year = date('Y'); // Lấy năm hiện tại
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    $mangTenSP = [];
    $mangDoanhThu = [];

    // Lặp qua từng ngày trong tháng

    $querySP = $thong_ke_model->getAllProduct($maDM );
    // duyệt qua all sp
    while ($rowSP = mysqli_fetch_array($querySP)) {
        $mangTenSP[] = $rowSP['TenSP'];
        // duyệt qua từng sp
        $queryDT = $thong_ke_model->getProductDoanhThu($rowSP['MaSP'], $month);
        $mangDoanhThu1 = [];
        $mang1 =[];
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $rowDT = mysqli_fetch_array($queryDT);
        
            if (isset($rowDT['DoanhThu'])) {
                // Tách chuỗi ngày tháng thành mảng
                $parts = explode('-', $rowDT['ThoiGianHD']);
                
                // Lấy phần tử thứ ba của mảng (ngày) và chuyển thành kiểu int
                $ngay = intval($parts[2]);
                $mangDoanhThu1[$ngay] = intval($rowDT['DoanhThu']);
                $mang1[] = $ngay;
            }
        }
        
        // Sau khi duyệt qua các kết quả từ queryDT
        for ($day = 1; $day <= $daysInMonth; $day++) {
            if (!in_array($day, $mang1)) {
                $mangDoanhThu1[$day] = 0; // Thiết lập giá trị 0 cho ngày không có doanh thu
            }
        }
        $mangDoanhThu[] = $mangDoanhThu1;
    }
    echo json_encode(['mangTenSP' => $mangTenSP, 'mangDoanhThu' => $mangDoanhThu]);
}
