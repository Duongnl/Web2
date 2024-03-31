
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="cart_detail.css">

<div id="header">
		<?php require('head.php'); ?>
</div>
<div class="cart_detail">
    <div class="cart_detail-group">
        <h2 class="cart_detail-title">Cart Detail</h2>
        <div class="cart_detail-info">
            <div class="cart_detail-info-1">
                <p>Order ID: 24</p>
                <p>User ID: 23</p>
                <p>Address: 123 abc</p>
            </div>
            <div class="cart_detail-info-2">
                <p>User Name: LocHoang</p>
                <p>Phone: 21112233923</p>
                <p>Date: 21-01-2003</p>
            </div>
        </div>
        <div class="cart_detail-total">
            <p>Totail: <span>180</span>$</p>
        </div>
        <div class="cart_detail-table">
            <table class="table table_product">
                <thead>
                    <tr>
                        <th scope="col">Product ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Size</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Totail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>007</th>
                        <td>Áo đá bóng</td>
                        <td>xl</td>
                        <td>10</td>
                        <td><span>180</span>$</td>
                        <td><span>1.800</span>$</td>
                    </tr>
                </tbody>

            </table>
            
        </div>
        <div class="btn_submit">
            <a href="cart.php" class ="btn_submit-a">Confirm</a>
            </div>
    </div>
</div>
<div id="footer">
		<?php include('footer.php');?>
</div>