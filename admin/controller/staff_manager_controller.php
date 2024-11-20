<?php
session_start();
require_once('./admin/model/staff_manager_model.php');
require_once('./admin/model/account_manager_model.php');
require_once('./admin/model/db_config.php');
$request = $_SERVER['REQUEST_URI'];
$url = handle_url::getURLAdmin($request);

if (isset($_POST['action'])) {
    $staff_id = $_POST['staff_id'];
    $maTK = $_POST['maTK'];
    $staff_name = $_POST['staff_name'];
    $staff_tenTK = $_POST['staff_tenTK'];
    $staff_email = $_POST['staff_email'];
    $staff_sdt = $_POST['staff_sdt'];
    $staff_matkhau = $_POST['staff_matkhau'];
    $staff_diachi = $_POST['staff_diaChiNV'];
    $staff_position = $_POST['Position'];
    $action = $_POST['action'];

    echo("staff_id >>>\n ".$staff_id);
    echo("maTK >>>\n".$maTK);
    echo("staff_name >>>\n " . $staff_name);
    echo("staff_tenTK >>>\n ". $staff_tenTK);
    echo("staff_email >>>\n " . $staff_email);
    echo("staff_sdt >>>\n ". $staff_sdt);
    echo("staff_matkhau >>>\n " . $staff_matkhau);
    echo("staff_diachi >>>\n " . $staff_diachi);
    echo("staff_position >>>\n " . $staff_position);
    echo("action >>>\n " . $action);
    
    


    $staff_manager_model = new staff_manager_model();
    $account_manager_model = new account_manager_model();
    if ($action == 'add') {

        $queryAccount = $account_manager_model->getAccountData();
        $account_manager_model->insertAccountData(trim($staff_tenTK), trim($staff_email), trim($staff_sdt), trim($staff_matkhau), $staff_position, 1);

        $lastAccount = $account_manager_model->getAccountDataEnd();
        $row = mysqli_fetch_array($lastAccount);
        $lastMaTK = $row['MaTK'];
        $staff_manager_model->insertStaffData($lastMaTK, $staff_name, $staff_diachi, 1);
   
   
    } else if ($action == 'edit') {


        $account_manager_model->updateAccountData($maTK, trim($staff_tenTK), trim($staff_email), $staff_sdt, trim($staff_matkhau), $staff_position, 1);
        $staff_manager_model->UpdateStaffData($staff_id, trim($staff_name), $staff_diachi, 1);

    } else if ($action == 'delete') {
        $account_manager_model->deleteAccountData($maTK);
    }

    $_SESSION['back_from_controller'] = true;
    header("Location: $url/staff");
    exit;
}
