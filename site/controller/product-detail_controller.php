<?php 
session_start();

require_once('./admin/model/db_config.php');
require_once('./site/model/product-detail_model.php');
require_once('./site/controller/handle_url.php');

$url = handle_url::getUrl();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_user_info') {
    

} 


$_SESSION['back_from_controller'] = true;
header("Location: $url/account");
exit; 




