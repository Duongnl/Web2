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

  #overlay_details {
    height: 100%;
    width: 100%;
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    overflow-x: hidden;
    transition: 0.5s;
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
            <!-- permission details -->
            <button type="button" onclick="openPopup()" class="btn btn-warning btn-permission" >Phân Quyền </button>
            
            
            <!-- <form action="../controller/supplier-controller.php" method="GET">  -->
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
  require_once('./public/template/admin/permission_details.php');

  require_once('./public/template/admin/permission_form.php');
  ?>
  <script>
    function openPopup() { // Click vào button thì gán style cho Popup là display:block để hiển thị lên
    document.getElementById("overlay_details").style.display = "block";
    }

    function closePopup() { // Click vào close thì gán style cho Popup là display:none để ẩn đi
    document.getElementById("overlay_details").style.display = "none";
    }
  </script>

</div>