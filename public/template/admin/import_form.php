<?php
$request = $_SERVER['REQUEST_URI'];
$url =  handle_url::getURLAdmin($request);

if (isset($_POST['supplier'])) {
  $supplier_data = json_decode($_POST['supplier'], true);
  $maNCC = $supplier_data['MaNCC'];
  $tenNCC = $supplier_data['TenNCC'];
}
?>

<style>
  .btn-delete {
    display: none;
  }

  tr {
    height: 55px;
  }

  tr:hover .btn-delete {
    display: block;
  }

  #memo_quantity,
  #memo_cost,
  #memo_product,
  #memo_size {
    color: #DB4444;
    font-size: 13px;
    margin-left: 46px;
    border: 0;
    width: 300px;
  }
</style>



<div class="main-content">
  <a type="button" href="<?php echo  $url . '/import'; ?>" class="btn btn-light"><i class="fa-solid fa-arrow-left" style="display: inline-block; font-size: 30px;"></i></a>
  <h3 style="display: inline-block;padding-left: 15px;" class="h1-head-name">Nhập hàng</h3>

  <div style="display: flex; margin-top:10px;margin-bottom: 10px; justify-content: right; border-bottom: 2px solid #000;">
    <div style="display:flex;margin-bottom: 0px;" >
      <p style="font-size: 18px;">Mã nhà cung cấp :</p>
      <input id="maNCC" style="border: 0;font-size: 18px;margin-bottom: 20px; width:100px;" disabled value=" <?php echo $maNCC ?>">
    </div>
    <p style="font-size: 18px;margin-bottom: 5px;"> Tên nhà cung cấp : <?php echo $tenNCC ?> </p>
  </div>

  <div style="display:flex;align-items: baseline; height: 35px;">
    <p style="font-size: 18px;margin-right: 20px;">Sản phẩm: </p>
    <select id="select_product" class="form-select select-filter-type" aria-label="Default select example">
      <option value="0" disabled selected hidden>Chọn sản phẩm</option>
      <?php
      $import_model = new import_model();
      $query = $import_model->getProductData();
      while ($row = mysqli_fetch_array($query)) {
        $data = array();
        $data['MaSP'] = $row['MaSP'];
        $data['TenSP'] = $row['TenSP'];

      ?>
        <option value="<?php echo htmlspecialchars(json_encode($data));  ?>"> <?php echo $row['MaSP'] . ' - ' . $row['TenSP'] ?> </option>
      <?php } ?>
    </select>
  </div>
  <input type="text" value="" id="memo_product" style="margin-left: 95px;margin-bottom: 10px;" disabled>


  <!-- size -->
  <div style="display:flex; align-items: baseline;height: 35px;">
    <p style="font-size: 18px;margin-right: 55px;">Size: </p>
    <select id="select_size" class="form-select select-filter-type" aria-label="Default select example">
      <option value="0" disabled selected hidden>Chọn size</option>
    </select>
  </div>
  <input type="text" value="" id="memo_size" style="margin-left: 95px;margin-bottom: 10px;" disabled>



  <div style="display:flex;align-items: baseline; height: 35px; ">
    <p style="font-size: 18px;margin-right: 13px;">Số lượng: </p>
    <div class="input-group flex-nowrap">
      <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-plus"></i></span>
      <input  id="quantity" name="quantity" type="number" class="form-control" placeholder="Quantity product" aria-label="Username" aria-describedby="addon-wrapping">
    </div>
  </div>
  <input type="text" value="" id="memo_quantity" style="margin-left: 95px;margin-bottom: 10px;" disabled>



  <div style="display:flex;align-items: baseline; height: 35px; ">
    <p style="font-size: 18px;margin-right: 47px;">Đơn giá: </p>
    <div class="input-group flex-nowrap">
      <span class="input-group-text" id="addon-wrapping" style=" padding-right: 13px; padding-left: 16px;"><i class="fa-solid fa-dollar-sign"></i></span>
      <input  id="cost" name="cost" type="number" class="form-control" placeholder="VND" aria-label="Username" aria-describedby="addon-wrapping">
    </div>
    <button id="button_add" type="button" class="btn btn-success" style=" margin-left : 10px; width:150px;">Thêm</button>
  </div>
  <input type="text" value="" id="memo_cost" style="margin-left: 95px;margin-bottom: 10px;" disabled>



  <table id="detailTable" class="table table-striped table-hover ">
    <thead>
      <tr>
        <th scope="col">Mã sản phẩm</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Size</th>
        <th scope="col">Đơn giá</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Thành tiền</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody class="table-group-divider ">

    </tbody>
  </table>

  <div style="  display: flex;justify-content: space-between;margin-right: 20px;">
    <div style="margin-right: auto; display:flex; ">
      <p style="font-size: 18px; margin-bottom: 0px;margin-top: 26px;">Thanh toán: </p>
      <p id="total-import" style="font-size: 18px;margin-left: 10px;margin-bottom: 0px;margin-top: 26px;">0</p>
    </div>

    <button type="button" id="button-import" class="btn btn-success" style="margin-top: 10px; margin-bottom: 10px;width: 125px;height: 40px;  margin-left: auto; ">
      <i class="fa-solid fa-circle-plus"></i> Nhập </button>
  </div>


  <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: limegreen">
      <div class="toast-header">
        <i class="fa-solid fa-comment rounded me-2"></i>
        <strong class="me-auto">Notification</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Thành công
      </div>   
    </div>
  </div>


