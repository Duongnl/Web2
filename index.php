
<?php
require './site/controller/handle_url.php';
// $folder_name = handle_url::getParent_Index();
// $request = $_SERVER['REQUEST_URI'];
// $userView = '/site/view/';
$userController = '/site/controller/';
// $baseName = basename($request);
$request = $_SERVER['REQUEST_URI'];
$url = parse_url($request)["path"];
$userView = '/site/view/';
$rootDirectory = handle_url::getUrl();
$baseName = explode($rootDirectory . '/', $url)[1];
switch ($baseName) {
  case '/':
  case '':
      require __DIR__ . $userView . 'home.php';
      break;
  case 'product':
    require __DIR__ . $userView . 'product-page.php';
    break;
  case 'product-detail':
    require __DIR__ . $userView . 'product-detail-page.php';
    break;
  case 'login':
    require __DIR__ . $userView . 'login-register-page.php';
    break;
  case 'forgot':
    require __DIR__ . $userView . 'forgot-input-email-page.php';
  case 'card':
    require __DIR__ . $userView . 'card-page.php';
    break;
  case 'account':
    require __DIR__ . $userView . 'account-page.php';
    break;
  case 'cart-detail':
    require __DIR__ . $userView . 'cart-detail-page.php';
    break;
  case 'account_controller':
    require __DIR__ . $userController . 'account_controller.php';
    break;
  case 'cart_controller':
    require __DIR__ . $userController . 'cart_controller.php';
    break;
  case 'account_model':
    require __DIR__ . $userModel . 'account_model.php';
    break;
  default:
    # code... page 404
    break;
}


?>
