<?php 
  $request = $_SERVER['REQUEST_URI'];
    $userView = '/site/view/';
    $dir = '/'.basename(__DIR__);
    switch ($request) {
      case $dir.'':
      case $dir.'/':
        require __DIR__.$userView.'home.php';
        break;
      case $dir.'/product':
        require __DIR__.$userView.'product-page.php';
        break;
      case $dir.'/product-detail':
        require __DIR__.$userView.'product-detail-page.php';
        break;
      case $dir.'/login':
        require __DIR__.$userView.'login-register-page.php';
        break;
      case $dir.'/forget':
        require __DIR__.$userView.'forgot-input-email-page.php';
      case $dir.'/cart':
        require __DIR__.$userView.'card-page.php';
        break;
      default:
        # code... page 404
        break;
    }
 ?>