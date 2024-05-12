<?php
session_start();

require_once('./admin/model/db_config.php');
require_once('./site/model/cart_model.php');
require_once('./site/controller/handle_url.php');

$url = handle_url::getUrl();

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    // Kiểm tra xem dữ liệu được gửi đi có chứa user_id không
    if (isset($_POST["user_id"])) {
        $userId = $_POST["user_id"];

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

if (isset($_POST['action_deleted']) && $_POST['action_deleted'] == 'delete_product') {
    echo "hello";
    // Kiểm tra xem dữ liệu gửi đi có chứa product_id không
    echo $_POST['product_id'];
    echo $_POST['size_delete'];
    echo $_POST["user_id"];
    if ( isset($_POST['product_id']) && isset($_POST['size_delete']) ) {
    
        $productId = $_POST['product_id'];
        $size = $_POST['size_delete'];
        echo $productId; 
        echo $userId;
        echo $size;
        // Gọi phương thức deleteProduct từ cart_model để xóa sản phẩm khỏi giỏ hàng
        $result = $cart_model->deleteProduct($userId, $productId, $size);

        // Xử lý kết quả và trả về phản hồi cho client
        if ($result) {
            echo "Product removed successfully!";
        } else {
            echo "Failed to remove product.";
        }
    }
}

$_SESSION['back_from_controller'] = true;
header("Location: $url/card");
exit;
