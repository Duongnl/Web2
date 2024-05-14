<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="./public/css/head.css">
  <link rel="stylesheet" href="./public/css/cart-detail.css">
  <link rel="stylesheet" href="./public/css/footer.css">
  <link rel="stylesheet" type="text/css" href="./system/library/bootstrap.min.css">
  <script src="./system/library/bootstrap.bundle.min.js" ></script>
</head>

<body>
  <?php
     require_once('./admin/model/db_config.php');
     require_once('./site/model/donHangUser_model.php');
     require_once('./site/model/chiTietDonHangUser_model.php');
  ?>
  <div id="header">
    <?php require('./public/template/site/head.php'); ?>
  </div>
  <div id="content">
    <?php require('./public/template/site/donHang_user.php'); ?>
  </div>
  <div id="footer">
    <?php require('./public/template/site/footer.php'); ?>
  </div>
</body>

</html>