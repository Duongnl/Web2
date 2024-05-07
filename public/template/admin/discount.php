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

  <h3 class="h1-head-name">Discount management</h3>
  <!-- function discount_form(maKM, tenKM, phamtramKM, formName, action, buttonName)  -->
  <button type="button" class="btn btn-success" style="float:right; margin-top: 10px; margin-bottom: 10px; " onclick="discount_form('','','', 'Add new discount','add','Add')">

    <i class="fa-solid fa-circle-plus"></i> Add new discount</button>


  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th scope="col">Discount ID</th>
        <th scope="col">Discount name</th>
        <th scope="col">Discount percent</th>
        <th scope="col">Status</th>
        <th scope="col" style="width:214.087px; ">Action</th>
      </tr>
    </thead>
    <tbody class="table-group-divider ">
      <?php
      $discount_model = new discount_model();
      $query = $discount_model->getdiscountData();
      while ($row = mysqli_fetch_array($query)) {
      ?>
        <tr class="tr-body" style="height: 55px;">
          <th scope="row"><?php echo $row['MaKM'] ?></th>
          <td><?php echo $row['TenKM'] ?></td>
          <td><?php echo $row['PhanTramKM'] ?>%</td>
          <td><?php echo $row['TrangThai'] ?></td>
          <td>
            <!-- <form action="../controller/discount-controller.php" method="GET">  -->
            <button type="button" class="btn btn-warning btn-edit" onclick="discount_form('<?php echo $row['MaKM'] ?>' ,'<?php echo $row['TenKM'] ?>' ,'<?php echo $row['PhanTramKM'] ?>','Edit discount','edit','Save')"><i class="fa-solid fa-pen-to-square"></i></button>
            <button type="button" class="btn btn-danger btn-delete"  onclick="discount_form('<?php echo $row['MaKM'] ?>' ,'<?php echo $row['TenKM'] ?>' ,'<?php echo $row['PhanTramKM'] ?>','Delete discount','delete', 'Delete')"><i class="fa-solid fa-trash"></i></button>
            <!-- </form>  -->
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <?php
  require_once('./public/template/admin/discount_form.php');
  ?>

</div>