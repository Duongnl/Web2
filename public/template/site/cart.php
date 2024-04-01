<link rel="stylesheet" href="../../public/css/cart.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<div class="cart_form">
    <div class="cart_form-product">
        <div class="cart_form-product-1">
            <h4><a href="">Home</a> / Cart</h4>
            <div class="product_item-content">
                <table class="table table_product">
                    <thead>
                        <tr>
                            <th scope="col">Img</th>
                            <th scope="col">Name Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Deleted</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="../../public/images/arsenal1.jpg" alt="" width="50px"></td>
                            <td>Áo đá bóng <div class="size">Size: M</div>
                            </td>
                            <td><span>180</span>$</td>
                            <td><button class="reduce">-</button><input type="text" min="0" value="1"><button class="increase">+</button></td>
                            <td><span>180</span>$</td>
                            <td><button class="trash"><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr>
                        <tr>
                            <td><img src="../../public/images/arsenal1.jpg" alt="" width="50px"></td>
                            <td>Áo đá bóng <div class="size">Size: M</div>
                            <td><span>180</span>$</td>
                            <td><button class="reduce">-</button><input type="text" min="0" value="1"><button class="increase">+</button></td>
                            <td><span>180</span>$</td>
                            <td><button class="trash"><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr>
                        <tr>
                            <td><img src="../../public/images/arsenal1.jpg" alt="" width="50px"></td>
                            <td>Áo đá bóng <div class="size">Size: M</div>
                            <td><span>180</span>$</td>
                            <td><button class="reduce">-</button><input type="text" min="0" value="1"><button class="increase">+</button></td>
                            <td><span>180</span>$</td>
                            <td><button class="trash"><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr>
                        <tr>
                            <td><img src="../../public/images/arsenal1.jpg" alt="" width="50px"></td>
                            <td>Áo đá bóng <div class="size">Size: M</div>
                            <td><span>180</span>$</td>
                            <td><button class="reduce">-</button><input type="text" min="0" value="1"><button class="increase">+</button></td>
                            <td><span>180</span>$</td>
                            <td><button class="trash"><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr>
                        <tr>
                            <td><img src="../../public/images/arsenal1.jpg" alt="" width="50px"></td>
                            <td>Áo đá bóng <div class="size">Size: M</div>
                            <td><span>180</span>$</td>
                            <td><button class="reduce">-</button><input type="text" min="0" value="1"><button class="increase">+</button></td>
                            <td><span>180</span>$</td>
                            <td><button class="trash"><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr>
                        <tr>
                            <td><img src="../../public/images/arsenal1.jpg" alt="" width="50px"></td>
                            <td>Áo đá bóng <div class="size">Size: M</div>
                            <td><span>180</span>$</td>
                            <td><button class="reduce">-</button><input type="text" min="0" value="1"><button class="increase">+</button></td>
                            <td><span>180</span>$</td>
                            <td><button class="trash"><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr>
                        <tr>
                            <td><img src="../../public/images/arsenal1.jpg" alt="" width="50px"></td>
                            <td>Áo đá bóng <div class="size">Size: M</div>
                            <td><span>180</span>$</td>
                            <td><button class="reduce">-</button><input type="text" min="0" value="1"><button class="increase">+</button></td>
                            <td><span>180</span>$</td>
                            <td><button class="trash"><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
        <div class="cart_form-product-2">
            <h4>Cart Total</h4>
            <div class="cart_form-product-order">
                <div class="cart_form-product-order_info">
                    <div class="product_cost">Subtotal: <span>20</span></div>
                    <div class="product_cost product_cost-ship">Shipping: <span>15</span></div>
                    <div class="product_cost total">Total: <span>35</span></div>
                </div>
                <button class="btn_pay">Procees to checkout</button>
            </div>
        </div>
    </div>
    <div class="group_btn">
        <button class="group_btn-item">Return To Shop</button>
        <button class="group_btn-item">Update Cart</button>
    </div>
    <div class="cart_list">
        <div class="cart_list-title">
            <h2>LIST OF ORDERS</h2>
        </div>
        <div class="cart_list-filler">
            From <input type="date" class="input_date">
            To <input type="date" class="input_date">
            <button class="filler">Filler</button>
            <button class="refresh">Refresh</button>
        </div>
        <div class="cart_list-item">
            <table class="table table_2">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>User ID</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>View Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample Row -->
                    <tr>
                        <td>data1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                        <td><button class="btn_status">No process</button></td>
                        <td>200.000 đ</td>
                        <td><a href="cart-detail-page.php">View Detail</a></td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
        <div class="cart_list-btn">
            <button class="btn_see-more">See More</button>
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