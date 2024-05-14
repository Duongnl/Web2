<?php session_start();
require_once('../model/login_register_model.php');
require_once('../../admin/model/db_config.php');
require_once('../../admin/model/account_manager_model.php');

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

if ( isset($_POST['taikhoanDK']) && isset($_POST['emailDK']) && isset($_POST['passDK']) && isset($_POST['phonenumberDK']) && isset($_POST['addressDK']) && isset($_POST['nameuserDK']))
{
    $taikhoanDK= $_POST['taikhoanDK'];
    $emailDK=$_POST['emailDK'];
    $passDK= $_POST['passDK'];
    $phonenumberDK= $_POST['phonenumberDK'];
    $addressDK= $_POST['addressDK'];
    $nameuserDK= $_POST['nameuserDK'];

   $login_register_model_DKY = new login_register_model();
   $boolean1 = $login_register_model_DKY->checkUsernameDangKy($taikhoanDK);
   $boolean2 = $login_register_model_DKY->checkEmailDangKy($taikhoanDK);    

   if ($boolean1 == true && $boolean2 == true) {
        $login_register_model_DKY->addTaiKhoan($taikhoanDK,$emailDK,$passDK,$phonenumberDK,$addressDK);
        //lấy tài khoản cuối cùng add vào
        $account_manager_model = new account_manager_model();
        $queryAccount = $account_manager_model->getAccountData();
        $lastAccount = $queryAccount->fetch_all(MYSQLI_ASSOC);
        $lastMaTK = end($lastAccount)['MaTK']; 
        // //add khách hàng
        $query = $login_register_model_DKY->addKhachHangTheoTaiKhoan($lastMaTK,$nameuserDK,$addressDK);
   } 
   if($boolean1 == false){
    echo "Tên tài khoản tồn tại";
   }
   if($boolean2 == false){
    echo "Email tài khoản tồn tại";
   }
   $_SESSION['back_account_controller'] = true;
}






