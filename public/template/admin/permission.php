<style>
  .btn-edit,
  .btn-permission,
  .btn-delete {
    display: none;
  }


  .tr-body:hover .btn-edit,
  .tr-body:hover .btn-delete,
  .tr-body:hover .btn-permission
   {
    display: inline;
  }
</style>
<?php 
$request = $_SERVER['REQUEST_URI'];
$url = handle_url::getURLAdmin($request);
?>

<div class="main-content">

  <h3 class="h1-head-name">Permission management</h3>

  <button type="button" class="btn btn-success" style="float:right; margin-top: 10px; margin-bottom: 10px; " onclick="permission_form('', '', 'ADD PERMISSION', 'add', 'ADD')">

    <i class="fa-solid fa-circle-plus"></i> Add Permission</button>


  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th scope="col">Permission ID</th>
        <th scope="col">Permission Name</th>
        <th scope="col" style="width:30%; ">Action</th>
      </tr>
    </thead>
    <tbody class="table-group-divider ">
      <?php
      // $staff_manager_model = new staff_manager_model();
      // $queryStaff = $staff_manager_model->getStaffData();
      $quyen_model = new quyen_model();
      $queryQuyen = $quyen_model->getQuyenData();
      
      while ($row = mysqli_fetch_array($queryQuyen)) {
    ?>
        <tr class="tr-body" style="height: 55px;">
          <th scope="row"><?php echo $row['MaQuyen'] ?></th>
          <td><?php echo $row['TenQuyen'] ?></td>
          <td>
            <a type="button" href="<?php echo  $url.'/permission_details'; ?>" class="btn btn-warning btn-permission" >Phân Quyền </a>
            <!-- <form action="../controller/supplier-controller.php" method="GET">  -->
            <!-- <button type="button" class="btn btn-warning btn-permission" onclick="">Phân Quyền</button> -->
            <button type="button" class="btn btn-warning btn-edit" onclick="permission_form('<?php echo $row['MaQuyen'] ?>' ,'<?php echo $row['TenQuyen'] ?>','Edit Staff','edit','Save')"><i class="fa-solid fa-pen-to-square"></i></button>
            <button type="button" class="btn btn-danger btn-delete"  onclick="permission_form('<?php echo $row['MaQuyen'] ?>' ,'<?php echo $row['TenQuyen'] ?>','Delete Staff','delete','Delete')"><i class="fa-solid fa-trash"></i></button>

            <!-- </form>  -->
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <?php
  require_once('./public/template/admin/permission_form.php');
  ?>

</div>