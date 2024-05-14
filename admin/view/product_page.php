<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity=" sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin=" anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?php echo $rootDirectory . "/system/library/style.min.css" ?>">

  <script src=<?php echo $rootDirectory . "/system/library/jquery-3.7.1.min.js" ?>></script>
  <script src=<?php echo $rootDirectory . "/system/library/simple-datatables.min.js" ?>></script>
</head>

<body>
  <?php
  require_once ('./admin/model/db_config.php');
  require_once ('./admin/model/product_model.php');
  require ('./public/template/admin/admin.php');
  require ('./public/template/admin/product.php');
  ?>
</body>

</html>