<?php session_start();

require_once('./admin/model/category_model.php');
require_once('./admin/model/db_config.php');

$request = $_SERVER['REQUEST_URI'];
$url = handle_url::getURLAdmin($request);

if ( isset($_POST['action'])  && isset($_POST['category_id']) && isset($_POST['category_name']))
{
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $action = $_POST['action'];

    $category_model = new category_model();
    
    if ($action == 'add') {
        $category_model->insertcategoryData( trim($category_name),1);
    }
    else if ($action =='edit') {
        $category_model->UpdatecategoryData( $category_id, trim($category_name));
    } else if ($action == 'delete') {
        $category_model->DeletecategoryData($category_id,0);
    }
    

    $_SESSION['back_from_category_controller'] = true;
    header("Location: $url/category");
    exit; // Dừng thực thi PHP sau khi chuyển hướng
}





