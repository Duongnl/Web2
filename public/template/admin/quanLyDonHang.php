<style>
  .btn-edit {
    display: none;
  }

  .btn-delete {
    display: none;
    back
  }

  .tr-body:hover .btn-edit,
  .tr-body:hover .btn-delete {
    display: inline;
  
  }
  td {
            text-align: center; /* Căn giữa nội dung trong ô */
            padding-top: 15px !important; /* Thêm padding để tạo khoảng cách giữa nội dung và viền */
     }
  th{
    text-align: center; /* Căn giữa nội dung trong ô */
            padding-top: 15px !important; /* Thêm padding để tạo khoảng cách giữa nội dung và viền */
  }
  .form_container{
            display: inline-block;
  }
  .td_form{
    padding-top:9px!important;
  }
  .h1-head-name{
    margin-bottom:40px;
    text-align:center;
  }
</style>


<div class="main-content">

  <h3 class="h1-head-name ">Quản lý đơn hàng</h3>

  <?php 
     $chiTietDonHang_model= new chiTietDonHang_model();
     
     
  ?>


  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th scope="col">Mã Đơn hàng</th>
        <th scope="col">Tên Khách Hàng</th>
        <th scope="col">Ngày đặt</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Tổng tiền</th>
        <th scope="col">Cập nhật trạng thái</th>
        <th scope="col">Xem chi tiết</th>
      </tr>
    </thead>
    <tbody class="table-group-divider ">
      <?php
      $quanLyDonHang_model = new quanLyDonHang_model();
      $query = $quanLyDonHang_model->getDonHangData();
      while ($row = mysqli_fetch_array($query)) {
      ?>
        <tr class="tr-body" style="height: 57px;">
          <th scope="row"><?php echo $row['MaHD'] ?></th>
          <td><?php echo $row['TenTK'] ?></td>
          <td><?php echo $row['ThoiGianHD'] ?></td>
          <?php if($row['TrangThaiHD']==0){

              echo '<td style="background-color:yellow" >Chờ xử lý</td>';
              
          }else if($row['TrangThaiHD']==1){
            echo '<td style="background-color:green">Đã xử lý</td>';
            
          }
          else if($row['TrangThaiHD']==2){
            echo '<td style="background-color:red">Đã hủy</td>';
          
           };

      
           
           ?>
          <td><?php echo $row['ThanhToan'] ?></td>
          <td class="td_form">
            <?php if($row['TrangThaiHD']==0){?>
            <form action="../controller/quanLyDonHang_controller.php" method="POST" class="form_container"> 
              <button type="submit" class="btn btn-warning btn-edit" >Xử lý</button>
              <input type="hidden" name="MaHD" value="<?php echo $row['MaHD']?> ">
              <input type="hidden" name="action" value="XuLy">
            </form> 
            <form action="../controller/quanLyDonHang_controller.php" method="POST" class="form_container"> 
              <button type="submit" class="btn btn-danger btn-edit" >Hủy</button>
              <input type="hidden" name="MaHD" value="<?php echo $row['MaHD']?> ">
              <input type="hidden" name="action" value="Huy">
            </form> 
              <?php };?>
          </td>
          <td class="td_form " style="width:200px">
            <form action="../view/chiTietDonHang_page.php" method="POST" class="form_container"> 
              <input type="hidden" name="MaHD" value="<?php echo $row['MaHD']?> ">
              <button type="submit" class="btn btn-warning btn-edit">Chi tiết đơn hàng</button>
            </form> 
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>


</div>
<?php require_once('../../public/template/admin/toast.php');
if (isset($_SESSION['Duyet_ThanhCong']) && $_SESSION['Duyet_ThanhCong'] == true) {
  toast::memo("Success", "Duyet_ThanhCong", "limegreen");
} else if (isset($_SESSION['Duyet_ThatBai']) && $_SESSION['Duyet_ThatBai'] == true) {
  toast::memo("Thất bại , không đủ hàng trong kho", "Duyet_ThatBai", "red");
}

?>
