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

  <h3 class="h1-head-name">Category management</h3>

  <button type="button" class="btn btn-success" style="float:right; margin-top: 10px; margin-bottom: 10px; " onclick="category_form('','','Add new category','add','Add')">

    <i class="fa-solid fa-circle-plus"></i> Add new category</button>


  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th scope="col">Category ID</th>
        <th scope="col">Category name</th>
        <th scope="col">Status</th>
        <th scope="col" style="width:214.087px; ">Action</th>
      </tr>
    </thead>
    <tbody class="table-group-divider ">
      <?php
      $category_model = new category_model();
      $query = $category_model->getcategoryData();
      while ($row = mysqli_fetch_array($query)) {
      ?>
        <tr class="tr-body" style="height: 55px;">
          <th scope="row"><?php echo $row['MaDM'] ?></th>
          <td><?php echo $row['TenDM'] ?></td>
          <td><?php echo $row['TrangThai'] ?></td>
          <td>
            <!-- <form action="../controller/category-controller.php" method="GET">  -->
            <button type="button" class="btn btn-warning btn-edit" onclick="category_form('<?php echo $row['MaDM'] ?>' ,'<?php echo $row['TenDM'] ?>','Edit category','edit','Save')"><i class="fa-solid fa-pen-to-square"></i></button>
            <button type="button" class="btn btn-danger btn-delete"  onclick="category_form('<?php echo $row['MaDM'] ?>' ,'<?php echo $row['TenDM'] ?>','Delete category','delete', 'Delete')"><i class="fa-solid fa-trash"></i></button>
            <!-- </form>  -->
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <?php
  require_once('./public/template/admin/category_form.php');
  ?>

</div>