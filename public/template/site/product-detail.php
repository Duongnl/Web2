<?php
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

  function tinhGiaGiam($Giaban, $khuyenMai)
  {
    return $Giaban * (1 - $khuyenMai / 100);
  }
}
?>

<div class="chiTietMonHang_main container">
  <div class="row chiTietMonHang_SanPham">
    <div class="row col-sm-12 col-md-8 chiTietMonHang_SanPham_left mb-sm-4">
      <div class="chiTietMonHang_chiTietCacAnh  col-md-2 col-sm-12 ">
        <div class="row chiTietMonHang_chiTietCacAnh_Phu">
          <div class="col-3 col-md-12 chiTietMonHang_chiTietCacAnh_Anh p-0 ">
            <img src="<?php echo $url . $anhChinh["Url"] ?>" class="img-fluid img_cacAnh">
          </div>
          <div class="col-3 col-md-12 chiTietMonHang_chiTietCacAnh_Anh p-0"
            style="<?php echo $anhPhu1 && $anhPhu1["Url"] != "" ? "display:block" : "display:none" ?>">
            <img src="<?php echo $anhPhu1 && $anhPhu1["Url"] != "" ? $rootDirectory . $anhPhu1["Url"] : "" ?>"
              class="img-fluid img_cacAnh">
          </div>
          <div class="col-3 col-md-12 chiTietMonHang_chiTietCacAnh_Anh p-0"
            style="<?php echo $anhPhu2 && $anhPhu2["Url"] != "" ? "display:block" : "display:none" ?>">
            <img src="<?php echo $anhPhu2 && $anhPhu2["Url"] != "" ? $rootDirectory . $anhPhu2["Url"] : "" ?>"
              class="img-fluid img_cacAnh">
          </div>
          <div class="col-3 col-md-12 chiTietMonHang_chiTietCacAnh_Anh p-0"
            style="<?php echo $anhPhu3 && $anhPhu3["Url"] != "" ? "display:block" : "display:none" ?>">
            <img <?php echo $anhPhu3 && $anhPhu3["Url"] != "" ? 'src="' . $rootDirectory . $anhPhu3["Url"] . '"' : "" ?>
              class="img-fluid img_cacAnh">
          </div>
        </div>
      </div>
      <div class="chiTietMonHang_AnhChinh  col-md-9 col-sm-12 chiTietMonHang_SanPham_right">
        <img src="<?php echo $rootDirectory . $anhChinh["Url"] ?>" class="img-fluid img_anhChinh">
      </div>
    </div>
    <!-- thông tin -->
    <div class="chiTietMonHang_thongTin col-sm-12  col-md-4">
      <h1 class="chiTietMonHang_title pb" id="productName"><?php echo $product["TenSP"] ?></h1>
      <div class="chiTietMonHang_AnhChinh_price">
        <span class="new-price"><?php echo $product["MaKM"] != null ?
          number_format(tinhGiaGiam($product["GiaBan"], $product_model->getPhanTramKhuyenMai($product["MaKM"]))) . "đ"
          : number_format($product["GiaBan"]) . "đ" ?></span>
        <span
          class="old-price"><?php echo $product["MaKM"] != null ? number_format($product["GiaBan"]) . "đ" : "" ?></span>
      </div>
      <p class="product-description">
        <?php echo $product["MoTa"] ?>
      </p>
      <hr class="separator" />
      <div class="huongDanChonSize">
        <a href="">*Xem hướng dẫn chọn size</a>
      </div>
      <form action="<?php echo $rootDirectory . "/cart_controller" ?>" method="POST">
        <input type="text" hidden name="id" value="<?php echo $id ?>">
        <div class="chiTietMonHang_Size chonSize row">
          <div class="col-3 tag_size">Size:</div>
          <div class="col-9 d-flex gap-1 flex-wrap">
            <?php
            $flag = true;
            $maSize = "";
            foreach ($listconvert as $key => $value) {
              ?>
              <?php
              if($value["SoLuong"] != 0 && $flag) {
                $maSize = $value["MaSize"];
              }
              $check = $value["SoLuong"] == 0 ? "disabled" : ($flag ? "checked" . $flag = false : "");
              ?>
              <label for="size" class="label_Size <?php echo $check ?> ">
                <input type="radio" id="<?php echo $value["MaSize"] ?>" <?php echo $check ?> name="MaSize"
                  value="<?php echo $value["MaSize"] ?>" hidden>
                <?php echo $value["MaSize"] ?></label>
            <?php } ?>
          </div>
        </div>

        <div class="chiTietMonHang_soLuong row mt-3 justify-content-center">
          <div class="size-label col-xxl-3 col-3">Số lượng:</div>

          <div class="chiTietMonHang_thongTin_BUY_SoLuong col-xxl-9 col-9">
            <button type="button" id="decrease" class="btn_giamSoLuong">-</button>
            <div class="change-size">
              <input type="number" id="chiTietMonHang_thongTin_BUY_SoLuong" class="chiTietMonHang_thongTin_BUY_SoLuong"
                value="<?php echo $product["SoLuong"] == 0 ? "0" : "1" ?>" min="<?php echo $product["SoLuong"] == 0 ? "0" : "1" ?>" max="<?php echo $product_model->getSLSP($product["MaSP"],$maSize)?>" readonly name="SoLuong">
            </div>

            <button type="button" id="increase" class="btn_tangSoLuong">+</button>
          </div>
      </form>
      <div class=" col-12 chiTietMonHang_themVaoGioHang mt-4">
        <button type="submit" class="btn_ThemVaoGioHang" id="addToCartBtn" onclick="return validate()">Thêm vào giỏ hàng</button>
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
  <div class="bottom row">
    <?php
    $listProduct = $product_model->getSanPhamKhac($product["MaSP"]);
    while ($row = mysqli_fetch_array($listProduct)) {
      ?>
      <?php
      $ptKM = $row["MaKM"] != null ? $product_model->getPhanTramKhuyenMai($row["MaKM"]) : "";
      $giaMoi = $row["MaKM"] != null ? tinhGiaGiam($row["GiaBan"], $ptKM) : "";
      ?>
      <div class="col-6 col-sm-4 col-md-3 col-xxl-3">
        <div class="product">
          <a href="<?php echo $rootDirectory . "/product-detail?id=" . $row["MaSP"] ?>" class="wrap-img">
            <img class="img-product" src="<?php echo $rootDirectory . $product_model->getURLAnhChinh($row["MaAnhChinh"]) ?>">
            <div class="deal" style="<?php echo $row["MaKM"] != null ? "display:block" : "display:none" ?>">
              <?php echo $ptKM . "%" ?></div>
          </a>
          <div class="product-info">
            <div class="product-body">
              <a href="<?php echo $rootDirectory . "/product-detail?id=" . $row["MaSP"] ?>"
                class="product-title"><?php echo $row["TenSP"] ?></a>
              <div class="prices">
                <div class="new-price">
                  <?php echo $row["MaKM"] ? number_format($giaMoi) . "đ" : number_format($row["GiaBan"]) . "đ" ?></div>
                <div class="old-price"><?php echo $row["MaKM"] ? number_format($row["GiaBan"]) . "đ" : "" ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>

  </div>

</div>


</div>

<?php 
if(isset($_SESSION['add'])) {
  echo '<script>alert("Sản phẩm đã có trong giỏ hàng")</script>';
}
?>
</div>

<script>
  var url = window.location.href.split("admin")[0];
  console.log(`${url}admin/controller/product_controller`)


  document.querySelectorAll('.label_Size').forEach(function (element) {
    element.addEventListener('click', function (event) {
      var element = event.target;
      console.log(element.classList.length)
      if (element.classList.length == 1) {
        document.querySelector('.label_Size.checked').classList.remove('checked')
        element.classList.add('checked')
        document.querySelector('.label_Size.checked input[type="radio"]').checked = true
        var maSize = document.querySelector('.label_Size.checked input[type="radio"]').value
        console.log(maSize)
        $.ajax({
          type: "POST",
          url: '',
          data: {
             maSize
          }
        }).done(function (result) {
          $('.change-size').html(result)
        })
      }
    })
  })

  function validate() {
    var SoLuong = <?php echo $product["SoLuong"] ?>;
    var dangnhap = "<?php echo isset($_SESSION['MaTK']) ? $_SESSION['MaTK'] : "" ?>";
    if(dangnhap ==""){
      alert("Bạn cần đăng nhập");
      return false;
    }else{
      if (SoLuong == 0) {
        alert('Sản phẩm hết hàng!')
        return false;
      }
    }
    return true;
  }
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
<script src="./public/js/product-detail.js"></script>