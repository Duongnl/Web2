<?php require_once('./admin/model/db_config.php');
  require_once('./site/model/product-detail_model.php');?>
  <?php require_once('./admin/model/db_config.php');
  require_once('./admin/model/category_model.php');
  require_once('./admin/model/product_model.php');
  ?>
<?php 
   $product_model = new product_model();
   if(isset($_POST['maSize']) && isset($_GET["id"])){
    $sl = $product_model->getSLSP($_GET["id"],$_POST['maSize']);
    echo '
    <input type="number" id="chiTietMonHang_thongTin_BUY_SoLuong" class="chiTietMonHang_thongTin_BUY_SoLuong"
      value="1" min="1" max="'.$sl.'" name="SoLuong">';
    exit;
}?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
 
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity=" sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin=" anonymous" referrerpolicy="no-referrer" />

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <link rel="stylesheet" href="./public/css/head.css">
  <link rel="stylesheet" href="./public/css/product-detail.css">
  <link rel="stylesheet" href="./public/css/home.css">
  <link rel="stylesheet" href="./public/css/footer.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="./system/library/bootstrap.min.css">
  <script src="./system/library/bootstrap.bundle.min.js" ></script>
  <script src=<?php echo $rootDirectory . "/system/library/jquery-3.7.1.min.js" ?>></script>

</head>

<body>
 
  <?php require('./public/template/site/head.php'); ?>
  <?php require('./public/template/site/product-detail.php'); ?>
  <?php require('./public/template/site/footer.php'); ?>
  </div>
  </div>
</body>

</html>