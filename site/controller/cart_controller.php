<?php 
session_start();

require_once('./admin/model/db_config.php');
require_once('./site/model/cart_model.php');
require_once('./site/controller/handle_url.php');

$url = handle_url::getUrl();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["user_id"]) && isset($_POST["quantity_product"])) {
    
    $productId = $_POST["user_id"];
    $newQuantity = $_POST["quantity_product"];
    
    $cart_model = new cart_model();

    $result = $cart_model->updateQuantity($productId, $newQuantity);
    } 

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["id"])) {
        echo print_r($_POST);
    }

    
// $_SESSION['back_from_controller'] = true;
// header("Location: $url/card");
// exit; 



