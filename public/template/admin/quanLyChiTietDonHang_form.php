<style>
    #quanLyDonHang {
        background-color: whitesmoke;
        border: 1px solid gray;
        border-radius: 20px;
        width: 700px;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        position: fixed;
        display: none;

        z-index: 2;

    }
    .chiTietDonHang{
        font-size:25px;
        width: 100%;
        text-align:center;
        
    }
    .input-group-text{
        width: 150px;
    }
    .box{
        display:flex;
        justify-content: space-between;	
        margin-bottom:30px;
    }
   
</style>

<div class="main-content" >
    <?php 
    require('./admin/controller/export_pdf.php');
    $request = $_SERVER['REQUEST_URI'];
    $url =  handle_url::getURLAdmin($request);
        if(isset($_POST['MaHD'])){
            $maHD=$_POST['MaHD'];
           
        }
        $chiTietDonHang_model= new chiTietDonHang_model();
        $query = $chiTietDonHang_model->getChiTietDonHang_TaiKhoan($maHD);
        $row = mysqli_fetch_array($query)

    ?>
    <div class="box">
        <div class="">
          <a type="button" href="<?php echo $url.'/order'?> "class="btn btn-light"><i class="fa-solid fa-arrow-left" style="display: inline-block; font-size: 30px;"></i></a>
        </div>
        <div class="">
          <p class="chiTietDonHang ">Chi Tiết Đơn Hàng</p>
        </div>
        <div class="">
        <button type="button" class="btn btn-success" id="buttonXuatPhieu" style="float:right; margin-top: 10px; margin-bottom: 10px; " onclick="select_supplier_form('Select supplier','Select')">
Xuất Phiếu</button>
        </div>
    </div>
    <div class="row mb-4">
            <div class="container" style="display:flex">
                <div class="col-6 main_left">
                    <p>Mã Đơn Hàng:  <?php echo  $maHD ?></p>
                    <p>Thời Gian: <?php echo  $row['ThoiGianHD'] ?>  </p>
                    <p>Tổng Thanh Toán: <?php echo  $row['ThanhToan'] ?></p>
                </div>
                <div class="col-6">
                    <p>Tên Tài Khoản: <?php echo  $row['TenTK'] ?></p>
                    <p>Tên Khách Hàng: <?php echo  $row['TenKH'] ?></p>
                </div>
            </div>
    </div>
    
    <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th scope="col">Mã Sản Phẩm</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Size</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>
            </tr>
            </thead>
            <tbody class="table-group-divider ">
            <?php
            $query1 = $chiTietDonHang_model->getChiTietDonHang($maHD);
            while ($row = mysqli_fetch_array($query1)) {
            ?>
                <tr class="tr-body" style="height: 57px;">
                    <th scope="row"><?php echo $row['MaSP'] ?></th>
                    <td><?php echo $row['TenSP'] ?></td>
                    <td><?php echo $row['MaSize'] ?></td>
                    <td><?php echo $row['DonGia'] ?></td>
                    <td><?php echo $row['ctSoLuong'] ?></td>
                    <td><?php echo $row['ThanhTien'] ?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
</div>

<?php 
   $pdfData= export_pdf::export($maHD) ;
?>

<script>
      
        document.getElementById("buttonXuatPhieu").addEventListener("click", function(e) {
            // Dữ liệu PDF Base64 của bạn
            var pdfData = "<?php echo base64_encode($pdfData); ?>";
            // Tạo một URL cho dữ liệu Base64
            var pdfUrl = "data:application/pdf;base64," + pdfData;
            // Mở tab mới và tạo một iframe để hiển thị PDF
            var newTab = window.open();
            newTab.document.write('<iframe width="100%" height="100%" src="' + pdfUrl + '"></iframe>');
        });
    </script>
