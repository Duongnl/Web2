<?php session_start();
require_once('../model/discount_model.php');
require_once('../model/db_config.php');
require_once('../../site/controller/handle_url.php');
$request = $_SERVER['REQUEST_URI'];
$url = handle_url::getURLAdmin($request);
if ( isset($_POST['action'])  && isset($_POST['discount_id']) && isset($_POST['discount_name']) && isset($_POST['discount_percent']))
{
    $discount_id = $_POST['discount_id'];
    $discount_name = $_POST['discount_name'];
    $discount_percent = $_POST['discount_percent'];
    $action = $_POST['action'];

    $discount_model = new discount_model();
    
    if ($action == 'add') {
        $discount_model->insertdiscountData( trim($discount_name), trim($discount_percent), 1);
    }
    else if ($action =='edit') {
        $discount_model->UpdatediscountData( $discount_id, trim($discount_name), trim($discount_percent));
    } else if ($action == 'delete') {
        $discount_model->DeletediscountData($discount_id);
    }
    

    $_SESSION['back_from_discount_controller'] = true;
    header("Location: $url/discount");
    exit; // Dừng thực thi PHP sau khi chuyển hướng
}





