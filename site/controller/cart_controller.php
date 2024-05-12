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
                   // echo $_POST['quantity'];
                    
                    // Gọi phương thức updateQuantityWithSize từ cart_model để cập nhật số lượng sản phẩm
                    $result = $cart_model->updateQuantity($userId, $productId, $newQuantity, $size);
                }
            }
        }
        
    }
    
}

if (isset($_POST['action_deleted']) && $_POST['action_deleted'] == 'delete_product') {
    // Kiểm tra xem dữ liệu gửi đi có chứa product_id không
    $userId = $_POST["user_id"];

    
    if ( isset($_POST['product_id']) && isset($_POST['size_delete']) ) {
    
        $productId = $_POST['product_id'];
        $size = $_POST['size_delete'];

        echo $userId;
        echo $productId;
        echo $size;

        $cart_model = new cart_model();
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