<?php 

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