</div>


<script>
  $(document).ready(function() {
    document.getElementById('select_product').addEventListener('change', function() {

      var select_product = JSON.parse(document.getElementById("select_product").value);
      var select_size = document.getElementById("select_size");
      select_size.options.length = 0;
      $.post("../admin/controller/import_form_controller.php", {
          maSP: select_product['MaSP'],
        },

        function(data, status) {
          var sizes = JSON.parse(data);
          if (sizes.length == 0) {
            var option = document.createElement("option");
            option.value = "0";
            option.disabled = true;
            option.selected = true;
            option.hidden = true;
            option.textContent = "Size is empty";
            select_size.add(option);
          } else {
            for (var i = 0; i < sizes.length; i++) {
              var option = document.createElement("option");
              option.text = sizes[i];
              option.value = sizes[i];
              select_size.add(option);
            }
          }
        });


    });

    function inspectProduct(product, size, quantity, cost) {
      var memo_product = document.getElementById("memo_product");
      var memo_size = document.getElementById("memo_size");
      var memo_quantity = document.getElementById("memo_quantity");
      var memo_cost = document.getElementById("memo_cost");
      var memo = {}; // Khai báo và khởi tạo đối tượng memo
      var flag = true;
      if (quantity == "") {
        memo['memo_quantity'] = "Không được để trống số lượng !";
        flag = false;
      } else if (Number(quantity) >1000000 || Number(quantity) <1) {
        memo['memo_quantity'] = "Số lượng không hợp lệ !";
        flag = false;
      }
      else {
        memo['memo_quantity'] = "";
      };

      if (cost == "") {
        memo['memo_cost'] = "Không được để trống giá !";
        flag = false;
      } else if (Number(cost)>10000000 || Number(cost)<1 ) {
        memo['memo_cost'] = "Giá không hợp lệ !";
        flag = false;
      } 
      else {
        memo['memo_cost'] = "";
      };

      if (product == 0) {
        memo['memo_product'] = "Vui lòng chọn sản phẩm !";
        flag = false;
      } else {
        memo['memo_product'] = "";
      };

      if (size == 0) {
        memo['memo_size'] = "Vui lòng chọn size !";
        flag = false;
      } else {
        memo['memo_size'] = "";
      };

      memo_quantity.value = memo['memo_quantity'];
      memo_cost.value = memo['memo_cost'];
      memo_product.value = memo['memo_product'];
      memo_size.value = memo['memo_size'];
      return flag;
    }

    function toast() {
      const toastLiveExample = document.getElementById('liveToast')
      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
      toastBootstrap.show()
    }

    function totalImport() {
      var total = 0;
      var table = document.getElementById("detailTable");
      for (var i = 1; i < table.rows.length; i++) {
        var row = table.rows[i];
        total += parseInt(row.cells[5].innerHTML)

      }
      document.getElementById("total-import").innerHTML = total;
    }

    $('#button_add').click(function() {
      console.log("có vào");
      var product = JSON.parse(document.getElementById("select_product").value);
      var size = document.getElementById("select_size").value;
      var quantity = document.getElementById("quantity").value;
      var cost = document.getElementById("cost").value;
      var flag = inspectProduct(product, size, quantity, cost);
      if (flag == true) {
        addProductToTable(product, size, quantity, cost);
        toast();
        totalImport();
      }
    });

    function addProductToTable(product, size, quantity, cost) {
      var table = document.getElementById("detailTable");
      flag = true;
      for (var i = 0; i < table.rows.length; i++) {
        var row = table.rows[i];
        if (product['MaSP'] == row.cells[0].innerHTML && size == row.cells[2].innerHTML && cost == row.cells[3].innerHTML) {
          row.cells[4].innerHTML = parseInt(row.cells[4].innerHTML) + parseInt(quantity);
          console.log(cost);
          row.cells[5].innerHTML = parseInt(row.cells[4].innerHTML) * parseInt(cost);
          flag = false;
        }
      }

      if (flag) {
        var row = table.insertRow();
        var cellMaSP = row.insertCell(0);
        var cellTenSP = row.insertCell(1);
        var cellSize = row.insertCell(2);
        var cellCost = row.insertCell(3);
        var cellQuantity = row.insertCell(4);
        var cellTotal = row.insertCell(5);
        var cellAction = row.insertCell(6);

        cellMaSP.innerHTML = product['MaSP'];
        cellTenSP.innerHTML = product['TenSP'];
        cellSize.innerHTML = size;
        cellCost.innerHTML = cost;
        cellQuantity.innerHTML = quantity;
        cellTotal.innerHTML = cost * quantity;
        cellAction.innerHTML = '<button type="button"  class="btn btn-danger btn-delete" onclick="deleteRow(this)"> <i class="fa-solid fa-trash"></i></button>';
      }
    }

    $('#button-import').click(function() {
      console.log("Có vào");
      var table = document.getElementById('detailTable'); // Thay 'myTable' bằng ID của bảng
      if (table.rows.length > 1) {
        var ListCTPNValue = getTableCTPN();
        var total_import_data = document.getElementById("total-import").innerText;
        var maNCC_data = document.getElementById('maNCC').value;
        
        $.ajax({
          url: '../admin/controller/import_form_controller.php', // Đường dẫn đến file PHP
          method: 'POST',
          data: {
            listCTPN: ListCTPNValue,
            total_import: total_import_data,
            maNCC: maNCC_data
          }, // Dữ liệu muốn gửi đi
          success: function(response) {
            // $('#showData').html(response);
            alert("Gửi yêu cầu thành công mã phiếu nhập là : " + response);
            window.location.href = '<?php echo $url.'/import' ?>';
          }
        });
      } else {
        alert('Vui lòng nhập sản phẩm cần nhập !');
      }



    });

    function getTableCTPN() {
      var table = document.getElementById("detailTable");
      var data = [];

      for (var i = 1; i < table.rows.length; i++) {
        var rowData = [];
        var row = table.rows[i];

        for (var j = 0; j < row.cells.length - 1; j++) {
          if (j != 1) {
            // console.log(row.cells[j].innerHTML);
            rowData.push(row.cells[j].innerHTML);
          }

        }
        data.push(rowData);
      }
      return data;
    }

  });

  function deleteRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
    const toastLiveExample = document.getElementById('liveToast')
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
    toastBootstrap.show()
    var total = 0;
    var table = document.getElementById("detailTable");
    for (var i = 1; i < table.rows.length; i++) {
      var row = table.rows[i];
      total += parseInt(row.cells[5].innerHTML)

    }
    document.getElementById("total-import").innerHTML = total;
  }
</script>