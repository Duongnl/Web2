<style>
  #product_form {}

  .memo {
    display: none;
    color: #DB4444;
    font-size: 13px;
    margin-left: 46px;
  }

  .img-container {
    margin-top: 10px;
    position: relative;
    background-color: #fff;
    /* width: fit-content; */

    width: 200px;
    /* Chiều rộng của hình chữ nhật */
    height: 150px;
    /* Chiều cao của hình chữ nhật */
    border: 2px solid #000;
    /* Đường viền của hình chữ nhật */
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    background-color: #f0f0f0;
  }

  .img-container img {
    display: none;
    max-height: 140px;
    width: 140px;
    object-fit: cover;
  }

  .img-container label {
    font-size: 14px;
    cursor: pointer;
  }

  .btn-delete-img {
    display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .selected:hover .btn-delete-img {
    display: block;
  }
</style>

<?php
$request = $_SERVER['REQUEST_URI'];
$url = handle_url::getURLAdmin($request);
$action = explode("/", $baseName)[1];
$title;
switch ($action) {
  case "add":
    $title = "Add Product";
    $method = "POST";
    break;
  case "edit":
    $title = "Edit Product";
    $method = "PUT";
    break;
  case "view":
    $title = "View Product";
    $method = "GET";
    break;
}

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $product_model = new product_model();
  $product = mysqli_fetch_array($product_model->getSP($id));
  $listSize = $product_model->getSizeSP($id);
  $maAnh = $product["MaAnhChinh"];

  $anhChinh = mysqli_fetch_array($product_model->getMainImg($product['MaAnhChinh']));

  $listAnhPhu = $product_model->getSubImgs($product['MaAnhChinh']);

  $anhPhu1 = mysqli_fetch_array($listAnhPhu);
  $anhPhu2 = mysqli_fetch_array($listAnhPhu);
  $anhPhu3 = mysqli_fetch_array($listAnhPhu);

}
?>
<div class="main-content">
  <form action=<?php echo $toAdmin . "/controller/product_controller" ?> method="<?php echo $method; ?>"
    id="product_form" enctype="multipart/form-data">
    <h3 style="text-align: center;"><?php echo $title ?></h3>
    <div class="input-group flex-nowrap" style="margin-top: 20px;">
      <label for="product-name" class="input-group-text" id="addon-wrapping">
        <i class="bx bxl-product-hunt"></i></label>
      <input id="product-name" name="product-name" type="text" class="form-control" placeholder="Name product" required
        <?php echo $method == "GET" ? "disabled" : "" ?> value="<?php echo $method != "POST" ? $product['TenSP'] : "" ?>">
    </div>
    <b class="memo" id="msg-name"></b>
    <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
      <label for="product-desc" class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-message"></i></label>
      <textarea id="product-desc" name="product-desc" rows="4" cols="50" class="form-control" placeholder="Description"
        <?php echo $method == "GET" ? "disabled" : "" ?>
        value="<?php echo $method != "POST" ? $product['MoTa'] : "" ?>"></textarea>
    </div>
    <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
      <label for="product-category" class="input-group-text" id="addon-wrapping"><i
          class="fa-solid fa-list"></i></label>
      <select id="product-category" name="product-category" class="form-select" <?php echo $method == "GET" ? "disabled" : "" ?>>
        <option value>--Choose category--</option>
        <?php
        $category_model = new category_model();
        $query = $category_model->getcategoryData();
        while ($row = mysqli_fetch_array($query)) {
          ?>
          <option value="<?php echo $row['MaDM'] ?>" <?php echo $method != "POST" && $row['MaDM'] == $product["MaDM"] ? "selected" : "" ?>>
            <?php echo $row['MaDM'] . ' - ' . $row['TenDM'] ?>
          </option>
        <?php } ?>
      </select>
    </div>
    <b class="memo" id="msg-category"></b>

    <div class="input-group flex-nowrap" style="margin-top: 20px;">
      <label for="product-price" class="input-group-text" id="addon-wrapping">
        <i class="fa-solid fa-money-bill"></i></label>
      <input id="product-price" name="product-price" type="number" class="form-control" placeholder="Product price"
        required <?php echo $method == "GET" ? "disabled" : "" ?>
        value="<?php echo $method != "POST" ? $product['GiaBan'] : "" ?>">
    </div>
    <b class="memo" id="msg-price"></b>

    <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
      <label for="product-sale" class="input-group-text" id="addon-wrapping"><i
          class="fa-solid fa-percent icon"></i></label>
      <select id="product-sale" name="product-sale" class="form-select" <?php echo $method == "GET" ? "disabled" : "" ?>>
        <option value>--Choose sale--</option>
        <?php
        $discount_model = new discount_model();
        $query = $discount_model->getdiscountData();
        while ($row = mysqli_fetch_array($query)) {
          ?>
          <option value="<?php echo $row['MaKM'] ?>" <?php echo $method != "POST" && $row['MaKM'] == $product["MaKM"] ? "selected" : "" ?>>
            <?php echo $row['TenKM'] . ' - ' . $row['PhanTramKM'] . '%' ?>
          </option>
        <?php } ?>
      </select>
    </div>
    <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
      <label for="product-sex" class="input-group-text" id="addon-wrapping"><i
          class="fa-solid fa-mars-and-venus"></i></label>
      <select id="product-sex" name="product-sex" class="form-select" <?php echo $method == "GET" ? "disabled" : "" ?>>
        <option value>--Choose sex--</option>
        <option value="2" <?php echo $method != "POST" && $product['GioiTinh'] == "2" ? "selected" : "" ?>>All
        </option>
        <option value="1" <?php echo $method != "POST" && $product['GioiTinh'] == "1" ? "selected" : "" ?>>Men</option>

        <option value="0" <?php echo $method != "POST" && $product['GioiTinh'] == "0" ? "selected" : "" ?>>Women
        </option>

      </select>
    </div>
    <b class="memo" id="msg-sex"></b>
    <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
      <label for="product-size" class="input-group-text" id="addon-wrapping"><i class='bx bx-font-size'></i></label>
      <select id="product-size" name="product-size" class="form-select" <?php echo $method == "GET" ? "disabled" : "" ?>>
        <option value>--Choose size--</option>
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
        <option value="XXL">XXL</option>
      </select>
      <button type="button" class="btn btn-primary" onclick="addSize()" <?php echo $method == "GET" ? "disabled" : "" ?>>Add size</button>
    </div>
    <b class="memo" id="msg-size"></b>
    <table id="tblSize" class="table table-striped" style="text-align:center" <?php echo $method == "GET" ? "disabled" : "" ?>>
      <thead>
        <tr>
          <th scope="col">Size</th>
          <th scope="col">Quantity</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <?php

        while ($method != "POST" && $row = mysqli_fetch_array($listSize)) {
          ?>
          <tr>
            <th scope="row"><?php echo $row["MaSize"] ?></th>
            <td><?php echo $row["SoLuong"] ?></td>
            <td><button type="button" class="btn btn-danger">Delete</button></td>
          </tr>
        <?php }
        ?>
        <!-- <tr>
          <th scope="row">S</th>
          <td>10</td>
          <td><button type="button" class="btn btn-danger">Delete</button></td>
        </tr>
        <tr>
          <th scope="row">M</th>
          <td>100</td>
          <td><button type="button" class="btn btn-danger">Delete</button></td>
        </tr>
        <tr>
          <th scope="row">L</th>
          <td>50</td>
          <td><button type="button" class="btn btn-danger">Delete</button></td>
        </tr> -->
      </tbody>
    </table>

    <div id="img-main" class="img-container <?php echo $method == "PUT" && $anhChinh["Url"] ? "selected" : "" ?>">
      <!-- <img src=<?php echo $rootDirectory . "/public/images/img1.png" ?> alt=""> -->
      <label for="product-image" class="input-group-text" id="addon-wrapping" <?php echo $method != "POST" && $anhChinh["Url"] ? "style='display:none'" : "" ?>><i class="fa-solid fa-image p-1"></i>
        Main
        image</label>
      <img alt="" <?php echo $method != "POST" ? 'src="' . $rootDirectory . $anhChinh["Url"] . '" style="display:block"' : "" ?>>
      <input type="text" name="maAnhChinh" id="maAnhChinh"
        value="<?php echo $method == "PUT" ? $anhChinh["MaAnhChinh"] : "" ?>" hidden>
      <input id="image-upload" name="image-upload" type="file" class="form-control" accept="image/*"
        style="display: none;" <?php echo $method == "GET" ? "disabled" : "" ?>>
      <button type="button" class=" btn btn-danger btn-delete-img">Delete</button>
    </div>
    <b class="memo" id="msg-img"></b>

    <div class="d-flex flex-wrap gap-2">
      <div id="img-1" class="img-container <?php echo $method == "PUT" && $anhPhu1 ? "selected" : "" ?>">
        <label for="product-image" class="input-group-text" id="addon-wrapping" <?php echo $method != "POST" && $anhPhu1 ? "style='display:none'" : "" ?>><i class="fa-solid fa-image p-1"></i>
          Sub-image 1</label>
        <img alt="" <?php echo $method != "POST" && $anhPhu1 ? 'src="' . $rootDirectory . $anhPhu1["Url"] . '" style="display:block"' : "" ?>>
        <input type="text" name="anhPhu1" id="anhPhu1"
          value="<?php echo $method == "PUT" && $anhPhu1 ? $anhPhu1["MaAnhPhu"] : "" ?>" hidden>
        <input id="sub-image-upload-1" name="sub-image-upload-1" type="file" class="form-control" accept="image/*"
          style="display: none;" <?php echo $method == "GET" ? "disabled" : "" ?>>
        <button type="button" class=" btn btn-danger btn-delete-img">Delete</button>
      </div>
      <div id="img-2" class="img-container <?php echo $method == "PUT" && $anhPhu2 ? "selected" : "" ?>">
        <label for="product-image" class="input-group-text" id="addon-wrapping" <?php echo $method != "POST" && $anhPhu2 ? "style='display:none'" : "" ?>><i class="fa-solid fa-image p-1"></i>
          Sub-image 2</label>
        <img alt="" <?php echo $method != "POST" && $anhPhu2 ? 'src="' . $rootDirectory . $anhPhu2["Url"] . '" style="display:block"' : "" ?>>
        <input type="text" name="anhPhu2" id="anhPhu2"
          value="<?php echo $method == "PUT" && $anhPhu2 ? $anhPhu2["MaAnhPhu"] : "" ?>" hidden>
        <input id="sub-image-upload-2" name="sub-image-upload-2" type="file" class="form-control" accept="image/*"
          style="display: none;" <?php echo $method == "GET" ? "disabled" : "" ?>>
        <button type="button" class=" btn btn-danger btn-delete-img">Delete</button>
      </div>
      <div id="img-3" class="img-container <?php echo $method == "PUT" && $anhPhu3 ? "selected" : "" ?> ">
        <label for="product-image" class="input-group-text" id="addon-wrapping" <?php echo $method != "POST" && $anhPhu3 ? "style='display:none'" : "" ?>><i class="fa-solid fa-image p-1"></i>
          Sub-image 3</label>
        <img alt="" <?php echo $method != "POST" && $anhPhu3 ? 'src="' . $rootDirectory . $anhPhu3["Url"] . '" style="display:block"' : "" ?>>
        <input type="text" name="anhPhu3" id="anhPhu3"
          value="<?php echo $method == "PUT" && $anhPhu3 ? $anhPhu3["MaAnhPhu"] : "" ?>" hidden>
        <input id="sub-image-upload-3" name="sub-image-upload-3" type="file" class="form-control" accept="image/*"
          style="display: none;" <?php echo $method == "GET" ? "disabled" : "" ?>>
        <button type="button" class=" btn btn-danger btn-delete-img">Delete</button>
      </div>
    </div>
    <div class="d-flex justify-content-center gap-2" style=" margin-top: 20px; ">
      <input id="btn-supplier-form" type="submit" class="btn btn-success" onclick="return validate()"
        value="<?php echo $title ?>" <?php echo $method == "GET" ? "style='display:none'" : "" ?>></input>
      <a href="<?php echo $url . '/product' ?>">
        <button type="button" class="btn btn-danger">Cancle</button>
      </a>
    </div>

