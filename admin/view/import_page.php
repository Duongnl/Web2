<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity=" sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin=" anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" type="text/css" href="../system/library/bootstrap.min.css">
    <script src="../system/library/bootstrap.bundle.min.js" ></script>
    
</head>
<body>
    <?php 
          require_once('./admin/model/db_config.php');
          require_once('./admin/model/import_model.php');
          require_once('./admin/model/phanquyen_model.php');
          require_once('./admin/model/supplier_model.php');
          require('./public/template/admin/admin.php'); 
          require('./public/template/admin/import.php'); 
    ?>
</body>
</html>