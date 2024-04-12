
<div class="main-content">
    <h3 class="h1-head-name" >Supplier management</h3>
    <button type="button" class="btn btn-success" style="float:right; margin-top: 10px; margin-bottom: 10px; "  onclick="supplier_form('','','Add new supplier','add')">
    <i class="fa-solid fa-circle-plus"></i> Add new supplier</button>

    <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Supplier ID</th>
      <th scope="col">Supplier name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php
    $supplier_model = new supplier_model();
    $query= $supplier_model->getSupplierData();
    while ($row=mysqli_fetch_array($query)) {
    ?>
      <tr>
        <th scope="row"><?php echo $row['MaNCC'] ?></th>
        <td><?php echo $row['TenNCC'] ?></td>
        <td><?php echo $row['TrangThai'] ?></td>
        <td>
          <!-- <form action="../controller/supplier-controller.php" method="GET">  -->
            <button type="button" class="btn btn-warning"  onclick="supplier_form('<?php echo $row['MaNCC'] ?>' ,'<?php echo $row['TenNCC'] ?>','Edit supplier','edit')" ><i class="fa-solid fa-pen-to-square"></i></button>
            <button type="button" class="btn btn-danger"  ><i class="fa-solid fa-trash"></i></button>
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

