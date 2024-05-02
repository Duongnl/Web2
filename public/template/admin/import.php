<?php 
$request = $_SERVER['REQUEST_URI'];
$url =  handle_url::getURLAdmin($request);
?>

<style>
  .btn-accept {
    display: none;
  }

  .btn-decline {
    display: none;
  }
  .btn-detail {
    display: none;
  }

  .tr-body:hover .btn-accept,
  .tr-body:hover .btn-decline,
  .tr-body:hover .btn-detail {
    display: inline;
  }

  td {
      text-align: center; 
      align-items: center; /* Căn giữa theo chiều cao */
     justify-content: center; /* Căn giữa theo chiều rộng */
      /* padding-top: 15px !important; Thêm padding để tạo khoảng cách giữa nội dung và viền */
     }
  th{
    text-align: center; /* Căn giữa nội dung trong ô */
    /* padding-top: 15px !important; Thêm padding để tạo khoảng cách giữa nội dung và viền */
  }
</style>

<div class="main-content">
<h3 class="h1-head-name">Import management</h3>

<button type="button" class="btn btn-success" style="float:right; margin-top: 10px; margin-bottom: 10px; " onclick="select_supplier_form('Select supplier','Select')">
<i class="fa-solid fa-circle-plus"></i> Add new supplier</button>

    <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th scope="col">Import ID</th>
        <th scope="col">Staff name</th>
        <th scope="col">Supplier name</th>
        <th scope="col">Total</th>
        <th scope="col">Date</th>
        <th scope="col">Status</th>
        <th scope="col" style="width: 88px;">Detail</th>
        <th scope="col" style="width:214.087px; ">Action</th>
      </tr>
    </thead>
    <tbody class="table-group-divider ">
      <?php
      $import_model = new import_model();
      $query = $import_model->getImportData();
      while ($row = mysqli_fetch_array($query)) {
      ?>
        <tr class="tr-body" style="height: 55px;">
          <th scope="row"><?php echo $row['MaPN'] ?></th>
          <td><?php echo $row['TenNV'] ?></td>
          <td><?php echo $row['TenNCC'] ?></td>
          <td><?php echo $row['ThanhToan'] ?></td>
          <td><?php echo $row['ThoiGian'] ?></td>
          <?php if ($row['TrangThaiPN'] == 0) {
            echo '<td style="background-color: #ffc107; border-radius: 5px;">Pending</td>';
          } else  if ($row['TrangThaiPN'] == 1) {
            echo '<td style="background-color: #198754;  border-radius: 5px;">Approved</td>';
          } else {
            echo '<td style="background-color: #dc3545;border-radius: 5px;">Rejected</td>';
          }
          ?>
          <td><button type="button" class="btn btn-warning btn-detail">Detail</button></td>
          <td>
           <?php if ($row['TrangThaiPN'] == 0) { ?> 
           
            <form action="<?php echo $url.'/import_controller' ?>" method="POST" style="display: inline-block;"> 
              <input type="hidden" name="maPN" value="<?php echo $row['MaPN'] ?>" > 
              <button type="submit" class="btn btn-success btn-accept" name="action" value="accept"> Accept </button>
            </form> 
            
            <form action="<?php echo $url.'/import_controller' ?>" method="POST" style="display: inline-block;"> 
              <input type="hidden" name="maPN" value="<?php echo $row['MaPN'] ?>">  
              <button type="submit" class="btn btn-danger btn-decline" name="action" value="decline">Decline</button>
            </form>  
            
            <?php } ?>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <?php
  require_once('./public/template/admin/select_supplier_form.php');
  ?>


</div>