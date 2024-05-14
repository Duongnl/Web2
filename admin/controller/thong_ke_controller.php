<?php 
require_once('../model/thong_ke_model.php');
require_once('../model/db_config.php');

if ( isset($_POST['startDay']) && isset($_POST['endDay']) && isset($_POST['top']) && isset($_POST['startPieChart']))
{
    $startDay = $_POST['startDay'];
    $endDay = $_POST['endDay'];
    $top = $_POST['top'];

    $thong_ke_model = new thong_ke_model();
    $query  = $thong_ke_model->soLuongSPDaBanTrongKhoangThoiGian($startDay, $endDay,$top);
    $i = 0;
    $topTableHTML = '';
    $cthdTableHTML = '';
    $arrName =  [];
    $arrData =  [];
    while ($row = mysqli_fetch_array($query)) {
        $arrName[] = $row['TenSP'];
        $arrData[] = $row['TongSanPhamDaBan'];
        $i ++;
        $topTableHTML .= '
        <tr class="tr-body" >
            <td><b> '.$i.' </b></td>
            <td> ' .$row['MaSP'].'</td>
            <td> '.$row['TenSP'].'</td>
            <td> <b>'.$row['TongSanPhamDaBan'].'</b></td>
            <td> '.$row['TienDaBan'].'</td>
        </tr>
        ';
    }

    $querycthd = $thong_ke_model->getThongKeCTHD($startDay, $endDay);
  
    while ($rowcthd = mysqli_fetch_array($querycthd)) {
        $cthdTableHTML .= '
        <tr class="tr-body">
            <td>'.$rowcthd['MaHD'] .'</td>
            <td> <b>'.$rowcthd['MaSP'].'</b></td>
            <td>'.$rowcthd['TenSP'].'</td>
            <td>'. $rowcthd['MaSize'] .'</td>
            <td>'. $rowcthd['DonGia'] .'</td>
            <td> <b>'. $rowcthd['SoLuong'] .'</b></td>
            <td>'.$rowcthd['ThanhTien'].'</td>
            <td>'.$rowcthd['ThoiGian'] .'</td>
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
    $query  = $thong_ke_model->soLuongSPDaBanTrongKhoangThoiGian($startDay, $endDay,$top);
    $arrName =  [];
    $arrData =  [];
    while ($row = mysqli_fetch_array($query)) {
        $arrName[] = $row['TenSP'];
        $arrData[] = $row['TongSanPhamDaBan'];
    }
    echo json_encode(['arrName' => $arrName, 'arrData' => $arrData]);
    // echo json_encode($arrName);
}