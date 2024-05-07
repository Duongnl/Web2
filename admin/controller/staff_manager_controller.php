<?php 
session_start();
require_once('../model/staff_manager_model.php');
require_once('../model/account_manager_model.php');
require_once('../model/db_config.php');
if ( isset($_POST['action']) )
{
    $staff_id = $_POST['staff_id'];
    $staff_name = $_POST['staff_name'];
    $staff_tenTK = $_POST['staff_tenTK'];
    $staff_email = $_POST['staff_email'];
    $staff_sdt = $_POST['staff_sdt'];
    $staff_matkhau = $_POST['staff_matkhau'];
    $staff_diachi = $_POST['staff_diaChiNV'];
    $staff_position = $_POST['Position'];
    $action = $_POST['action'];

    
    
    $staff_manager_model = new staff_manager_model();
    $account_manager_model = new account_manager_model();
    if ($action == 'add') {
       
        $queryAccount = $account_manager_model->getAccountData();
        $account_manager_model->insertAccountData(trim($staff_tenTK), trim($staff_email), trim($staff_sdt), trim($staff_matkhau) , $staff_position, 1);
        
        $lastAccount = $queryAccount->fetch_all(MYSQLI_ASSOC);
        $lastMaTK = end($lastAccount)['MaTK']; 
        $staff_manager_model->insertStaffData( $lastMaTK , $staff_name, $staff_diachi, 1);
    }
    else if ($action =='edit') {
    

        $result = $staff_manager_model->SearchMaTK($staff_id);
        $row = $result->fetch_assoc();
        $MaTK = $row['MaTK'];
        
        $account_manager_model->updateAccountData($MaTK,trim($staff_tenTK),trim($staff_email), $staff_sdt, trim($staff_matkhau),$staff_position, 1);
        $staff_manager_model->UpdateStaffData( $staff_id,trim($staff_name),$staff_diachi, 1 );
        
    } else if ($action == 'delete') {
        $result = $staff_manager_model->SearchMaTK($staff_id);
        $row = $result->fetch_assoc();
        $MaTK = $row['MaTK'];
        
        $account_manager_model->updateAccountData($MaTK,trim($staff_tenTK),trim($staff_email), $staff_sdt, trim($staff_matkhau),$staff_position, 0);
        $staff_manager_model->UpdateStaffData( $staff_id,trim($staff_name),$staff_diachi, 0 );
        
    }
    
    $_SESSION['back_from_controller'] = true;
    header("Location: ../view/staff_manager_page.php");
    exit; 
}





