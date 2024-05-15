<?php
$request = $_SERVER['REQUEST_URI'];
$url =  handle_url::getURLAdmin($request);
if (isset($_POST['MaPN'])) {
    $maPN = $_POST['MaPN'];
    $import_model = new import_model();
    $queryImport =  $import_model->getImportAndStaff($maPN);
    $rowImport = mysqli_fetch_array($queryImport);
}

require('./admin/controller/export_import_pdf.php');
$pdfData= export_pdf::export($maPN) ;

?>

<div class="main-content">
    <div style="display: flex; justify-content: space-between;" >
       
            <a type="button" href="<?php echo  $url . '/import'; ?>" class="btn btn-light"><i class="fa-solid fa-arrow-left" style=" font-size: 30px;"></i></a>
            <h3 style="padding-left: 15px;" class="h1-head-name">Phiếu nhập</h3>
    
        <button  id="button-export" type="button" class="btn btn-success">
        <i class="fa-solid fa-circle-plus"></i> Xuất pdf</button>
    </div>



    <div style="display: flex; justify-content: space-around; ">
        <div>
            <p style="font-size: 18px;margin-bottom: 5px;"> Mã PN : <?php echo $maPN; ?></p>
            <p style="font-size: 18px;margin-bottom: 5px;"> Tên TK : <?php echo $rowImport['TenTK'] ?> </p>
            <p style="font-size: 18px;margin-bottom: 5px;"> Tên NV : <?php echo $rowImport['TenNV'] ?> </p>
        </div>
        <div>
            <p style="font-size: 18px;margin-bottom: 5px;"> Nhà cung cấp : <?php echo $rowImport['MaNCC'] . ' ' . $rowImport['TenNCC'] ?></p>
            <p style="font-size: 18px;margin-bottom: 5px;"> Thời gian : <?php echo $rowImport['ThoiGianPN'] ?></p>
            <p style="font-size: 18px;margin-bottom: 5px;"> Thanh toán : <?php echo number_format($rowImport['ThanhToan']).'đ'; ?> </p>
        </div>
    </div>


    <table id="detailTable" class="table table-striped table-hover" style="margin-top: 20px;" >  
        <thead>
            <tr>
                <th scope="col">Mã SP</th>
                <th scope="col">Tên SP</th>
                <th scope="col">Size</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>
            </tr>
        </thead>
        <tbody class="table-group-divider ">
            <?php
         
            $queryImportDetail = $import_model->getImportDetailData($maPN);
            while ($rowImportDetail = mysqli_fetch_array($queryImportDetail)) {
            ?>
                <tr class="tr-body" style="height: 55px;">
                    <th scope="row"><?php echo $rowImportDetail['MaSP'] ?></th>
                    <td><?php echo $rowImportDetail['TenSP'] ?></td>
                    <td><?php echo $rowImportDetail['MaSize'] ?></td>
                    <td><?php echo number_format($rowImportDetail['DonGia']).'đ' ?></td>
                    <td><?php echo $rowImportDetail['SoLuongCTPN'] ?></td>
                    <td><?php echo number_format($rowImportDetail['ThanhTien']).'đ' ?></td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>

</div>
<script>
    document.getElementById("button-export").addEventListener("click", function(e) {
            // Dữ liệu PDF Base64 của bạn
            var pdfData = "<?php echo base64_encode($pdfData); ?>";
            // Tạo một URL cho dữ liệu Base64
            var pdfUrl = "data:application/pdf;base64," + pdfData;
            // Mở tab mới và tạo một iframe để hiển thị PDF
            var newTab = window.open();
            newTab.document.write('<iframe width="100%" height="100%" src="' + pdfUrl + '"></iframe>');
        });
</script>