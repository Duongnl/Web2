<?php
$url = handle_url::getUrl();
?>
<div class="cart_form">
  <!-- <h4><a href="<?php //echo  $url; 
                    ?>" class="return_home">Home</a> / Cart</h4> -->
  <div class="cart_form-product">
    <!-- form -->
    <div class="cart_items">
      <div class="cart_table-item">
        <section class="product-list">
          <header class="product-list-header">
            <div class="product-list-header-row">
              <h5 class="product-name-header" style="width: 18%;  ">Sản phẩm</h5>
              <div class="product-details-column">
                <h5 class="product-size-header">Size</h5>
                <h5 class="product-price-header">Đơn giá</h5>
                <h5 class="product-price-header">Giá giảm</h5>
                <h5 class="product-quantity-header">Số lượng</h5>
                <h5 class="product-subtotal-header">Tổng tiền</h5>
                <h5 class="product-deleted-header">Thao tác</h5>
              </div>
            </div>
          </header>
          <?php
          $list = null;
          $model = new cart_model();
          if (isset($_SESSION['MaTK'])) {
            $maTK = $_SESSION['MaTK'];
            $list = $model->getCartDetails($maTK);
          } else {
            $maTK = NULL;
          }
          ?>
          <!-- while ($row = mysqli_fetch_array($query)) { -->
          <form action="<?php echo $url . '/cart_controller' ?>" method="POST" id="cart_form">
            <?php
            if ($list != null) {
              foreach ($list as $key => $value) {
                $query = $model->getDiscountedPrice($value['MaSP']);
                $row =  mysqli_fetch_array($query);
            ?>
                <div class="product-item">
                  <input type="hidden" id="action" name="action" value="update_quantity">
                  <input type="hidden" id="user_id" name="user_id" value="<?php echo  $value['MaTK'] ?>">
                  <input type="hidden" id="product_id" name="product_id" value="<?php echo  $value['MaSP'] ?>">
                  <div class="product-item-row">
                    <div class="product-info-column">
                      <div class="product-info">
                        <img src="<?php echo $value['Url'] ?>" id="img_product" alt="LCD Monitor" class="product-image" />
                        <h6 class="product-name" id="name_product"><?php echo $value['TenSP'] ?></h6>
                      </div>
                    </div>
                    <div class="product-details-column">
                      <div class="product-details">
                        <input type="hidden" id="product_id" name="size_delete" value="<?php echo  $value['MaSize'] ?>">
                        <p class="product-price size" id="size_product" name="size[<?= $value['MaSP'] ?>]"><?php echo $value['MaSize'] ?></p>
                        <p class="product-price" id="cost_product"><?php echo $value['GiaBan'] ?> đ</p>
                        <p class="product-price" id="product-price_reduce"><?php if ($row['GiaBanSauKM'] != "") {
                                                                              echo $row['GiaBanSauKM'] . 'đ';
                                                                            }  ?> </p>
                        <div class="change_quantity">
                          <input type="number" min="0" max="<?php echo $value['SoLuongSize'] ?>" value="<?php echo $value['SoLuong'] ?>" id="quantity_product" name="quantity[<?= $value['MaSP'] ?>][<?= $value['MaSize'] ?>]" class="input_quantity">
                        </div>
                        <p class="product-subtotal" id="product-total">
                          <span class="total_product">Tổng tiền: </span>
                          <?php if ($row['GiaBanSauKM'] != "") {
                            echo number_format($row['GiaBanSauKM'] * $value['SoLuong'], 0, ",", ".");
                          } else {
                            echo number_format($value['GiaBan'] * $value['SoLuong'], 0, ",", ".");
                          }  ?>
                          <span>đ</span>
                        </p>
                        <a onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng?\n\nMaTK: <?php echo $value['MaTK'] ?>\nMaSP: <?php echo $value['MaSP'] ?>\nMaSize: <?php echo $value['MaSize'] ?>');" href="<?php echo $url . '/cart_controller' ?>?action=deleted&MaSP=<?php echo $value['MaSP'] ?>&MaSize=<?php echo  $value['MaSize'] ?>">
                          <button type="button" class="trash"><i class="fa-solid fa-trash-can"></i></button>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
            <?php }
            }
            ?>
            <div class="group_btn">
              <a class="group_btn-item" style="color: #000000 ; text-decoration: none;" href="<?php echo  $url; ?>">Mua tiếp</a>
              <input type="submit" class="group_btn-item" id="update-cart-btn" value="Cập nhật giỏ hàng"></input>
            </div>
          </form>
        </section>
      </div>
    </div>
    <div class="total_form">
      <div class="cart_total">
        <form action="<?php echo $url . '/cart_controller' ?>" method="POST" class="cart_form-product-order_info">
          <input type="hidden" id="thanhtoan" name="thanhtoan" value="thanhtoan_tongtien">
          <input type="hidden" id="user_id" name="userid" value="<?php echo  $value['MaTK'] ?>">
          <input type="hidden" id="product_id" name="productid" value="<?php echo  $value['MaSP'] ?>">
          <input type="hidden" id="giaban" name="GiaBanKM" value="<?php if ($row['GiaBanSauKM'] != "") {
                            echo $row['GiaBanSauKM'];
                          } else {
                            echo $value['GiaBan'] ;
                          }  ?>">
          
          <div class="product_cost">Tổng tiền: <span>
            <?php
              $TongTien = 0;
              if ($list != null) {
                foreach ($list as $value) {
                  $query = $model->getDiscountedPrice($value['MaSP']);
                  $row =  mysqli_fetch_array($query);
                  // $TongTien += $value['SoLuong'] * $row['GiaBanSauKM'];
                  if ($row['GiaBanSauKM'] != "") {
                    $TongTien += $value['SoLuong'] * $row['GiaBanSauKM'];
                  } else {
                    $TongTien += $value['SoLuong'] * $value['GiaBan'];
                  } 
                }
              }
              echo number_format($TongTien, 0, ",", ".");
              ?>
              <span>đ</span></span>
          </div>
          <?php
          if ($list != null) {
          ?>
            <input type="submit" class="btn_pay" value="Đặt Hàng" onclick="return confirmAndReset();"></input>
          <?php
          } else {
          ?>
            <a class="btn_pay" href="<?php echo  $url; ?>">Trở lại</a>
          <?php
          }
          ?>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
    function confirmAndReset() {
        var confirmed = confirm('Bạn có muốn thanh toán đơn hàng này?');
        if (confirmed) {
            <?php $list = null; ?> // Đặt biến $list về null
            return true; // Tiếp tục submit form
        } else {
            return false; // Ngăn không submit form
        }
    }
</script>