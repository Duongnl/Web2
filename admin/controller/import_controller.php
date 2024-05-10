<?php session_start();

require_once('./admin/model/import_model.php');
require_once('./admin/model/db_config.php');

$request = $_SERVER['REQUEST_URI'];
$url = handle_url::getURLAdmin($request);

if ( isset($_POST['action'])  && isset($_POST['maPN']))
{
    $import_model = new import_model();
    $action = $_POST['action'];
    $maPN = $_POST['maPN'];
    if ($action == 'accept') {
        $import_model->updateStatusImport($maPN,1);
        $import_model->addProductFromImport($maPN);
    } else if ($action == 'decline') {
        $import_model->updateStatusImport($maPN,2);
    }    

    $_SESSION['back_import_controller'] = true;
    header("Location: $url/import");
    exit; // Dừng thực thi PHP sau khi chuyển hướng
}