</div>
</form>
</div>

<?php require_once ('./public/template/admin/toast.php');
toast::memo("Add Fail", "add-fail", "#db4444");
?>


<script>
  document.getElementById('img-main').addEventListener('click', () => {
    var input = document.getElementById('image-upload');
    input.click();
  });

  document.getElementById('img-1').addEventListener('click', () => {
    var input = document.getElementById('sub-image-upload-1');
    input.click();
  });

  document.getElementById('img-2').addEventListener('click', () => {
    var input = document.getElementById('sub-image-upload-2');
    input.click();
  });

  document.getElementById('img-3').addEventListener('click', () => {
    var input = document.getElementById('sub-image-upload-3');
    input.click();
  });

  document.getElementById('image-upload').addEventListener('change', function (event) {
    loadImg('img-main', event)
  });


  document.getElementById('sub-image-upload-1').addEventListener('change', function (event) {
    loadImg('img-1', event)
  });

  document.getElementById('sub-image-upload-2').addEventListener('change', function (event) {
    loadImg('img-2', event)
  });

  document.getElementById('sub-image-upload-3').addEventListener('change', function (event) {
    loadImg('img-3', event)
  });

  function loadImg(element, eventInput) {
    var file = eventInput.target.files[0];
    var reader = new FileReader();
    if (file) {
      reader.addEventListener("load", function (event) {
        document.querySelector(`#${element} img`).src = event.target.result;
        document.querySelector(`#${element} img`).style = 'display:block';
      });

      document.getElementById(element).classList.add('selected');
      document.querySelector(`#${element} label`).style = 'display:none';
      reader.readAsDataURL(file);
    }

    document.querySelector(`#${element} button`).addEventListener('click', (event) => {
      event.stopPropagation();
      document.getElementById(element).classList.remove('selected');
      document.querySelector(`#${element} label`).style = 'display:block';
      document.querySelector(`#${element} img`).style = 'display:none';
      document.querySelector(`#${element} img`).src = '';
      eventInput.target.value = "";
    });
  }


  function addSize() {
    var size = document.getElementById('product-size')
    if (size.value) {
      document.querySelector("#tblSize tbody").innerHTML += `
        <tr>
          <th scope="row"><input type="hidden" value="${size.value}" name="ArraySize[]"> ${size.value}</th>
          <td><input type="hidden" value="0" name="ArrayQuantity[]">0</td>
          <td><button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button></td>
        </tr>
        `;
      size.remove(size.selectedIndex)
      size.selectedIndex = 0;
    }
  }

  function deleteRow(event) {
    var sizeCombo = document.getElementById('product-size')
    var index = event.parentNode.parentNode.rowIndex
    var tblSize = document.getElementById("tblSize")
    var quantity = tblSize.rows[index].cells[1].innerHTML.value;
    var size = tblSize.rows[index].cells[0].innerHTML;
    console.log(quantity)
    if (quantity != 0) {
      alert("Cannot delete size has quantity > 0")
    } else {
      sizeCombo.innerHTML += `<option value=${size}>${size}</option>`
      tblSize.deleteRow(index);
    }
  }


  // function product_form(maNCC, tenNCC, formName, action, buttonName) {
  //   document.getElementById("product_form").style.display = "block";
  //   document.getElementById("overlay").style.display = "block";
  //   document.getElementById("input-text-head").value = formName;
  //   document.getElementById("supplier_id").value = maNCC;
  //   document.getElementById("supplier_name").value = tenNCC;
  //   document.getElementById("action").value = action;
  //   document.getElementById("btn-supplier-form").value = buttonName;
  //   if (action == 'delete') {
  //     document.getElementById("supplier_name").readOnly = true;
  //   } else {
  //     document.getElementById("supplier_name").readOnly = false;


  function exit_product() {

  }

  function validate() {
    var flag = 1;
    var productName = document.getElementById('product-name')
    var productPrice = document.getElementById('product-price')
    var selectCategory = document.getElementById('product-category')
    var selectSex = document.getElementById('product-sex')
    var tblSize = document.getElementById('tblSize')
    var imgMain = document.getElementById('img-main')
    if (!productName.value.trim()) {
      flag = 0;
      document.getElementById('msg-name').style = 'display:block';
      document.getElementById('msg-name').innerText = 'Please input name product';
    } else {
      document.getElementById('msg-name').style = 'display:none';
    }

    if (!productPrice.value) {
      flag = 0;
      document.getElementById('msg-price').style = 'display:block';
      document.getElementById('msg-price').innerText = 'Please input price product';
    } else {
      document.getElementById('msg-price').style = 'display:none';
    }

    if (!selectCategory.value) {
      flag = 0;
      document.getElementById('msg-category').style = 'display:block';
      document.getElementById('msg-category').innerText = 'Please choose category';
    } else {
      document.getElementById('msg-category').style = 'display:none';
    }
    if (!selectSex.value) {
      flag = 0;
      document.getElementById('msg-sex').style = 'display:block';
      document.getElementById('msg-sex').innerText = 'Please choose sex';
    } else {
      document.getElementById('msg-sex').style = 'display:none';
    }

    if (tblSize.rows.length == 1) {
      flag = 0;
      document.getElementById('msg-size').style = 'display:block';
      document.getElementById('msg-size').innerText = 'Please add at least one size in table';
    } else {
      document.getElementById('msg-size').style = 'display:none';
    }

    if (!imgMain.classList.contains('selected')) {
      flag = 0;
      document.getElementById('msg-img').style = 'display:block';
      document.getElementById('msg-img').innerText = 'Please choose main image';
    } else {
      document.getElementById('msg-img').style = 'display:none';
    }
    if (flag == 0)
      return false;
    else
      return true;
  }
</script>