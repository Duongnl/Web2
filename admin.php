<?php
require './site/controller/handle_url.php';
$request = $_SERVER['REQUEST_URI'];
$adminView = '/admin/view/';
$adminController = '/admin/controller/';
$baseName = basename($request);
switch ($baseName) {
    case 'statistic':
        require __DIR__ . $adminView . 'statistic_page.php';
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
        require __DIR__ . $adminView . 'staff_page.php';
    case 'client':
        require __DIR__ . $adminView . 'client_page.php';
        break;
    case 'permisson':
        require __DIR__ . $adminView . 'permission_page.php';
        break;
    case 'order':
        require __DIR__ . $adminView . 'order_page.php';
        break;
    case 'import':
        require __DIR__ . $adminView . 'import_page.php';
        break;
    case 'import_form':
        require __DIR__ . $adminView . 'import_form_page.php';
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
    default:

        break;
}


?>