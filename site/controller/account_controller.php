<?php 
session_start();

require_once('./admin/model/db_config.php');
require_once('./site/model/account_model.php');
require_once('./site/controller/handle_url.php');

$url = handle_url::getUrl();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_user_info') {
    // Lấy dữ liệu từ form
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $user_phone = $_POST['user_phone'];
    $user_address = $_POST['user_address'];

        $account_model = new account_model(); 
        // Gọi hàm update trong account_model
        $account_model->updateUserInfo($user_id, $user_name, $user_phone, $user_address);

    } 
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_account_info') {
        // Lấy dữ liệu từ form
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $newpassword = $_POST['newpassword'];
        $cf_password = $_POST['cf_password'];
        
        $account_model = new account_model(); 
        $isTenTKExist = $account_model->checkTenTK($username, $user_id);
        if ($isTenTKExist) {
            $_SESSION['error'] = 'Tên tài khoản đã tồn tại. Vui lòng chọn tên khác.';
            header("Location: $url/account"); // Chuyển hướng người dùng trở lại trang form
            exit;
        }
       
        $account_model->updateAccountInfo($user_id, $username, $email, $password, $newpassword, $cf_password);
    }

    // if (isset($_POST['username'])) {
    //     $user_id = $_POST['user_id'];
    //     $username = $_POST['username'];
      
    //     // Kiểm tra tên tài khoản đã tồn tại hay chưa
    //     $model = new account_model();
    //     $isExist = $model->checkTenTK($username, $user_id);
      
    //     if ($isExist) {
    //       $_SESSION['error'] = "Tên tài khoản đã tồn tại."; // Gán thông báo lỗi vào $_SESSION['error']
    //       header("Location: $url/account"); // Chuyển hướng người dùng trở lại trang Account
    //       exit();
    //     }
    //   }
    
    $_SESSION['back_from_controller'] = true;
    header("Location: $url/account");
    exit; 




