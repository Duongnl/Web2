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

  .tr-body:hover .btn-delete {
    display: block;
  }
  #memo_quantity, #memo_cost, #memo_product, #memo_size {
        color: #DB4444;
        font-size: 13px;
        margin-left: 46px;
        border: 0;
        width: 300px;
    }
</style>



<div class="main-content">
  <a type="button" href="<?php echo  $url . '/import'; ?>" class="btn btn-light"><i class="fa-solid fa-arrow-left" style="display: inline-block; font-size: 30px;"></i></a>
  <h3 style="display: inline-block;padding-left: 15px;" class="h1-head-name">Import product</h3>

  <div style="display: flex; margin-top:10px;margin-bottom: 10px; justify-content: right; border-bottom: 2px solid #000;">
    <p style="font-size: 18px; margin-bottom: 0px;"> Supplier ID : <?php echo $maNCC ?> </p>
    <p style="font-size: 18px;margin-left: 100px;margin-bottom: 0px;"> Supplier name : <?php echo $tenNCC ?> </p>
  </div>

  <div style="display:flex;align-items: baseline; height: 35px;">
    <p style="font-size: 18px;margin-right: 20px;">Product: </p>
    <select id="select_product" class="form-select select-filter-type" aria-label="Default select example">
      <option value="0" disabled selected hidden>Select product</option>
      <?php
      $import_model = new import_model();
      $query = $import_model->getProductData();
      while ($row = mysqli_fetch_array($query)) {
      ?>
        <option value="<?php echo $row['MaSP'] ?>"> <?php echo $row['MaSP'] . ' - ' . $row['TenSP'] ?> </option>
      <?php } ?>
    </select>
  </div>
  <input type="text" value="" id="memo_product" style="margin-left: 95px;margin-bottom: 10px;"  disabled  >


  <!-- size -->
  <div style="display:flex; align-items: baseline;height: 35px;">
    <p style="font-size: 18px;margin-right: 55px;">Size: </p>
    <select id="select_size" class="form-select select-filter-type" aria-label="Default select example">
      <option value="0" disabled selected hidden>Select size</option>
    </select>
  </div>
  <input type="text" value="" id="memo_size" style="margin-left: 95px;margin-bottom: 10px;"  disabled  >



  <div style="display:flex;align-items: baseline; height: 35px; ">
    <p style="font-size: 18px;margin-right: 13px;">Quantity: </p>
    <div class="input-group flex-nowrap">
      <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-plus"></i></span>
      <input id="quantity" name="quantity" type="number" class="form-control" placeholder="Quantity product" aria-label="Username" aria-describedby="addon-wrapping">
    </div>
  </div>
  <input type="text" value="" id="memo_quantity" style="margin-left: 95px;margin-bottom: 10px;"  disabled  >



  <div style="display:flex;align-items: baseline; height: 35px; ">
    <p style="font-size: 18px;margin-right: 47px;">Cost: </p>
    <div class="input-group flex-nowrap">
      <span class="input-group-text" id="addon-wrapping" style=" padding-right: 13px; padding-left: 16px;"><i class="fa-solid fa-dollar-sign"></i></span>
      <input id="cost" name="cost" type="number" class="form-control" placeholder="Dollar" aria-label="Username" aria-describedby="addon-wrapping">
    </div>
    <button id="button_add" type="button" class="btn btn-success" style=" margin-left : 10px; width:150px;">Add</button>
  </div>
  <input type="text" value="" id="memo_cost" style="margin-left: 95px;margin-bottom: 10px;" disabled  >



  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th scope="col">Product ID</th>
        <th scope="col">Product name</th>
        <th scope="col">Size</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody class="table-group-divider ">
      <tr class="tr-body" style="height: 55px;">
        <th scope="row">1</th>
        <td>Áo thun vải kaki hàng nhập khẩu</td>
        <td>L</td>
        <td>50$</td>
        <td>5</td>
        <td>250$</td>
        <td> <button type="button" class="btn btn-danger btn-delete"> <i class="fa-solid fa-trash"></i></button></td>
      </tr>
      <tr class="tr-body" style="height: 55px;">
        <th scope="row">2</th>
        <td>Quần thun đen</td>
        <td>XL</td>
        <td>60$</td>
        <td>5</td>
        <td>300$</td>
        <td> <button type="button" class="btn btn-danger btn-delete"> <i class="fa-solid fa-trash"></i></button></td>
      </tr>
    </tbody>
  </table>
</div>


<script>





  $(document).ready(function() {
    document.getElementById('select_product').addEventListener('change', function() {
      var select_product = document.getElementById("select_product").value;
      var select_size = document.getElementById("select_size");
      select_size.options.length = 0;
      $.post("../admin/controller/import_form_controller.php", {
          maSP: select_product,
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
  
   function inspectProduct (product,size,quantity,cost) {
       var memo_product = document.getElementById("memo_product");
       var memo_size = document.getElementById("memo_size");
       var memo_quantity = document.getElementById("memo_quantity");
       var memo_cost = document.getElementById("memo_cost");
       var memo = {}; // Khai báo và khởi tạo đối tượng memo
       var flag =true;
       if (quantity == "") {
       memo['memo_quantity'] = "Quantity is not empity !";
       flag =false;
       } else {
        memo['memo_quantity'] = "";
       };

       if (cost == "") {
        memo['memo_cost'] = "Cost is not empity !";
        flag =false;
       }  else {
        memo['memo_cost'] = "";
       };

       if (product == 0) {
        memo['memo_product'] = "Product is not empity !";
        flag =false;
       } else {
        memo['memo_product'] = "";
       };

       if (size == 0) {
        memo['memo_size'] = "Size is not empity !";
        flag =false;
       } else {
        memo['memo_size'] = "";
       };

       memo_quantity.value= memo['memo_quantity'];
       memo_cost.value = memo['memo_cost'];
       memo_product.value = memo['memo_product'];
       memo_size.value = memo['memo_size'];
       return flag;
   }

    $('#button_add').click(function () {
       var product =document.getElementById("select_product").value;
       var size =document.getElementById("select_size").value;
       var quantity = document.getElementById("quantity").value;
       var cost = document.getElementById("cost").value;
       var flag = inspectProduct(product,size,quantity,cost);
       if (flag == true) {
        console.log("")
       } else {

       }

      
    });
  
  
  
  });
</script>