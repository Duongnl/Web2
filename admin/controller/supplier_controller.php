<?php session_start();
require_once('../model/supplier_model.php');
require_once('../model/db_config.php');
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
    } 
    

    






    $_SESSION['back_from_controller'] = true;
    header("Location: ../view/supplier_page.php");
    exit; // Dừng thực thi PHP sau khi chuyển hướng
}




