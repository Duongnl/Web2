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
  td {
            text-align: center; /* Căn giữa nội dung trong ô */
            padding-top: 15px !important; /* Thêm padding để tạo khoảng cách giữa nội dung và viền */
     }
  th{
    text-align: center; /* Căn giữa nội dung trong ô */
            padding-top: 15px !important; /* Thêm padding để tạo khoảng cách giữa nội dung và viền */
  }
  .form_container{
            display: inline-block;
  }
  .td_form{
    padding-top:9px!important;
  }
  .h1-head-name{
    margin-top: 2.5rem;
    text-align: center;
    margin-bottom: .5rem;
    font-weight: 500;
    line-height: 1.2;
    font-size: 30px;
  }
  .main-content{
    margin-top: 2.5rem;
    border: 3px solid;
    border-radius: 15px;
  }
  
</style>


<div class="main-content container">

  <h3 class="h1-head-name ">Your Order</h3>

  <?php 
    $maTK = $_SESSION['MaTK'];
    $request = $_SERVER['REQUEST_URI'];
    $url =  handle_url::getURLAdmin($request);
    $chiTietDonHangUser_model= new chiTietDonHangUser_model();
     
  ?>

  <div style="border: 2px solid #000; border-radius:10px;margin-top: 20px;width: 703.2px; margin-bottom:30px">
    <div style="margin-left: 10px;">
      <div style=" margin-top: 10px;">
        <label style="font-size:18px ;display:inline-block">Lọc đơn hàng theo : </label>
        <input type="radio" name="options" value="fromto" id="radioFromTo" style="margin-left: 10px;"> <label style=" font-size:18px;" for="radioFromTo">Khoảng thời gian</label>
        <input type="radio" name="options" value="date" id="radioDate" style="margin-left: 10px;"> <label style=" font-size:18px;" for="radioDate">Ngày</label>
      </div>
      <form action="<?php echo $url . './order' ?>" method="GET">
        <div id="dateDiv" style=" display:inline-block; margin-top: 10px; margin-bottom:10px;">
          <label>Ngày:</label>
          <input type="date" id="date" name="date" value="<?php if (isset($_GET['date'])) {
                                                            echo $_GET['date'];
                                                          } ?>">
          <button type="submit" id="buttonLocNgay" class="btn btn-success" style="width: 100px;  display:inline-block;margin-left:10px"><i class="fa-solid fa-circle-plus"></i> Filter</button>
          <a href="<?php echo $url.'./order' ?>" type="button" id="buttonReset" class="btn btn-success" style="width: 150px; margin-left:10px;display:inline-block;"><i class="fa-solid fa-circle-plus"></i> Refresh</a>
        </div>
      </form>
      <form action="<?php echo $url . './order' ?>" method="GET">
        <div id="fromToDiv" style=" display:inline-block;margin-top: 10px; margin-bottom:10px;">
          <label style="font-size: 18px;">Từ:</label>
          <input type="date" id="from" name="date-start"  value="<?php if (isset($_GET['date-start'])) {
                                                            echo $_GET['date-start'];
                                                          } ?>" >
          <label style="font-size: 18px; margin-left:10px;">Đến:</label>
          <input type="date" id="to" name="date-end" value="<?php if (isset($_GET['date-end'])) {
                                                            echo $_GET['date-end'];
                                                          } ?>"  >
          <button type="submit" id="buttonLocKhoangTG" class="btn btn-success" style="width: 100px; display:inline-block; margin-left:10px"><i class="fa-solid fa-circle-plus"></i> Filter</button>
          <a href="<?php echo $url.'./order' ?>" type="button" id="buttonReset" class="btn btn-success" style="width: 150px;  margin-left:10px;display:inline-block;"><i class="fa-solid fa-circle-plus"></i> Refresh</a>
        </div>
      </form>
    </div>
  </div>
  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th scope="col">Mã Đơn hàng</th>
        <th scope="col">Tên Khách Hàng</th>
        <th scope="col">Ngày đặt</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Tổng tiền</th>
        <th scope="col">Cập nhật trạng thái</th>
        <th scope="col">Xem chi tiết</th>
      </tr>
    </thead>
    <tbody class="table-group-divider ">
      <?php
      
      $donHangUser_model = new donHangUser_model();
      if (isset($_GET['date'])) {
        $query = $donHangUser_model->filterDonHangFollowDate($_GET['date'],$_GET['date'],$maTK);
      } else if (isset($_GET['date-start']) && isset($_GET['date-end']) ) {
        $query = $donHangUser_model->filterDonHangFollowDate($_GET['date-start'],$_GET['date-end'],$maTK);
      } else {
        $query = $donHangUser_model->getDonHangByMaTK($maTK);
      }

      while ($row = mysqli_fetch_array($query)) {
      ?>
        <tr class="tr-body" style="height: 57px;">
          <th scope="row"><?php echo $row['MaHD'] ?></th>
          <td><?php echo $row['TenTK'] ?></td>

          <td><?php echo $row['ThoiGianHD'] ?></td>

          <?php if($row['TrangThaiHD']==0){

            echo '<td style="background-color:yellow" >Chờ xử lý</td>';
              
                }else if($row['TrangThaiHD']==1){
                  echo '<td style="background-color:green">Đã xử lý</td>';

                }
                else if($row['TrangThaiHD']==2){
                  echo '<td style="background-color:red">Đã hủy</td>';

                };       
          ?>

          <td><?php echo $row['ThanhToan'] ?></td>

          <td class="td_form">
            <?php if($row['TrangThaiHD']==0){?>

            <form action=" <?php echo $url.'./orderUser_controller'  ?>" method="POST" class="form_container"> 
              <button type="submit" class="btn btn-danger btn-edit"> Hủy </button>
              <input type="hidden" name="MaHD" value="<?php echo $row['MaHD']?> ">
              <input type="hidden" name="action" value="Huy">
            </form> 

            <?php };?>
          </td>

          <td class="td_form " style="width:200px">
            <form action=" <?php echo $url.'./order_more'  ?> " method="POST" class="form_container"> 
              <input type="hidden" name="MaHD" value="<?php echo $row['MaHD']?> ">
              <button type="submit" class="btn btn-warning btn-edit">Chi tiết đơn hàng</button>
            </form> 
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>


</div>

?>
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
