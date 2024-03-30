<link rel="stylesheet" href="cart.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.4.2-web/css/all.min.css">
<div id="header">
		<?php require('head.php'); ?>
</div>
<div class="cart_form">
    <div class="cart_form-product">
        <div class="cart_form-product-1">
            <h4><a href="">Home</a> / Cart</h4>
            <div class="product_item-content">
                <table class="table table_product">
                    <thead>
                        <tr>
                            <th scope="col">Order</th>
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
                            <th>1</th>
                            <td><img src="./assets/img/arsenal1.jpg" alt="" width="50px"></td>
                            <td>Áo đá bóng</td>
                            <td><span>180</span>$</td>
                            <td><input type="number" min="0" value="1"></td>
                            <td><span>180</span>$</td>
                            <td><button><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr>
                        <tr>
                            <th>1</th>
                            <td><img src="./assets/img/arsenal1.jpg" alt="" width="50px"></td>
                            <td>Áo đá bóng</td>
                            <td><span>180</span>$</td>
                            <td><input type="number" min="0" value="1"></td>
                            <td><span>180</span>$</td>
                            <td><button><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr>
                        <tr>
                            <th>1</th>
                            <td><img src="./assets/img/arsenal1.jpg" alt="" width="50px"></td>
                            <td>Áo đá bóng</td>
                            <td><span>180</span>$</td>
                            <td><input type="number" min="0" value="1"></td>
                            <td><span>180</span>$</td>
                            <td><button><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr>
                        <tr>
                            <th>1</th>
                            <td><img src="./assets/img/arsenal1.jpg" alt="" width="50px"></td>
                            <td>Áo đá bóng</td>
                            <td><span>180</span>$</td>
                            <td><input type="number" min="0" value="1"></td>
                            <td><span>180</span>$</td>
                            <td><button><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr>
                        <tr>
                            <th>1</th>
                            <td><img src="./assets/img/arsenal1.jpg" alt="" width="50px"></td>
                            <td>Áo đá bóng</td>
                            <td><span>180</span>$</td>
                            <td><input type="number" min="0" value="1"></td>
                            <td><span>180</span>$</td>
                            <td><button><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr>
                        <tr>
                            <th>1</th>
                            <td><img src="./assets/img/arsenal1.jpg" alt="" width="50px"></td>
                            <td>Áo đá bóng</td>
                            <td><span>180</span>$</td>
                            <td><input type="number" min="0" value="1"></td>
                            <td><span>180</span>$</td>
                            <td><button><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr>
                        <tr>
                            <th>1</th>
                            <td><img src="./assets/img/arsenal1.jpg" alt="" width="50px"></td>
                            <td>Áo đá bóng</td>
                            <td><span>180</span>$</td>
                            <td><input type="number" min="0" value="1"></td>
                            <td><span>180</span>$</td>
                            <td><button><i class="fa-solid fa-trash-can"></i></button></td>
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
                        <td><a href="cart_detail.php">View Detail</a></td>
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
<div id="footer">
		<?php include('footer.php');?>
</div>