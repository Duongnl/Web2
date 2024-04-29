<?php session_start();
require_once('../model/supplier_model.php');
require_once('../model/db_config.php');
require_once('../../site/controller/handle_url.php');

$request = $_SERVER['REQUEST_URI'];
$url = handle_url::getURLAdmin($request);

if ( isset($_POST['action'])  && isset($_POST['supplier_id']) && isset($_POST['supplier_name']))
{
    $supplier_id = $_POST['supplier_id'];
    $supplier_name = $_POST['supplier_name'];
    $action = $_POST['action'];

    $supplier_model = new supplier_model();
    
    if ($action == 'add') {
        $supplier_model->insertSupplierData( trim($supplier_name),1);
    }
    else if ($action =='edit') {
        $supplier_model->UpdateSupplierData( $supplier_id, trim($supplier_name));
    } else if ($action == 'delete') {
        $supplier_model->DeleteSupplierData($supplier_id);
    }
    

    $_SESSION['back_from_controller'] = true;
    header("Location: $url/supplier");
    exit; // Dừng thực thi PHP sau khi chuyển hướng
}





