<?php 
session_start();
require_once('./admin/model/guest_model.php');
require_once('./admin/model/account_manager_model.php');
require_once('./admin/model/db_config.php');
$request = $_SERVER['REQUEST_URI'];
$url = handle_url::getURLAdmin($request);
if ( isset($_POST['action']) )
{
    $guest_id = $_POST['guest_id'];
    $guest_name = $_POST['guest_name'];
    $guest_tenTK = $_POST['guest_tenTK'];
    $guest_email = $_POST['guest_email'];
    $guest_sdt = $_POST['guest_sdt'];
    $guest_matkhau = $_POST['guest_matkhau'];
    $guest_diachi = $_POST['guest_diaChi'];
    $guest_position = 5;
    $action = $_POST['action'];
    $maTK = $_POST['maTK'];
    
    
    $guest_model = new guest_model();
    $account_manager_model = new account_manager_model();
    if ($action == 'add') {
       
        $queryAccount = $account_manager_model->getAccountData();
        $account_manager_model->insertAccountData(trim($guest_tenTK), trim($guest_email), trim($guest_sdt), trim($guest_matkhau) , 1, 1);
       
        $lastAccount = $account_manager_model->getAccountDataEnd();
        $row = mysqli_fetch_array($lastAccount);
        $lastMaTK = $row['MaTK'];
        
        $guest_model->insertGuestData( $lastMaTK , $guest_name, $guest_diachi, 1);
    }
    else if ($action =='edit') {
    
        $account_manager_model->updateAccountData($maTK,trim($guest_tenTK),trim($guest_email), $guest_sdt, trim($guest_matkhau),1, 1);
        $guest_model->UpdateGuestData( $guest_id,trim($guest_name),$guest_diachi, 1 );
        
    } else if ($action == 'delete') {
        $account_manager_model->deleteAccountData($maTK);
    }
    
    $_SESSION['back_from_controller'] = true;
    header("Location: $url/guest");
    exit; 
}





