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
</style>


<div class="main-content">

  <h3 class="h1-head-name">Quản lý đơn hàng</h3>

  <button type="button" class="btn btn-success" style="float:right; margin-top: 10px; margin-bottom: 10px; " onclick="supplier_form('','','Add new supplier','add','Add')">

    <i class="fa-solid fa-circle-plus"></i> Add new supplier</button>


  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th scope="col">Mã Đơn hàng</th>
        <th scope="col">Mã Tài Khoản</th>
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
          <td><?php echo $row['MaTK'] ?></td>
          <td><?php echo $row['ThoiGian'] ?></td>
          <?php if($row['TrangThai']==0){

              echo '<td style="background-color:yellow" >Chờ xử lý</td>';
              
          }else if($row['TrangThai']==1){
            echo '<td style="background-color:green">Đã xử lý</td>';
            
          }
          else if($row['TrangThai']==2){
            echo '<td style="background-color:red">Đã hủy</td>';
          
           };
           ?>
          <td><?php echo $row['ThanhToan'] ?></td>
          <td class="td_form">
            <?php if($row['TrangThai']==0){?>
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
            <button type="button" class="btn btn-warning btn-edit" onclick="quanLyDonHang('<?php echo $row['MaHD'] ?>' ,'<?php echo $row['MaTK'] ?>','<?php echo $row['ThoiGian'] ?>' ,'<?php echo $row['ThanhToan'] ?>' ,'<?php echo $row['MoTa'] ?>' ,'Xem ChiTietDonHang','','Xuất Hóa Đơn')">Chi tiết đơn hàng</button>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <?php
  require_once('../../public/template/admin/supplier_form.php');
  ?>

</div>
