
<div class="main-content">
    <h3 class="h1-head-name" >Supplier management</h3>
    
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
          <form action="../controller/supplier-controller.php" method="GET"> 
            <button type="button button-edit" class="btn btn-warning" name="Action" value="edit" >Edit</button>
            <button type="button button-delete" class="btn btn-danger" name="Action" value="delete">Delete</button>
            
            <input type="hidden" name="MaNCC" value="<?php echo $row['MaNCC'] ?>" > 
          </form> 
        </td>
      </tr>
    <?php
    }
    ?>  
  </tbody>
</table>



</div>