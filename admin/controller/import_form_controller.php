<?php 
session_start();
require_once('../model/import_model.php');
require_once('../model/db_config.php');

if ( isset($_POST['maSP']) )
{
    $maSP= $_POST['maSP'];
    $import_model = new import_model();
    $query = $import_model->getSizeProduct( $maSP);
    $data = array();
    while ($row = mysqli_fetch_array($query)) {
        $data[] = $row['MaSize'];
    }
    
    echo json_encode($data); // Trả về dữ liệu dưới dạng JSON

}

if (isset ($_POST["listCTPN"]) && isset ($_POST["total_import"]) && isset ($_POST["maNCC"])) {
    
    $import_model = new import_model();
    
    $maTK = $_SESSION['MaTK'];
    $thoiGian = date("Y-m-d"); 
    $thanhToan =  $_POST["total_import"];
    $maNCC = $_POST["maNCC"];
    
    $import_model->insertImportData($maTK, $maNCC,$thanhToan,$thoiGian, 0 );
    // session_start();
    // Lấy giá trị của $_SESSION['MaTaiKhoan']
    // $maTaiKhoan = $_SESSION['MaTaiKhoan'];
    
    $importData = $import_model->getImportDataEnd();
    $row = mysqli_fetch_array($importData);
    $maPN = $row['MaPN'];
  
    $listCTPN = $_POST["listCTPN"];
    for ($i=0; $i<count($listCTPN); $i++) {
        $maSP = $listCTPN[$i][0];
        $size = $listCTPN[$i][1];
        $donGia =  $listCTPN[$i][2];
        $soLuong =  $listCTPN[$i][3];
        $thanhTien =  $listCTPN[$i][4];
        $trangThai = 0;
        $import_model->insertImportDetailData($maPN,$maSP,$donGia,$soLuong, $thanhTien,$size);
       
    }
    
    echo $maPN;
}






