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

  <h3 class="h1-head-name">Guest management</h3>

  <button type="button" class="btn btn-success" style="float:right; margin-top: 10px; margin-bottom: 10px; " onclick="guest_form('', '', '', '', '', '', '', '' , 'ADD STAFF', 'add', 'ADD')">

    <i class="fa-solid fa-circle-plus"></i> Add Guest </button>


  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th scope="col">Guest ID</th>
        <th scope="col">Guest name</th>
        <th scope="col">Adress</th>
        <th scope="col">Status</th>
        <th scope="col" style="width:214.087px; ">Action</th>
      </tr>
    </thead>
    <tbody class="table-group-divider ">
      <?php
      $guest_model = new guest_model();
      $queryGuest = $guest_model->getGuestData();

      while ($row = mysqli_fetch_array($queryGuest)) {
    ?>
        <tr class="tr-body" style="height: 55px;">
          <th scope="row"><?php echo $row['MaKH'] ?></th>
          <td><?php echo $row['TenKH'] ?></td>
          <td><?php echo $row['DiaChi'] ?></td>
          <td><?php if($row['TrangThai'] == 0) {echo 'Lock';}
          else if ($row['TrangThai'] == 1){
           echo 'Active';}?></td>
          <td>
            <!-- <form action="../controller/supplier-controller.php" method="GET">  -->
            <button type="button" class="btn btn-warning btn-edit" onclick="guest_form('<?php echo $row['MaKH'] ?>' ,'<?php echo $row['TenKH'] ?>','<?php echo $row['TenTK']?> ','<?php echo$row ['MaQuyen'] ?> ','<?php echo $row ['Email']?>','<?php echo $row ['SDT']?>','<?php echo $row ['MatKhau']?>', '<?php echo $row ['DiaChi']?>','Edit Staff','edit','Save')"><i class="fa-solid fa-pen-to-square"></i></button>
            <button type="button" class="btn btn-danger btn-delete"  onclick="guest_form('<?php echo $row['MaKH'] ?>' ,'<?php echo $row['TenKH'] ?>','<?php echo $row ['TenTK']?>','<?php echo $row['MaQuyen']?> ' ,'<?php echo $row ['Email']?>','<?php echo $row ['SDT']?>','<?php echo $row ['MatKhau']?>','<?php echo $row ['DiaChi']?>','Delete Staff','delete','Delete')"><i class="fa-solid fa-trash"></i></button>
            <!-- </form>  -->
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <?php
  require_once('./public/template/admin/guest_form.php');
  ?>

</div>