<?php session_start();
require_once ('./admin/model/product_model.php');
require_once ('./admin/model/db_config.php');
$request = $_SERVER['REQUEST_URI'];
$url = handle_url::getURLAdmin($request);


// $limit = 8;
// $pageSize = ceil(mysqli_num_rows($list) / $limit);
if (isset($_POST["method"])) {
  $method = $_POST['method'];
  $product_model = new product_model();

  switch ($method) {
    case 'GET':
        getData($product_model);
      break;
    case 'POST':
      addProduct($rootPath, $product_model, $url);
      break;
    case 'PUT':
      updateProduct($rootPath, $product_model, $url);
      break;
    case 'DELETE':
      $id = $_POST['id'];
      $sl = $_POST['sl'];
      if ($sl == 0) {
        $rs = $product_model->deleteProduct($id);
        echo "Xóa thành công!";
      } else {
        echo "Xóa thất bại do số lượng > 0 ";
      }
      break;
  }
}

//   $action = $_POST['action'];
//   switch ($action) {
//     case 'add':
//       
//       break;
//     case 'edit':
//       break;
//     case 'view':
//       break;
//     case 'delete':
//       break;
//   }
// }

function getData($product_model)
{
  $data = array();
  $pagesize = 8;
  $products = $product_model->getProducts();
  $rowCount = mysqli_num_rows($products);
  $pageCount = ceil($rowCount / $pagesize);

  while ($row = mysqli_fetch_array($products)) {
    $row["DanhMuc"] = $product_model->getCategory($row["MaDM"]);
    $row["KhuyenMai"] = $product_model->getSale($row["MaKM"]);
    $row["AnhChinh"] = $product_model->getURLAnhChinh($row["MaAnhChinh"]);
    $data[] = $row;
  }

  echo json_encode(array("data" => $data, "pageCount" => $pageCount));
}

function updateProduct($rootPath, $product_model, $url)
{
  $flag = true;
  if (
    (isset($_GET['id']) && isset($_POST['product-name']) && isset($_POST['product-category']) && isset($_POST['product-price'])
      && isset($_POST['product-desc']) && isset($_POST['product-sale']) && isset($_POST['product-sex'])
    )
  ) {
    $product_id = $_GET['id'];
    $productName = $_POST['product-name'];
    $productCategory = $_POST['product-category'];
    $productPrice = $_POST['product-price'];
    $productDesc = $_POST['product-desc'];
    $productSale = $_POST['product-sale'];
    if ($productSale == "") {
      $productSale = null;
    }
    $productSex = $_POST['product-sex'];

    // update product
    $rs = $product_model->updateProduct($product_id, $productSale, $productCategory, $productName, $productDesc, $productPrice, $productSex);
    if (!$rs) {
      $flag = false;
    }
    // update size
    $product_model->deleteAllSize($product_id);
    $sizeArray = $_POST['ArraySize'];
    $sizeQuantity = $_POST['ArrayQuantity'];
    for ($i = 0; $i < count($sizeArray); $i++) {
      addSize($product_id, $sizeArray[$i], $sizeQuantity[$i], $product_model);
    }

    //update img
    updateMainImg($rootPath, $product_model);

    //update sub imgs
    updateSubImgs($rootPath, $product_model);


    if ($flag) {
      $_SESSION["back-from-controller"] = "update";
      $_SESSION["update-success"] = true;
      header('Location: ' . $url . '/product');
    } else {
      $_SESSION["back-from-controller"] = "update";
      $_SESSION["update-fail"] = true;
      header('Location: ' . $url . '/product/edit?id=' . $product_id);
    }
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
          addSize($productID, $sizeArray[$i], $sizeQuantity[$i], $product_model);
        }

      } else {
        $flag = false;
      }
    }

  }


  if ($flag) {
    $_SESSION["back-from-controller"] = "add";
    $_SESSION["add-success"] = true;
    header('Location: ' . $url . '/product');
  } else {
    $_SESSION["back-from-controller"] = "add";
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

function updateMainImg($rootPath, $product_model)
{
  $idMainImg = $_POST['maAnhChinh'];
  $url = uploadImage('image-upload', $rootPath);
  if ($url != "") {
    $product_model->updateMainImg($idMainImg, $url);
  }
}

function updateSubImgs($rootPath, $product_model)
{
  $idMainImg = $_POST['maAnhChinh'];
  $url1 = uploadImage('sub-image-upload-1', $rootPath);
  $url2 = uploadImage('sub-image-upload-2', $rootPath);
  $url3 = uploadImage('sub-image-upload-3', $rootPath);
  if (isset($_POST['anhPhu1']) && $_POST['anhPhu1'] != "") {
    if (($url1 == "" && $_POST["selected-img-1"] == 'false') || $url1 != "") {
      $product_model->updateSubImg($_POST['anhPhu1'], $url1);
    }
  } else {
    if ($url1 != "") {
      $product_model->addSubImg($idMainImg, $url1);
    }
  }

  if (isset($_POST['anhPhu2']) && $_POST['anhPhu2'] != "") {
    if (($url2 == "" && $_POST["selected-img-2"] == 'false') || $url2 != "") {
      $product_model->updateSubImg($_POST['anhPhu2'], $url2);
    }
  } else {
    if ($url2 != "") {
      $product_model->addSubImg($idMainImg, $url2);
    }
  }

  if (isset($_POST['anhPhu3']) && $_POST['anhPhu3'] != "") {
    if (($url3 == "" && $_POST["selected-img-3"] == 'false') || $url3 != "") {
      $product_model->updateSubImg($_POST['anhPhu3'], $url3);
    }
  } else {
    if ($url3 != "") {
      $product_model->addSubImg($idMainImg, $url3);
    }
  }
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