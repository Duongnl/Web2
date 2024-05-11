<?php session_start();
require_once('../model/login_register_model.php');
require_once('../../admin/model/db_config.php');

if ( isset($_POST['taikhoan']) && isset($_POST['matkhau'])  )
{
    $taikhoan= $_POST['taikhoan'];
    $matkhau= $_POST['matkhau'];
   $login_register_model = new login_register_model();
   $boolean = $login_register_model->checkUsernamePassword($taikhoan,$matkhau);
   if ($boolean == true) {
    $query = $login_register_model->getTaiKhoan($taikhoan);
    $row = mysqli_fetch_array($query);
    $_SESSION['TenTK'] = $row['TenTK'];
    $_SESSION['MaTK'] = $row['MaTK'];
    echo "correct";
   } else {
    $booleanUsername =  $login_register_model->checkUsername($taikhoan);
    if ($booleanUsername == true) {
        echo "Wrong password";
    } else {
        echo "Account does not exist";
    }
   }
   $_SESSION['back_account_controller'] = true;
}






