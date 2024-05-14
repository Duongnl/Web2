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

  <h3 class="h1-head-name">Quản Lý Nhà Cung Cấp</h3>

  <button type="button" class="btn btn-success" style="float:right; margin-top: 10px; margin-bottom: 10px; " onclick="supplier_form('','','Thêm Nhà Cung Cấp','add','Thêm')">

    <i class="fa-solid fa-circle-plus"></i> Thêm Nhà Cung Cấp</button>


  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th scope="col">Mã Nhà Cung Cấp</th>
        <th scope="col">Tên Nhà Cung Cấp</th>
        <th scope="col">Trạng Thái</th>
        <th scope="col" style="width:214.087px; ">Hành Động</th>
      </tr>
    </thead>
    <tbody class="table-group-divider ">
      <?php
      $supplier_model = new supplier_model();
      $query = $supplier_model->getSupplierData();
      while ($row = mysqli_fetch_array($query)) {
      ?>
        <tr class="tr-body" style="height: 55px;">
          <th scope="row"><?php echo $row['MaNCC'] ?></th>
          <td><?php echo $row['TenNCC'] ?></td>
          <td><?php echo $row['TrangThai'] ?></td>
          <td>
            <!-- <form action="../controller/supplier-controller.php" method="GET">  -->
            <button type="button" class="btn btn-warning btn-edit" onclick="supplier_form('<?php echo $row['MaNCC'] ?>' ,'<?php echo $row['TenNCC'] ?>','Sửa Nhà Cung Cấp','edit','Lưu')"><i class="fa-solid fa-pen-to-square"></i></button>
            <button type="button" class="btn btn-danger btn-delete"  onclick="supplier_form('<?php echo $row['MaNCC'] ?>' ,'<?php echo $row['TenNCC'] ?>','Xóa Nhà Cung Cấp','delete', 'Xóa')"><i class="fa-solid fa-trash"></i></button>
            <!-- </form>  -->
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <?php
  require_once('./public/template/admin/supplier_form.php');
  ?>

</div>