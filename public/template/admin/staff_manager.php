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

  <h3 class="h1-head-name">Staff management</h3>

  <button type="button" class="btn btn-success" style="float:right; margin-top: 10px; margin-bottom: 10px; " onclick="staff_manager_form('', '', '', '', '', '', '', '' , 'ADD STAFF', 'add', 'ADD')">

    <i class="fa-solid fa-circle-plus"></i> Add Staff</button>


  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th scope="col">Staff ID</th>
        <th scope="col">Staff name</th>
        <th scope="col">Position</th>
        <th scope="col">Date</th>
        <th scope="col">Status</th>
        <th scope="col" style="width:214.087px; ">Action</th>
      </tr>
    </thead>
    <tbody class="table-group-divider ">
      <?php
      $staff_manager_model = new staff_manager_model();
      $queryStaff = $staff_manager_model->getStaffData();
      $quyen_model = new quyen_model();
      $queryQuyen = $quyen_model->getQuyenData();

       

      while ($row = mysqli_fetch_array($queryStaff)) {
    ?>
        <tr class="tr-body" style="height: 55px;">
          <th scope="row"><?php echo $row['MaNV'] ?></th>
          <td><?php echo $row['TenNV'] ?></td>
          <td><?php echo $row['TenQuyen'] ?></td>
          <td><?php echo $row['ThoiGian'] ?></td>
          <td><?php if($row['TrangThai'] == 0) {echo 'Lock';}
          else if ($row['TrangThai'] == 1){
           echo 'Active';}?></td>
          <td>
            <!-- <form action="../controller/supplier-controller.php" method="GET">  -->
            <button type="button" class="btn btn-warning btn-edit" onclick="staff_manager_form('<?php echo $row['MaNV'] ?>' ,'<?php echo $row['TenNV'] ?>','<?php echo $row['TenTK']?> ','<?php echo $row ['Email']?>','<?php echo $row ['SDT']?>','<?php echo $row ['MatKhau']?>', '<?php echo $row ['ThoiGian']?>','<?php echo $row ['DiaChi']?>','Edit Staff','edit','Save')"><i class="fa-solid fa-pen-to-square"></i></button>
            <button type="button" class="btn btn-danger btn-delete"  onclick="staff_manager_form('<?php echo $row['MaNV'] ?>' ,'<?php echo $row['TenNV'] ?>','<?php echo $row ['TenTK']?>' ,'<?php echo $row ['Email']?>','<?php echo $row ['SDT']?>','<?php echo $row ['MatKhau']?>','<?php echo $row ['ThoiGian']?>','<?php echo $row ['DiaChi']?>','Delete Staff','delete','Delete')"><i class="fa-solid fa-trash"></i></button>
            <!-- </form>  -->
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <?php
  require_once('../../public/template/admin/staff_manager_form.php');
  ?>

</div>