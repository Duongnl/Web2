<?php
$product_model = new product_model();
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $product = mysqli_fetch_array($product_model->getSP($id));
  $listSize = $product_model->getSizeSP($id);
  $listconvert = array();
  foreach ($listSize as $list) {
    $item = [
      "MaSize" => $list['MaSize'],
      "SoLuong" => $list['SoLuong']
    ];
    $listconvert[] = $item;
  }
  $maAnh = $product["MaAnhChinh"];

  $anhChinh = mysqli_fetch_array($product_model->getMainImg($product['MaAnhChinh']));

  $listAnhPhu = $product_model->getSubImgs($product['MaAnhChinh']);

  $anhPhu1 = mysqli_fetch_array($listAnhPhu);
  $anhPhu2 = mysqli_fetch_array($listAnhPhu);
  $anhPhu3 = mysqli_fetch_array($listAnhPhu);
}
?>
<div class="chiTietMonHang_main container">
  <div class="row chiTietMonHang_SanPham">
    <div class="row col-sm-12 col-md-8 chiTietMonHang_SanPham_left mb-sm-4">
      <div class="chiTietMonHang_chiTietCacAnh  col-md-2 col-sm-12 ">
        <div class="row chiTietMonHang_chiTietCacAnh_Phu">
          <div class="col-3 col-md-12 chiTietMonHang_chiTietCacAnh_Anh p-0 ">
            <img src="<?php echo $rootDirectory . $anhChinh["Url"] ?>" class="img-fluid img_cacAnh" >
          </div>
          <div class="col-3 col-md-12 chiTietMonHang_chiTietCacAnh_Anh p-0"  style="<?php echo $anhPhu1 && $anhPhu1["Url"] != "" ? "display:block" : "display:none" ?>">
            <img src="<?php echo $anhPhu1 && $anhPhu1["Url"] != "" ? $rootDirectory . $anhPhu1["Url"] : "" ?>"
              class="img-fluid img_cacAnh">
          </div>
          <div class="col-3 col-md-12 chiTietMonHang_chiTietCacAnh_Anh p-0" style="<?php echo $anhPhu2 && $anhPhu2["Url"] != "" ? "display:block" : "display:none" ?>">
            <img src="<?php echo $anhPhu2 && $anhPhu2["Url"] != "" ? $rootDirectory . $anhPhu2["Url"] : "" ?>"
              class="img-fluid img_cacAnh">
          </div>
          <div class="col-3 col-md-12 chiTietMonHang_chiTietCacAnh_Anh p-0" style="<?php echo $anhPhu3 && $anhPhu3["Url"] != "" ? "display:block" : "display:none" ?>">
            <img <?php echo $anhPhu3 && $anhPhu3["Url"] != "" ? 'src="'.$rootDirectory . $anhPhu3["Url"].'"' : "" ?>
              class="img-fluid img_cacAnh">
          </div>
        </div>
      </div>
      <div class="chiTietMonHang_AnhChinh  col-md-9 col-sm-12 chiTietMonHang_SanPham_right">
        <img src="<?php echo $rootDirectory . $anhChinh["Url"] ?>" class="img-fluid img_anhChinh" >
      </div>
    </div>
    <!-- thông tin -->
    <div class="chiTietMonHang_thongTin col-sm-12  col-md-4">
      <h1 class="chiTietMonHang_title pb" id="productName"><?php echo $product["TenSP"] ?></h1>
      <div class="chiTietMonHang_AnhChinh_price">
        <span class="new-price"><?php echo $product["MaKM"] != null ? "" : number_format($product["GiaBan"])."đ" ?></span>
        <span class="old-price"><?php echo $product["MaKM"] != null ? number_format($product["GiaBan"])."đ" : "" ?></span>
      </div>
      <p class="product-description">
        <?php echo $product["MoTa"] ?>
      </p>
      <hr class="separator" />
      <div class="huongDanChonSize">
        <a href="">*Xem hướng dẫn chọn size</a>
      </div>
      <div class="chiTietMonHang_Size chonSize row">
        <div class="col-3 tag_size">Size:</div>
        <div class="col-9">
          <?php
          $flag = true;
          foreach ($listconvert as $key => $value) {
            ?>
            <input type="radio" id="<?php echo $value["MaSize"]?>" name="<?php echo $value["MaSize"]?>" value="<?php echo $value["SoLuong"]?>" 
              <?php echo $value["SoLuong"] == 0 ? "disable" : ($flag ? "checked".$flag=false : "") ?> class="size">
            <label for="<?php echo $value["MaSize"]?>" class="label_Size"><?php echo $value["MaSize"]?></label>
          <?php } ?>
        </div>
      </div>
      <div class="chiTietMonHang_soLuong row mt-3 justify-content-center">
        <div class="size-label col-xxl-3 col-3">Số lượng:</div>

        <div class="chiTietMonHang_thongTin_BUY_SoLuong col-xxl-9 col-9">
          <button id="decrease" class="btn_giamSoLuong">-</button>
          <input type="text" id="chiTietMonHang_thongTin_BUY_SoLuong" class="chiTietMonHang_thongTin_BUY_SoLuong"
            value="1" maxlength="" readonly>
          <button id="increase" class="btn_tangSoLuong">+</button>
        </div>
        <div class=" col-12 chiTietMonHang_themVaoGioHang mt-4">
          <button class="btn_ThemVaoGioHang" id="addToCartBtn">Thêm vào giỏ hàng</button>
        </div>
      </div>
      <div class="delivery-info">
        <div class="free-delivery">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/2a23f35277ec287bdea2870638bbdacf171666c11a657aa3e10b9901a2334e8b?apiKey=de754edacf6d4fbeaf990b709fcfe0b5&"
            alt="Free delivery icon" class="delivery-icon" />
          <div class="delivery-details">
            <div class="delivery-label">Free Delivery</div>
            <div class="delivery-input">
              Enter your postal code for Delivery
            </div>
          </div>
        </div>
        <hr class="delivery-separator" />
        <div class="return-policy">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/e8eb9d4232c5c4b5fb4e8c5b395d852ff88717160dc1ebc4089000daaa178e67?apiKey=de754edacf6d4fbeaf990b709fcfe0b5&"
            alt="Return policy icon" class="return-icon" />
          <div class="return-details">
            <div class="return-label">Return Delivery</div>
            <div class="return-description">
              Free 30 Days Delivery Returns.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- sản phẩm liên quan -->
  <div class="block other-products">
    <div class="top">
      <div class="left">
        <div class="title">
          Sản phẩm khác
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6 col-sm-4 col-md-3 col-xxl-3">
        <div class="product">
          <a href="/Web2/product-detail?id=16" class="wrap-img">
            <img class="img-product" src="/Web2/upload/products/MSO020S4-2-E03 -quan-short-1.jpeg">
            <div class="deal" style="display:none"></div>
          </a>
          <div class="product-info">
            <div class="product-body">
              <a href="/Web2/product-detail?id=16" class="product-title">Quần short đũi nam MSO020S4</a>
              <div class="prices">
                <div class="new-price">550,000đ</div>
                <div class="old-price"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-md-3 col-xxl-3">
        <div class="product">
          <a href="/Web2/product-detail?id=17" class="wrap-img">
            <img class="img-product" src="/Web2/upload/products/mpu002s4-2-b03-ao-polo-1jpg_1715245223.jpg">
            <div class="deal" style="display:none"></div>
          </a>
          <div class="product-info">
            <div class="product-body">
              <a href="/Web2/product-detail?id=17" class="product-title">Áo polo nam cao cấp MPU002S4</a>
              <div class="prices">
                <div class="new-price">399,000đ</div>
                <div class="old-price"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-md-3 col-xxl-3">
        <div class="product">
          <a href="/Web2/product-detail?id=13" class="wrap-img">
            <img class="img-product" src="/Web2/upload/products/img.png">
            <div class="deal" style="display:none"></div>
          </a>
          <div class="product-info">
            <div class="product-body">
              <a href="/Web2/product-detail?id=13" class="product-title">The black T-shirt</a>
              <div class="prices">
                <div class="new-price">4,000,000đ</div>
                <div class="old-price"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-md-3 col-xxl-3">
        <div class="product">
          <a href="/Web2/product-detail?id=14" class="wrap-img">
            <img class="img-product" src="/Web2/upload/products/arsenal1.jpg">
            <div class="deal" style="display:none"></div>
          </a>
          <div class="product-info">
            <div class="product-body">
              <a href="/Web2/product-detail?id=14" class="product-title">Arsenal premium</a>
              <div class="prices">
                <div class="new-price">99,000đ</div>
                <div class="old-price"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


</div>
</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
<script src="./public/js/product-detail.js"></script>
