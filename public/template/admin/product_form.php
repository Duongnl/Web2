<style>
#product_form {}

#memo {
  display: none;
  color: #DB4444;
  font-size: 13px;
  margin-left: 46px;
}
</style>
<?php 
  
?>
<div class="main-content">
  <form action="../admin/controller/product_controller.php" method="POST" id="product_form">
    <input type="hidden" id="action" name="action" value="">
    <h3 style="text-align: center;">Add Product</h3>
    <div class="input-group flex-nowrap" style="margin-top: 20px;">
      <label for="product-name" class="input-group-text" id="addon-wrapping">
        <i class="bx bxl-product-hunt"></i></label>
      <input id="product-name" name="product-name" type="text" class="form-control" placeholder="Name product">
    </div>
    <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
      <label for="product-desc" class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-message"></i></label>
      <textarea id="product-desc" name="product-desc" rows="4" cols="50" class="form-floating"
        placeholder="Description"></textarea>
    </div>
    <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
      <label for="product-category" class="input-group-text" id="addon-wrapping"><i
          class="fa-solid fa-list"></i></label>
      <select id="product-category" name="product-category" class="form-select">
        <option value="">--Choose category--</option>
        <option value="">b</option>
      </select>
    </div>
    <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
      <label for="product-sale" class="input-group-text" id="addon-wrapping"><i
          class="fa-solid fa-percent icon"></i></label>
      <select id="product-sale" name="product-sale" class="form-select">
        <option value="">--Choose sale--</option>
        <option value="">b</option>
      </select>
    </div>
    <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
      <label for="product-sex" class="input-group-text" id="addon-wrapping"><i
          class="fa-solid fa-mars-and-venus"></i></label>
      <select id="product-sex" name="product-sex" class="form-select">
        <option value="">--Choose sex--</option>
        <option value="">All</option>
        <option value="">Men</option>
        <option value="">Women</option>
      </select>
    </div>
    <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
      <label for="product-size" class="input-group-text" id="addon-wrapping"><i class='bx bx-font-size'></i></label>
      <select id="product-size" name="product-size" class="form-select">
        <option value="">--Choose size--</option>
        <option value="">S</option>
        <option value="">M</option>
        <option value="">L</option>
      </select>
      <button class="btn btn-primary">Add size</button>
    </div>
    <table class="table table-striped" style="text-align:center">
      <thead>
        <tr>
          <th scope="col">Size</th>
          <th scope="col">Quantity</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <tr>
          <th scope="row">S</th>
          <td>10</td>
          <td><button class="btn btn-danger">Delete</button></td>
        </tr>
        <tr>
          <th scope="row">M</th>
          <td>100</td>
          <td><button class="btn btn-danger">Delete</button></td>
        </tr>
        <tr>
          <th scope="row">L</th>
          <td>50</td>
          <td><button class="btn btn-danger">Delete</button></td>
        </tr>
      </tbody>
    </table>
    <!-- <b id="memo"> Supplier name is empty !</b> -->

    <input id="btn-supplier-form" type="submit" class="btn btn-success"
      style=" margin:0 auto;display:block; margin-top: 20px; " onclick="return inspect()" value="Add"></input>
</div>
</form>
</div>












<script>
function product_form(maNCC, tenNCC, formName, action, buttonName) {
  document.getElementById("product_form").style.display = "block";
  document.getElementById("overlay").style.display = "block";
  document.getElementById("input-text-head").value = formName;
  document.getElementById("supplier_id").value = maNCC;
  document.getElementById("supplier_name").value = tenNCC;
  document.getElementById("action").value = action;
  document.getElementById("btn-supplier-form").value = buttonName;
  if (action == 'delete') {
    document.getElementById("supplier_name").readOnly = true;
  } else {
    document.getElementById("supplier_name").readOnly = false;
  }

}

function exit_product() {
  document.getElementById("product_form").style.display = "none";
  document.getElementById("memo").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}

function click_overlay() {
  document.getElementById("product_form").style.display = "none";
  document.getElementById("memo").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}



function inspect() {
  var supplier_name = document.getElementById("supplier_name").value.trim();
  if (supplier_name == "") {
    document.getElementById("memo").style.display = "block";
    return false;
  } else {
    return true;
  }
}
</script>