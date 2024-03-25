<link rel="stylesheet" href="cart.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.4.2-web/css/all.min.css">
<div id="header">
		<?php require('head.php'); ?>
</div>
<div class="cart_form">
    <div class="cart_form-product">
        <div class="cart_form-product-1">
            <h2>Giỏ Hàng</h2>
            <div class="product_item-content">
                <table class="table table_product">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Sản Phẩm</th>
                            <th scope="col">Đơn Giá</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Thành Tiền</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td><img src="./assets/img/arsenal1.jpg" alt="" width="50px"></td>
                            <td>Áo đá bóng</td>
                            <td><span>180.000</span>đ</td>
                            <td><input type="number" min="0" value="1"></td>
                            <td><span>180.000</span>đ</td>
                            <td><button><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr>
                        <tr>
                            <th>1</th>
                            <td><img src="./assets/img/arsenal1.jpg" alt="" width="50px"></td>
                            <td>Áo đá bóng</td>
                            <td><span>180.000</span>đ</td>
                            <td><input type="number" min="0" value="1"></td>
                            <td><span>180.000</span>đ</td>
                            <td><button><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr>
                    </tbody>
                    
                </table>
            </div>
        </div>
        <div class="cart_form-product-2">
            <h2>Đơn hàng</h2>
            <div class="cart_form-product-order">
                <div class="cart_form-product-order_info">
                    <div class="product_cost">Tổng tiền:</div>
                    <div class="product_value">20.000</div>
                </div>
                <button class="btn_pay">Thanh toán</button>
            </div>
        </div>
    </div>
    <div class="group_btn">
        <button class="group_btn-item">Mua tiếp</button>
        <button class="group_btn-item">Cập nhập giỏ hàng</button>
    </div>
    <div class="cart_list">
        <div class="cart_list-title">
            <h2>DANH SÁCH CÁC ĐƠN HÀNG ĐÃ ĐẶT</h2>
        </div>
        <div class="cart_list-filler">
            Từ <input type="date" class="input_date">
            Đến <input type="date" class="input_date">
            <button class="filler">Lọc</button>
            <button class="refresh">Refresh</button>
        </div>
        <div class="cart_list-item">
            <table class="table table_2">
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Mã tài khoản</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th>Tổng tiền</th>
                        <th>Xem chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample Row -->
                    <tr>
                        <td>data1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                        <td><button class="btn_status">Chưa xử lý</button></td>
                        <td>200.000 đ</td>
                        <td><a href="cart_detail.php">Xem chi tiết</a></td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
        <div class="cart_list-btn">
            <button class="btn_see-more">Xem thêm</button>
        </div>
    </div>
</div>
<div id="footer">
		<?php include('footer.php');?>
</div>