<?php 
session_start();
require_once('../model/guest_model.php');
require_once('../model/account_manager_model.php');
require_once('../model/db_config.php');
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

    
    
    $guest_model = new guest_model();
    $account_manager_model = new account_manager_model();
    if ($action == 'add') {
       
        $queryAccount = $account_manager_model->getAccountData();
        $account_manager_model->insertAccountData(trim($guest_tenTK), trim($guest_email), trim($guest_sdt), trim($guest_matkhau) , 5, 1);
        
        $lastAccount = $queryAccount->fetch_all(MYSQLI_ASSOC);
        $lastMaTK = end($lastAccount)['MaTK']; 
        $guest_model->insertGuestData( $lastMaTK , $guest_name, $guest_diachi, 1);
    }
    else if ($action =='edit') {
    

        $result = $guest_model->SearchMaTK($guest_id);
        $row = $result->fetch_assoc();
        $MaTK = $row['MaTK'];
        
        $account_manager_model->updateAccountData($MaTK,trim($guest_tenTK),trim($guest_email), $guest_sdt, trim($guest_matkhau),5, 1);
        $guest_model->UpdateGuestData( $guest_id,trim($guest_name),$guest_diachi, 1 );
        
    } else if ($action == 'delete') {
        $result = $guest_model->SearchMaTK($guest_id);
        $row = $result->fetch_assoc();
        $MaTK = $row['MaTK'];
        
        $account_manager_model->updateAccountData($MaTK,trim($guest_tenTK),trim($guest_email), $guest_sdt, trim($guest_matkhau),5, 0);
        $guest_model->UpdateGuestData( $guest_id,trim($guest_name),$guest_diachi, 0 );
    }
    
    $_SESSION['back_from_controller'] = true;
    header("Location: ../view/guest_page.php");
    exit; 
}





