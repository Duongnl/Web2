<div class="cart_form">
  <h4><a href="" class="return_home">Home</a> / Cart</h4>
  <div class="cart_form-product">
    <div class="cart_items">
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
          
          <form class="product-item">
            <div class="product-item-row">
              <div class="product-info-column">
                <div class="product-info">
                  <img src="./public/images/arsenal1.jpg" alt="LCD Monitor" class="product-image" />
                  <h6 class="product-name">LCD Monitor</h6>
                </div>
              </div>
              <div class="product-details-column">
                <div class="product-details">
                  <p class="product-price size"><span class="size_product">Size: </span>M</p>
                  <p class="product-price">$650</p>
                  <div class="change_quantity"><button class="reduce">-</button><input type="text" min="0" value="1" class="input_quantity"><button class="increase">+</button></div>
                  <p class="product-subtotal"><span class="total_product">Total: </span><span>$</span>650</p>
                  <button class="trash"><i class="fa-solid fa-trash-can"></i></button>
                </div>
              </div>
            </div>
          </form>
          <form class="product-item">
            <div class="product-item-row">
              <div class="product-info-column">
                <div class="product-info">
                  <img src="./public/images/arsenal1.jpg" alt="LCD Monitor" class="product-image" />
                  <h6 class="product-name">LCD Monitor</h6>
                </div>
              </div>
              <div class="product-details-column">
                <div class="product-details">
                  <p class="product-price size"><span class="size_product">Size: </span>M</p>
                  <p class="product-price">$650</p>
                  <div class="change_quantity"><button class="reduce">-</button><input type="text" min="0" value="1" class="input_quantity"><button class="increase">+</button></div>
                  <p class="product-subtotal"><span class="total_product">Total: </span><span>$</span>650</p>
                  <button class="trash"><i class="fa-solid fa-trash-can"></i></button>
                </div>
              </div>
            </div>
          </form>
        </section>
      </div>
      <div class="group_btn">
        <button class="group_btn-item">Return To Shop</button>
        <button class="group_btn-item">Update Cart</button>
      </div>
    </div>
    <div class="total_form">
      <div class="cart_coupon">
        <input type="text" placeholder="Coupon Code" style="height: 45px">
        <button class="btn-coupon">Apply Coupon</button>
      </div>
      <div class="cart_total">
        <div class="cart_form-product-order_info">
          <div class="product_cost">Subtotal: <span>20<span>$</span></span></div>
          <div class="product_cost product_cost-ship">Shipping: <span>15<span>$</span></span></div>
          <div class="product_cost total">Total: <span>35<span>$</span></span></div>
        </div>
        <button class="btn_pay">Procees to checkout</button>
      </div>
    </div>
  </div>
</div>
<script>
  // Lấy tất cả các button có class là "reduce" và "increase"
  const reduceButtons = document.querySelectorAll('.reduce');
  const increaseButtons = document.querySelectorAll('.increase');

  // Lặp qua từng button "Tăng" và thêm sự kiện click
  increaseButtons.forEach(button => {
    button.addEventListener('click', () => {
      // Lấy ô input tương ứng với button được click
      const input = button.parentNode.querySelector('input[type="text"]');
      // Tăng giá trị của ô input lên 1 đơn vị nếu giá trị hiện tại nhỏ hơn giá trị tối đa (nếu có)
      if (input.value < input.max || !input.hasAttribute('max')) {
        input.value = parseInt(input.value) + 1;
      }
    });
  });

  // Lặp qua từng button "Giảm" và thêm sự kiện click
  reduceButtons.forEach(button => {
    button.addEventListener('click', () => {
      // Lấy ô input tương ứng với button được click
      const input = button.parentNode.querySelector('input[type="text"]');
      // Giảm giá trị của ô input đi 1 đơn vị nếu giá trị hiện tại lớn hơn giá trị tối thiểu (nếu có)
      if (input.value > input.min || !input.hasAttribute('min')) {
        input.value = parseInt(input.value) - 1;
      }
    });
  });
</script>