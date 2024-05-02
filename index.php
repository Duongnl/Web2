<?php
require './site/controller/handle_url.php';
$folder_name = handle_url::getParent_Index();
$request = $_SERVER['REQUEST_URI'];
$userView = '/site/view/';
$baseName = basename($request);
switch ($baseName) {
  case $folder_name:
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
  default:
    # code... page 404
    break;
}


?>