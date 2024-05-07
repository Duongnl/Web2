<?php session_start();
require_once('../Web2/site/model/account_model.php');
require_once('../Web2/admin/model/db_config.php');
require_once('../../site/controller/handle_url.php');

$request = $_SERVER['REQUEST_URI'];
$url = handle_url::getURLAdmin($request);

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    $account_model = new account_model();

    switch ($action) {
        case 'update_user_info':
            if (isset($_POST['user_id']) && isset($_POST['user_name']) && isset($_POST['user_phone']) && isset($_POST['user_date']) && isset($_POST['user_permission']) && isset($_POST['user_address'])) {
                $user_id = $_POST['user_id'];
                $user_name = $_POST['user_name'];
                $user_phone = $_POST['user_phone'];
                $user_date = $_POST['user_date'];
                $user_permission = $_POST['user_permission'];
                $user_address = $_POST['user_address'];
                $account_model->updateCustomerInfo($user_id, $user_name, $user_phone, $user_date, $user_permission, $user_address);
            }
            break;
        case 'change_account_info':
            if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['newpassword']) && isset($_POST['cf_password'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $newpassword = $_POST['newpassword'];
                $cf_password = $_POST['cf_password'];
                // Kiểm tra mật khẩu mới và xác nhận mật khẩu mới trùng khớp
                if ($newpassword === $cf_password) {
                    $account_model->updateAccountInfo($username, $email, $password, $newpassword,$cf_password );
                } else {
                    // Xử lý khi mật khẩu mới và xác nhận mật khẩu mới không trùng khớp
                    // Ví dụ: Hiển thị thông báo lỗi
                }
            }
            break;
        default:
            // Nếu không có hành động nào được nhận, không làm gì cả hoặc có thể ghi log lỗi
            break;
    }

    $_SESSION['back_from_controller'] = true;
    header("Location: $url/account");
    exit; // Dừng thực thi PHP sau khi chuyển hướng
}
?>