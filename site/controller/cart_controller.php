<?php
session_start();

require_once('./admin/model/db_config.php');
require_once('./site/model/cart_model.php');
require_once('./site/controller/handle_url.php');

$url = handle_url::getUrl();

if (isset($_POST['action']) && $_POST['action'] == 'update_quantity') {
    // Kiểm tra xem dữ liệu được gửi đi có chứa user_id không
    if (isset($_POST["user_id"])) {
        $userId = $_POST["user_id"];
        $productId = $_POST['product_id'];
        $size = $_POST['size_delete'];

        $cart_model = new cart_model();

        if (isset($_POST['quantity'])) {
            foreach ($_POST['quantity'] as $productId => $sizes) {
                foreach ($sizes as $size => $newQuantity) {
                    // Gọi phương thức updateQuantityWithSize từ cart_model để cập nhật số lượng sản phẩm
                    $result = $cart_model->updateQuantity($userId, $productId, $newQuantity, $size);
                }
            }
        }
    }
}

$list = null;
$maTK = null;
$model = new cart_model();

if (isset($_SESSION['MaTK'])) {
    $maTK = $_SESSION['MaTK'];
    $list = $model->getCartDetails($maTK);
} else {
    $maTK = NULL;
}
if (isset($_GET['action'])) {


    $action = $_GET['action'];
    if ($action == 'deleted') {
        foreach ($list as $key => $value) {
            if ($value['MaSP'] == $_GET['MaSP'] && $value['MaSize'] == $_GET['MaSize']) {
                $model->deleteProduct($maTK, $value['MaSP'], $value['MaSize']);
                unset($list[$key]);
                echo $url . '/cart';
            }
        }
    }
}
if (isset($_POST['thanhtoan']) && $_POST['thanhtoan'] == 'thanhtoan_tongtien') {
    // Lấy giá trị MaTK từ form
   
    $maTK = $_POST['userid'];
    $maSP = $_POST['productid'];
    $Giabankm = $_POST['GiaBanKM'];
    $query = $model->getDiscountedPrice($maSP);
    $row =  mysqli_fetch_array($query);
    // Tính tổng tiền từ form
    $thanhTien = 0;
    if ($list != null) {
        foreach ($list as $value) {
            $thanhTien += $value['SoLuong'] * $Giabankm;
        }
    }
    $cart_model = new cart_model();
    // Gọi hàm insertToHoadon từ cart_model
    $cart_model->insertToHoadon($maTK, $thanhTien);

    $cart_model->addToCTHoaDon($maTK,$Giabankm);
}


$_SESSION['back_from_controller'] = true;
header("Location: $url/card");
exit;
