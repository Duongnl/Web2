<?php
require_once ('../model/product_model.php');
require_once ('../../admin/model/db_config.php');

function tinhGiaGiam($Giaban, $khuyenMai)
{
  return $Giaban * (1 - $khuyenMai / 100);
}
if (isset($_POST['category']) && isset($_POST['startPrice']) && isset($_POST['endPrice']) && isset($_POST['sex']) && isset($_POST['size']) && isset($_POST['sale']) && isset($_POST['page']) && isset($_POST['tenSP']) && isset($_POST['rootDirectory'])) {
  if (isset($_POST['maDM']) && $_POST['maDM'] != '') {
    $category = $_POST['maDM'];
  } else {
    $category = $_POST['category'];
  }
  $startPrice = $_POST['startPrice'];
  $endPrice = $_POST['endPrice'];
  $sex = $_POST['sex'];
  $size = $_POST['size'];
  $sale = $_POST['sale'];
  $tenSP = $_POST['tenSP'];
  $rootDirectory = $_POST['rootDirectory'];
  $page = $_POST['page'];
  $fromIndex = 0;
  for ($i = 2; $i <= $page; $i++) {
    $fromIndex += 12;
  }

  $product_model = new product_model();
  $queryAllProduct = $product_model->filterAllProduct($category, $startPrice, $endPrice, $sex, $size, $sale, $tenSP);
  $row_conut = mysqli_num_rows($queryAllProduct);
  echo '<script>';
  echo 'var row_count = ' . json_encode($row_conut) . ';';
  echo '</script>';

  $query = $product_model->filterProduct($category, $startPrice, $endPrice, $sex, $size, $sale, $fromIndex, $tenSP);
  // $rootDirectory = '/Web2';
  while ($row = mysqli_fetch_array($query)) {
    $ptKM = $row["MaKM"] ? $product_model->getPhanTramKhuyenMai($row["MaKM"]) : null;
    $giaMoi =  $ptKM ? tinhGiaGiam($row["GiaBan"], $ptKM ):"";
    echo '
      <div class="col-6 col-sm-4 col-md-3 col-xxl-3">
        <div class="product">
          <a href="' . $rootDirectory . "/product-detail?id=" . $row["MaSP"] . '" class="wrap-img">
            <img class="img-product" src="' . $rootDirectory . $row["Url"] . '">
            <div class="deal" style="' . ( $ptKM  ? "display:block" : "display:none") . '">' . $row["PhanTramKM"] . "%" . '</div>
          </a>
          <div class="product-info">
            <div class="product-body">
              <a href="' . $rootDirectory . "/product-detail?id=" . $row["MaSP"] . '" class="product-title">' . $row["TenSP"] . '</a>
              <div class="prices">
                <div class="new-price">' . ( $ptKM ? number_format($giaMoi) . "đ" : number_format($row["GiaBan"]) . "đ") . '</div>
                <div class="old-price">' . ( $ptKM ? number_format($row["GiaBan"]) . "đ" : "") . '</div>
              </div>  
            </div>
          </div>
        </div>
      </div>
      ';
  }

}






