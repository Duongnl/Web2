<?php 
  session_start();
  $request = $_SERVER['REQUEST_URI'];
  $userView = '/site/view/';
  $baseName = basename($request);
  // Kiểm tra nếu session chưa có giá trị
  if (!isset($_SESSION['origin_path'])) {
      // Lấy giá trị $_SERVER['REQUEST_URI'] lần đầu tiên
      $_SESSION['origin_path'] = $_SERVER['REQUEST_URI'];
  }
    switch ($baseName) {
      case 'Web2':
        require __DIR__.$userView.'home.php';
        break;
      case 'product':
        require __DIR__.$userView.'product-page.php';
        break;
      case 'product-detail':
        require __DIR__.$userView.'product-detail-page.php';
        break;
      case 'login':
        require __DIR__.$userView.'login-register-page.php';
        break;
      case 'forget':
        require __DIR__.$userView.'forgot-input-email-page.php';
      case 'cart':
        require __DIR__.$userView.'card-page.php';
        break;
      default:
        # code... page 404
        break;
    }


 ?>