<?php
$request = $_SERVER['REQUEST_URI'];
$url = handle_url::getURLAdmin($request);

if (isset($_GET['date'])) {
  $date = $_GET['date'];
}



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
    align-items: center;
    /* Căn giữa theo chiều cao */
    justify-content: center;
    /* Căn giữa theo chiều rộng */
    /* padding-top: 15px !important; Thêm padding để tạo khoảng cách giữa nội dung và viền */
  }

  th {
    text-align: center;
    /* Căn giữa nội dung trong ô */
    /* padding-top: 15px !important; Thêm padding để tạo khoảng cách giữa nội dung và viền */
  }
</style>

<div class="main-content">
  <h3 class="h1-head-name">Quản lý phiếu nhập</h3>
  <div style="border: 2px solid #000; border-radius:10px;margin-top: 20px;width: 703.2px;">
    <div style="margin-left: 10px;">
      <div style=" margin-top: 10px;">
        <label style="font-size:18px ;display:inline-block">Lọc đơn hàng theo : </label>
        <input type="radio" name="options" value="fromto" id="radioFromTo" style="margin-left: 10px;"> <label style=" font-size:18px;" for="radioFromTo">Khoảng thời gian</label>
        <input type="radio" name="options" value="date" id="radioDate" style="margin-left: 10px;"> <label style=" font-size:18px;" for="radioDate">Ngày</label>
      </div>
      <form action="<?php echo $url . '/import' ?>" method="GET">
        <div id="dateDiv" style=" display:inline-block; margin-top: 10px; margin-bottom:10px;">
          <label>Ngày:</label>
          <input type="date" id="date" name="date" value="<?php if (isset($_GET['date'])) {
                                                            echo $_GET['date'];
                                                          } ?>">
          <button type="submit" id="buttonLocNgay" class="btn btn-success" style="width: 100px;  display:inline-block;margin-left:10px"><i class="fa-solid fa-circle-plus"></i> Lọc</button>
          <a href="<?php echo $url.'/import' ?>" type="button" id="buttonReset" class="btn btn-success" style="width: 150px; margin-left:10px;display:inline-block;"><i class="fa-solid fa-circle-plus"></i> Làm mới</a>
        </div>
      </form>
      <form action="<?php echo $url . '/import' ?>" method="GET">
        <div id="fromToDiv" style=" display:inline-block;margin-top: 10px; margin-bottom:10px;">
          <label style="font-size: 18px;">Từ:</label>
          <input type="date" id="from" name="date-start"  value="<?php if (isset($_GET['date-start'])) {
                                                            echo $_GET['date-start'];
                                                          } ?>" >
          <label style="font-size: 18px; margin-left:10px;">Đến:</label>
          <input type="date" id="to" name="date-end" value="<?php if (isset($_GET['date-end'])) {
                                                            echo $_GET['date-end'];
                                                          } ?>"  >
          <button type="submit" id="buttonLocKhoangTG" class="btn btn-success" style="width: 100px; display:inline-block; margin-left:10px"><i class="fa-solid fa-circle-plus"></i> Lọc</button>
          <a href="<?php echo $url.'/import' ?>" type="button" id="buttonReset" class="btn btn-success" style="width: 150px;  margin-left:10px;display:inline-block;"><i class="fa-solid fa-circle-plus"></i> Làm mới</a>
        </div>
      </form>
    </div>
  </div>

  <button type="button" class="btn btn-success" style="float:right; margin-top: 10px; margin-bottom: 20px; " onclick="select_supplier_form('Chọn nhà cung cấp','Chọn')">
    <i class="fa-solid fa-circle-plus"></i> Tạo phiếu nhập</button>

  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th scope="col">Mã phiếu nhập</th>
        <th scope="col">Tên nhân viên</th>
        <th scope="col">Tên nhà cung cấp</th>
        <th scope="col">Thanh toán</th>
        <th scope="col">Thời gian</th>
        <th scope="col">Trạng thái</th>
        <th scope="col" style="width: 88px;">Chi tiết</th>
        <th scope="col" style="width:214.087px; ">Hành động</th>
      </tr>
    </thead>
    <tbody class="table-group-divider ">
      <?php
      $import_model = new import_model();
      
      if (isset($_GET['date'])) {
        $query = $import_model->filterImportFollowDate($_GET['date'],$_GET['date']);
      } else if (isset($_GET['date-start']) && isset($_GET['date-end']) ) {
        $query = $import_model->filterImportFollowDate($_GET['date-start'],$_GET['date-end']);
      } else {
        $query = $import_model->getImportData();
      }
      
      while ($row = mysqli_fetch_array($query)) {
      ?>
        <tr class="tr-body" style="height: 55px;">
          <th scope="row"><?php echo $row['MaPN'] ?></th>
          <td><?php echo $row['TenNV'] ?></td>
          <td><?php echo $row['TenNCC'] ?></td>
          <td><?php echo $row['ThanhToan'] ?></td>
          <td><?php echo $row['ThoiGian'] ?></td>
          <?php if ($row['TrangThaiPN'] == 0) {
            echo '<td style="background-color: #ffc107; border-radius: 5px;">Chờ</td>';
          } else  if ($row['TrangThaiPN'] == 1) {
            echo '<td style="background-color: #198754;  border-radius: 5px;">Đã nhập</td>';
          } else {
            echo '<td style="background-color: #dc3545;border-radius: 5px;">Từ chối</td>';
          }
          ?>
          <td>
            <form action="<?php echo $url . '/import_detail'; ?> " method="POST">
              <input name="MaPN" type="hidden" value="<?php echo $row['MaPN']; ?>">
              <button type="submit" class="btn btn-warning btn-detail">Detail</button>
            </form>
          </td>
          <td>
            <?php if ($row['TrangThaiPN'] == 0) { ?>

              <form action="<?php echo $url . '/import_controller' ?>" method="POST" style="display: inline-block;">
                <input type="hidden" name="maPN" value="<?php echo $row['MaPN'] ?>">
                <button type="submit" class="btn btn-success btn-accept" name="action" value="accept"> Đồng ý </button>
              </form>

              <form action="<?php echo $url . '/import_controller' ?>" method="POST" style="display: inline-block;">
                <input type="hidden" name="maPN" value="<?php echo $row['MaPN'] ?>">
                <button type="submit" class="btn btn-danger btn-decline" name="action" value="decline">Từ chối</button>
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

  <!-- Thông báo -->
  <?php require_once('./public/template/admin/toast.php');
  toast::memo("Success", "back_import_controller", "limegreen");
  ?>

</div>

<script>
  // khai báo nhấn chọn
  var radioDate = document.getElementById("radioDate");
  var radioFromTo = document.getElementById("radioFromTo");
  // khai báo thẻ div
  var dateDiv = document.getElementById("dateDiv");
  var fromToDiv = document.getElementById("fromToDiv");
  // khóa chọn khoảng thời gian
  <?php if (isset($_GET['date'])) { ?>
    radioDate.checked = true;
    dateDiv.style.display = "block";
    fromToDiv.style.display = "none";
  <?php } else if (isset($_GET['date-start']) && isset($_GET['date-end'])) { ?>
    radioFromTo.checked = true;
    dateDiv.style.display = "none";
    fromToDiv.style.display = "block";
  <?php } else { ?>
    radioFromTo.checked = true;
    radioFromTo.checked = true;
    dateDiv.style.display = "none";
    fromToDiv.style.display = "block";
  <?php } ?>
  // khi nhấn chọn ngày
  radioDate.addEventListener("change", function() {
    if (radioDate.checked) {
      dateDiv.style.display = "block";
      fromToDiv.style.display = "none";
    }
  });

  // khi nhấn chọn khoảng thời gian
  radioFromTo.addEventListener("change", function() {
    if (radioFromTo.checked) {
      dateDiv.style.display = "none";
      fromToDiv.style.display = "block";
    }
  });


</script>