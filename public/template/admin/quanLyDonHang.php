<style>
  .btn-edit {
    display: none;
  }

  .btn-delete {
    display: none;
  }

  .tr-body:hover .btn-edit,
  .tr-body:hover .btn-delete {
    display: inline;
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
        <tr class="tr-body" style="height: 55px;">
          <th scope="row"><?php echo $row['MaHD'] ?></th>
          <td><?php echo $row['MaTK'] ?></td>
          <td><?php echo $row['ThoiGian'] ?></td>
          <td><?php echo $row['TrangThai'] ?></td>
          <td><?php echo $row['ThanhToan'] ?></td>
          <td>
            <!-- <form action="../controller/supplier-controller.php" method="GET">  -->
            <!-- <button type="button" class="btn btn-warning btn-edit" onclick="supplier_form('<?php echo $row['MaNCC'] ?>' ,'<?php echo $row['TenNCC'] ?>','Edit supplier','edit','Save')">Xử lý</button>
            <button type="button" class="btn btn-danger btn-delete"  onclick="supplier_form('<?php echo $row['MaNCC'] ?>' ,'<?php echo $row['TenNCC'] ?>','Delete supplier','delete', 'Delete')">Hủy</button> -->
            <button type="button">Xử lý</button>
            <button type="button">Hủy</button>

            <!-- </form>  -->
          </td>
          <td>
            <!-- <form action="../controller/supplier-controller.php" method="GET">  -->
            <!-- <button type="button" class="btn btn-warning btn-edit" onclick="supplier_form('<?php echo $row['MaNCC'] ?>' ,'<?php echo $row['TenNCC'] ?>','Edit supplier','edit','Save')"><i class="fa-solid fa-pen-to-square"></i></button>
            <button type="button" class="btn btn-danger btn-delete"  onclick="supplier_form('<?php echo $row['MaNCC'] ?>' ,'<?php echo $row['TenNCC'] ?>','Delete supplier','delete', 'Delete')"><i class="fa-solid fa-trash"></i></button> -->
            <button type> Xem chi tiết</button>
            <!-- </form>  -->
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
