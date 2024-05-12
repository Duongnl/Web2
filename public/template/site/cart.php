<?php
$url = handle_url::getUrl();
?>
<div class="cart_form">
  <!-- <h4><a href="<?php //echo  $url; 
                    ?>" class="return_home">Home</a> / Cart</h4> -->
  <div class="cart_form-product">
    <!-- form -->
    <form action="<?php echo $url . '/cart_controller' ?>" method="POST" id="cart_form" class="cart_items">
      <div class="cart_table-item">
        <section class="product-list">
          <header class="product-list-header">
            <div class="product-list-header-row">
              <h5 class="product-name-header" style="width: 18%;  ">Product</h5>
              <div class="product-details-column">
                <h5 class="product-size-header">Size</h5>
                <h5 class="product-price-header">Price</h5>
                <h5 class="product-quantity-header">Quantity</h5>
                <h5 class="product-subtotal-header">Subtotal</h5>
                <h5 class="product-deleted-header">Deleted</h5>
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
          <?php
          if ($list != null) {
            foreach ($list as $key => $value) {
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
                      <p class="product-price" id="cost_product">$<?php echo $value['GiaBan'] ?></p>
                      <div class="change_quantity">

                        <input type="number" min="0" max="<?php echo $value['SoLuongSize'] ?>" value="<?php echo $value['SoLuong'] ?>" id="quantity_product" name="quantity[<?= $value['MaSP'] ?>][<?= $value['MaSize'] ?>]" class="input_quantity">

                      </div>
                      <p class="product-subtotal" id="product-total">
                        <span class="total_product">Total: </span>
                        <span>$</span>
                        <?php echo $value['GiaBan'] * $value['SoLuong'] ?>
                      </p>
                      <button type="submit"  class="trash" onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng?\n\nMaTK: <?php echo $value['MaTK'] ?>\nMaSP: <?php echo $value['MaSP'] ?>\nMaSize: <?php echo $value['MaSize'] ?>');">
                      <input type="hidden" id="action" name="action_deleted" value="delete_product">  
                      <i class="fa-solid fa-trash-can"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
          <?php }
          }
          ?>
        </section>
      </div>
      <div class="group_btn">
        <a class="group_btn-item" style="color: #000000 ; text-decoration: none;" href="<?php echo  $url; ?>">Return To Shop</a>
        <input type="submit" class="group_btn-item" id="update-cart-btn" value="Update Cart"></input>
      </div>
    </form>
    <div class="total_form">
      <!-- <div class="cart_coupon">
        <input type="hidden" placeholder="Coupon Code" style="height: 45px">
        <button class="btn-coupon">Apply Coupon</button>
      </div> -->
      <div class="cart_total">
        <div class="cart_form-product-order_info">
          <div class="product_cost">Total: <span>
              <?php
              $TongTien = 0;
              if ($list != null) {
                foreach ($list as $value) {
                  $TongTien += $value['SoLuong'] * $value['GiaBan'];
                }
              }
              echo number_format($TongTien, 0, ",", ".");
              ?>
              <span>$</span></span></div>
        </div>
        <?php
        if ($list != null) {
        ?>
          <a class="btn_pay" onclick="return confirm('Bạn có muốn thanh toán đơn hàng này?')" href="./template/XuLyThanhToan.php">Procees to checkout</a>
        <?php
        } else {

        ?>
          <a class="btn_pay" href="<?php echo  $url; ?>">Return to Shop</a>
        <?php
        }
        ?>
        <!-- <button class="btn_pay">Procees to checkout</button> -->

      </div>
    </div>
  </div>
</div>
<script>

</script>