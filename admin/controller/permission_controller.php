<?php session_start();

require_once('./admin/model/quyen_model.php');
require_once('./admin/model/db_config.php');

$request = $_SERVER['REQUEST_URI'];
$url = handle_url::getURLAdmin($request);

if ( isset($_POST['action'])   )
{
    $permission_id = $_POST['permission_id'];
    $Permission_name = $_POST['Permission_name'];

    $action = $_POST['action'];
    
    if ($action == 'add') {
        $quyen_model->insertQuyenData( $Permission_name , 1);
    }
    else if ($action =='edit') {

        $quyen_model->UpdateQuyenData( $permission_id, $Permission_name,1);
    } else if ($action == 'delete') {
        $quyen_model->UpdateQuyenData( $permission_id, $Permission_name,0);

    }
    
    
    $_SESSION['back_from_controller'] = true;
    header("Location: $url/permission");
    exit; // Dừng thực thi PHP sau khi chuyển hướng
}





