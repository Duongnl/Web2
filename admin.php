
<?php
require './site/controller/handle_url.php';
$request = $_SERVER['REQUEST_URI'];
$adminView = '/admin/view/';
$adminController = '/admin/controller/';
// $baseName = basename($request);

$url = parse_url($request)["path"];
$toAdmin = handle_url::getURLAdmin($request);
$baseName = explode($toAdmin . '/', $url)[1];

switch ($baseName) {
    case 'statistic':
        require __DIR__ . $adminView . 'thong_ke_page.php';
        break;
    case 'product':
        require __DIR__ . $adminView . 'product_page.php';
        break;
    case 'category':
        require __DIR__ . $adminView . 'category_page.php';
        break;
    case 'discount':
        require __DIR__ . $adminView . 'discount_page.php';
        break;
    case 'supplier':
        require __DIR__ . $adminView . 'supplier_page.php';
        break;
    case 'staff':
        require __DIR__ . $adminView . 'staff_manager_page.php';
        break;
    case 'guest':
        require __DIR__ . $adminView . 'guest_page.php';
        break;
    case 'permission':
        require __DIR__ . $adminView . 'permission_page.php';
        break;
    case 'order':
        require __DIR__ . $adminView . 'quanLyDonHang_page.php';
        break;
    case 'order_form':
        require __DIR__ . $adminView . 'chiTietDonHang_page.php';
        break;  
    case 'import':
        require __DIR__ . $adminView . 'import_page.php';
        break;
    case 'import_form':
        require __DIR__ . $adminView . 'import_form_page.php';
        break;
    case 'import_detail':
        require __DIR__ . $adminView . 'import_detail_page.php';
        break;
    case 'supplier_controller':
        require __DIR__ . $adminController . 'supplier_controller.php';
        break;
    case 'discount_controller':
        require __DIR__ . $adminController . 'discount_controller.php';
        break;
    case 'category_controller':
        require __DIR__ . $adminController . 'category_controller.php';
        break;
    case 'import_controller':
        require __DIR__ . $adminController . 'import_controller.php';
        break;
    case 'order_controller':
        require __DIR__ . $adminController . 'quanLyDonHang_controller.php';
        break;
    case 'staff_controller':
        require __DIR__ . $adminController . 'staff_manager_controller.php';
        break;
    case 'guest_controller':
        require __DIR__ . $adminController . 'guest_controller.php';
        break;
    case 'permission_controller':
        require __DIR__ . $adminController . 'permission_controller.php';
        break;
    case 'permission_details':
        require __DIR__ . $adminView . 'permission_details_page.php';
        break;

    default:

        break;
}


?>
