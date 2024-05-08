<?php session_start();

require_once ('./admin/model/product_model.php');
require_once ('./admin/model/db_config.php');
$request = $_SERVER['REQUEST_URI'];
$url = handle_url::getURLAdmin($request);

if (isset($_POST['action'])) {

  $product_model = new product_model();
  $action = $_POST['action'];
  switch ($action) {
    case 'add':
      addProduct($rootPath, $product_model, $url);
      break;
    case 'edit':
      break;
    case 'view':
      break;
    case 'delete':
      break;
  }
}


function addProduct($rootPath, $product_model, $url)
{
  $flag = true;
  $idImg = addMainImg($rootPath, $product_model);
  if ($idImg == -1) {
    $flag = false;
  } else {
    //add anh phụ
    addSubImgs($rootPath, $product_model, $idImg);
    // add sp
    if (
      (isset($_POST['product-name']) && isset($_POST['product-category']) && isset($_POST['product-price'])
        && isset($_POST['product-desc']) && isset($_POST['product-sale']) && isset($_POST['product-sex'])
      )
    ) {
      $productName = $_POST['product-name'];
      $productCategory = $_POST['product-category'];
      $productPrice = $_POST['product-price'];
      $productDesc = $_POST['product-desc'];
      $productSale = $_POST['product-sale'];
      if ($productSale == "") {
        $productSale = null;
      }
      $productSex = $_POST['product-sex'];
      $productID = $product_model->insertProduct($idImg, $productSale, $productCategory, $productName, $productDesc, $productPrice, $productSex);

      // add size
      if ($productID != -1 && isset($_POST['ArraySize']) && isset($_POST['ArrayQuantity'])) {
        $sizeArray = $_POST['ArraySize'];
        $sizeQuantity = $_POST['ArrayQuantity'];
        for ($i = 0; $i < count($sizeArray); $i++) {
          addSize($productID, $sizeArray[$i], $sizeQuantity, $product_model);
        }

      } else {
        $flag = false;
      }
    }

  }


  if ($flag) {
    $_SESSION["add-success"] = true;
    header('Location: ' . $url . '/product');
  } else {
    $_SESSION["add-fail"] = true;
    header('Location: ' . $url . '/product/add');
  }
}

function addMainImg($rootPath, $product_model)
{
  $url = uploadImage('image-upload', $rootPath);
  if ($url != "") {
    $id = $product_model->addMainImg($url);
    if ($id != -1) {
      return $id;
    }
  }
  return -1;
}

function addSize($idProduct, $size, $quantity, $product_model)
{
  $product_model->addSize($idProduct, $size, $quantity);
}

function addSubImgs($rootPath, $product_model, $idMainImg)
{
  $url1 = uploadImage('sub-image-upload-1', $rootPath);
  $url2 = uploadImage('sub-image-upload-2', $rootPath);
  $url3 = uploadImage('sub-image-upload-3', $rootPath);
  if ($url1 != "") {
    $product_model->addSubImg($idMainImg, $url1);
  }
  if ($url2 != "") {
    $product_model->addSubImg($idMainImg, $url2);
  }
  if ($url3 != "") {
    $product_model->addSubImg($idMainImg, $url3);
  }
}


function uploadImage($key, $rootPath)
{
  if (validateImage(($key))) {

    $name = pathinfo($_FILES[$key]['name'], PATHINFO_FILENAME);
    $extension = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
    $increment = '';

    while (file_exists($name . $increment . '.' . $extension)) {
      $increment++;
    }

    $filename = $name . $increment . '.' . $extension;
    $filePath = '/upload/products/' . $filename;
    move_uploaded_file(
      $_FILES[$key]["tmp_name"],
      $rootPath . $filePath
    );
    return $filePath;
  } else {
    return "";
  }
}

function validateImage($name)
{

  if (
    (($_FILES[$name]["type"] == "image/gif") || ($_FILES[$name]["type"] == "image/jpeg")
      || ($_FILES[$name]["type"] == "image/pjpeg") || $_FILES[$name]["type"] == "image/png") && ($_FILES[$name]["size"] < 2 * 1024 * 1024)
  ) {
    if ($_FILES[$name]["error"] > 0) {
      return false;
    } else {
      return true;
    }
  } else {
    return false;
  }
}


?>