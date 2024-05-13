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
    $title = "Thêm sản phẩm";
    $method = "POST";
    break;
  case "edit":
    $title = "Sửa sản phẩm";
    $method = "PUT";
    break;
  case "view":
    $title = "Xem sản phẩm";
    $method = "GET";
    break;
}

$listconvert = array();
$listMaSize = ["S" => "S", "M" => "M", "L" => "L", "XL" => "XL", "XXL" => "XXL"];

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $product_model = new product_model();
  $product = mysqli_fetch_array($product_model->getSP($id));
  $listSize = $product_model->getSizeSP($id);
  foreach ($listSize as $list) {
    $item = [
      "MaSize" => $list['MaSize'],
      "SoLuong" => $list['SoLuong']
    ];
    $listconvert[] = $item;
  }


  foreach ($listconvert as $size) {
    if (in_array($size["MaSize"], $listMaSize)) {
      unset($listMaSize[$size["MaSize"]]);
    }
  }


  $maAnh = $product["MaAnhChinh"];

  $anhChinh = mysqli_fetch_array($product_model->getMainImg($product['MaAnhChinh']));

  $listAnhPhu = $product_model->getSubImgs($product['MaAnhChinh']);

  $anhPhu1 = mysqli_fetch_array($listAnhPhu);
  $anhPhu2 = mysqli_fetch_array($listAnhPhu);
  $anhPhu3 = mysqli_fetch_array($listAnhPhu);

}
?>
<div class="main-content">
  <form
    action=<?php echo isset($id) ? $toAdmin . "/controller/product_controller?id=" . $id : $toAdmin . "/controller/product_controller" ?>
    method="POST" id="product_form" enctype="multipart/form-data">
    <input type="hidden" name="method" value="<?php echo $method; ?>" />
    <h3 style="text-align: center;"><?php echo $title ?></h3>
    <div class="input-group flex-nowrap" style="margin-top: 20px;">
      <label for="product-name" class="input-group-text" id="addon-wrapping">
        <i class="bx bxl-product-hunt"></i></label>
      <input id="product-name" name="product-name" type="text" class="form-control" placeholder="Tên sản phẩm" required
        <?php echo $method == "GET" ? "disabled" : "" ?>
        value="<?php echo $method != "POST" ? $product['TenSP'] : "" ?>">
    </div>
    <b class="memo" id="msg-name"></b>
    <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
      <label for="product-desc" class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-message"></i></label>
      <textarea id="product-desc" name="product-desc" rows="4" cols="50" class="form-control" placeholder="Mô tả"
        <?php echo $method == "GET" ? "disabled" : "" ?>
        value=""><?php echo $method != "POST" ? $product['MoTa'] : "" ?></textarea>
    </div>
    <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
      <label for="product-category" class="input-group-text" id="addon-wrapping"><i
          class="fa-solid fa-list"></i></label>
      <select id="product-category" name="product-category" class="form-select"
        <?php echo $method == "GET" ? "disabled" : "" ?>>
        <option value>--Chọn danh mục--</option>
        <?php
        $category_model = new category_model();
        $query = $category_model->getcategoryData();
        while ($row = mysqli_fetch_array($query)) {
          ?>
        <option value="<?php echo $row['MaDM'] ?>"
          <?php echo $method != "POST" && $row['MaDM'] == $product["MaDM"] ? "selected" : "" ?>>
          <?php echo $row['MaDM'] . ' - ' . $row['TenDM'] ?>
        </option>
        <?php } ?>
      </select>
    </div>
    <b class="memo" id="msg-category"></b>

    <div class="input-group flex-nowrap" style="margin-top: 20px;">
      <label for="product-price" class="input-group-text" id="addon-wrapping">
        <i class="fa-solid fa-money-bill"></i></label>
      <input id="product-price" name="product-price" type="number" class="form-control" placeholder="Giá bán" required
        <?php echo $method == "GET" ? "disabled" : "" ?>
        value="<?php echo $method != "POST" ? $product['GiaBan'] : "" ?>">
    </div>
    <b class="memo" id="msg-price"></b>

    <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
      <label for="product-sale" class="input-group-text" id="addon-wrapping"><i
          class="fa-solid fa-percent icon"></i></label>
      <select id="product-sale" name="product-sale" class="form-select"
        <?php echo $method == "GET" ? "disabled" : "" ?>>
        <option value>--Chọn khuyến mãi--</option>
        <?php
        $discount_model = new discount_model();
        $query = $discount_model->getdiscountData();
        while ($row = mysqli_fetch_array($query)) {
          ?>
        <option value="<?php echo $row['MaKM'] ?>"
          <?php echo $method != "POST" && $row['MaKM'] == $product["MaKM"] ? "selected" : "" ?>>
          <?php echo $row['TenKM'] . ' - ' . $row['PhanTramKM'] . '%' ?>
        </option>
        <?php } ?>
      </select>
    </div>
    <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
      <label for="product-sex" class="input-group-text" id="addon-wrapping"><i
          class="fa-solid fa-mars-and-venus"></i></label>
      <select id="product-sex" name="product-sex" class="form-select" <?php echo $method == "GET" ? "disabled" : "" ?>>
        <option value>--Chọn giới tính--</option>
        <option value="3" <?php echo $method != "POST" && $product['GioiTinh'] == "3" ? "selected" : "" ?>>Tất cả
        </option>
        <option value="2" <?php echo $method != "POST" && $product['GioiTinh'] == "2" ? "selected" : "" ?>>Nam</option>

        <option value="1" <?php echo $method != "POST" && $product['GioiTinh'] == "1" ? "selected" : "" ?>>Nữ
        </option>

      </select>
    </div>
    <b class="memo" id="msg-sex"></b>
    <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
      <label for="product-size" class="input-group-text" id="addon-wrapping"><i class='bx bx-font-size'></i></label>
      <select id="product-size" name="product-size" class="form-select"
        <?php echo $method == "GET" ? "disabled" : "" ?>>
        <option value>--Chọn size--</option>
        <?php foreach ($listMaSize as $key => $value) { ?>
        <option value="<?php echo $value ?>"><?php echo $value ?></option>
        <?php } ?>
      </select>
      <button type="button" class="btn btn-primary" onclick="addSize()"
        <?php echo $method == "GET" ? "disabled" : "" ?>>Thêm size</button>
    </div>
    <b class="memo" id="msg-size"></b>
    <table id="tblSize" class="table table-striped" style="text-align:center"
      <?php echo $method == "GET" ? "disabled" : "" ?>>
      <thead>
        <tr>
          <th scope="col">Size</th>
          <th scope="col">Số lượng</th>
          <th scope="col">Hành động</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <?php

        foreach ($listconvert as $size) {
          ?>
        <tr>
          <th scope="row"><input type="hidden" value="<?php echo $size["MaSize"] ?>"
              name="ArraySize[]"><?php echo $size["MaSize"] ?></th>
          <td><input type="hidden" value="<?php echo $size["SoLuong"] ?>"
              name="ArrayQuantity[]"><?php echo $size["SoLuong"] ?></td>
          <td>
            <button <?php echo $size["SoLuong"] != 0 || $method == 'GET' ? "style='display:none'" : "" ?> type="button"
              class="btn btn-danger" onclick="deleteRow(this)">Xóa</button>
          </td>
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
      <label for="product-image" class="input-group-text" id="addon-wrapping"
        <?php echo $method != "POST" && $anhChinh["Url"] ? "style='display:none'" : "" ?>><i
          class="fa-solid fa-image p-1"></i>
        Ảnh chính</label>
      <img alt=""
        <?php echo $method != "POST" ? 'src="' . $rootDirectory . $anhChinh["Url"] . '" style="display:block"' : "" ?>>
      <input type="text" name="maAnhChinh" id="maAnhChinh"
        value="<?php echo $method == "PUT" ? $anhChinh["MaAnhChinh"] : "" ?>" hidden>
      <input id="image-upload" name="image-upload" type="file" class="form-control" accept="image/*"
        style="display: none;" <?php echo $method == "GET" ? "disabled" : "" ?>>
      <button type="button" class=" btn btn-danger btn-delete-img">Xóa</button>
    </div>
    <b class="memo" id="msg-img"></b>

    <div class="d-flex flex-wrap gap-2">
      <div id="img-1"
        class="img-container <?php echo $method == "PUT" && $anhPhu1 && $anhPhu1['Url'] != "" ? "selected" : "" ?>">
        <input hidden name="selected-img-1"
          value="<?php echo $method == "PUT" && $anhPhu1 && $anhPhu1['Url'] != "" ? "true" : "false" ?>">
        <label for="product-image" class="input-group-text" id="addon-wrapping"
          <?php echo $method != "POST" && $anhPhu1 && $anhPhu1['Url'] != "" ? "style='display:none'" : "" ?>><i
            class="fa-solid fa-image p-1"></i>
          Ảnh phụ 1</label>
        <img alt=""
          <?php echo $method != "POST" && $anhPhu1 && $anhPhu1['Url'] != "" ? 'src="' . $rootDirectory . $anhPhu1["Url"] . '" style="display:block"' : "" ?>>
        <input type="text" name="anhPhu1" id="anhPhu1"
          value="<?php echo $method == "PUT" && $anhPhu1 ? $anhPhu1["MaAnhPhu"] : "" ?>" hidden>
        <input id="sub-image-upload-1" name="sub-image-upload-1" type="file" class="form-control" accept="image/*"
          style="display: none;" <?php echo $method == "GET" ? "disabled" : "" ?>>
        <button type="button" class=" btn btn-danger btn-delete-img">Xóa</button>
      </div>
      <div id="img-2"
        class="img-container <?php echo $method == "PUT" && $anhPhu2 && $anhPhu2['Url'] != "" ? "selected" : "" ?>">
        <input hidden name="selected-img-2"
          value="<?php echo $method == "PUT" && $anhPhu2 && $anhPhu2['Url'] != "" ? "true" : "false" ?>">
        <label for="product-image" class="input-group-text" id="addon-wrapping"
          <?php echo $method != "POST" && $anhPhu2 && $anhPhu2['Url'] != "" ? "style='display:none'" : "" ?>><i
            class="fa-solid fa-image p-1"></i>
          Ảnh phụ 2</label>
        <img alt=""
          <?php echo $method != "POST" && $anhPhu2 && $anhPhu2['Url'] != "" ? 'src="' . $rootDirectory . $anhPhu2["Url"] . '" style="display:block"' : "" ?>>
        <input type="text" name="anhPhu2" id="anhPhu2"
          value="<?php echo $method == "PUT" && $anhPhu2 ? $anhPhu2["MaAnhPhu"] : "" ?>" hidden>
        <input id="sub-image-upload-2" name="sub-image-upload-2" type="file" class="form-control" accept="image/*"
          style="display: none;" <?php echo $method == "GET" ? "disabled" : "" ?>>
        <button type="button" class=" btn btn-danger btn-delete-img">Xóa</button>
      </div>
      <div id="img-3"
        class="img-container <?php echo $method == "PUT" && $anhPhu3 && $anhPhu3['Url'] != "" ? "selected" : "" ?> ">
        <input hidden name="selected-img-3"
          value="<?php echo $method == "PUT" && $anhPhu3 && $anhPhu3['Url'] != "" ? "true" : "false" ?>">
        <label for="product-image" class="input-group-text" id="addon-wrapping"
          <?php echo $method != "POST" && $anhPhu3 && $anhPhu3['Url'] != "" ? "style='display:none'" : "" ?>><i
            class="fa-solid fa-image p-1"></i>
          Ảnh phụ 3</label>
        <img alt=""
          <?php echo $method != "POST" && $anhPhu3 && $anhPhu3['Url'] != "" ? 'src="' . $rootDirectory . $anhPhu3["Url"] . '" style="display:block"' : "" ?>>
        <input type="text" name="anhPhu3" id="anhPhu3"
          value="<?php echo $method == "PUT" && $anhPhu3 ? $anhPhu3["MaAnhPhu"] : "" ?>" hidden>
        <input id="sub-image-upload-3" name="sub-image-upload-3" type="file" class="form-control" accept="image/*"
          style="display: none;" <?php echo $method == "GET" ? "disabled" : "" ?>>
        <button type="button" class=" btn btn-danger btn-delete-img">Xóa</button>
      </div>
    </div>
    <div class="d-flex justify-content-center gap-2" style=" margin-top: 20px; ">
      <input id="btn-supplier-form" type="submit" class="btn btn-success" onclick="return validate()"
        value="<?php echo $title ?>" <?php echo $method == "GET" ? "style='display:none'" : "" ?>></input>
      <a href="<?php echo $url . '/product' ?>">
        <button type="button" class="btn btn-danger">Hủy</button>
      </a>
    </div>

</div>
</form>
</div>

<?php require_once ('./public/template/admin/toast.php');
if (isset($_SESSION["back-from-controller"])) {
  switch ($_SESSION["back-from-controller"]) {
    case "add":
      toast::memo("Thêm thất bại", "add-fail", "#db4444");
      break;
    case "update":
      toast::memo("Sửa thất bại", "update-fail", "#db4444");
      break;
  }
  unset($_SESSION["back-from-controller"]);

}
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

document.getElementById('image-upload').addEventListener('change', function(event) {
  loadImg('img-main', event)
});


document.getElementById('sub-image-upload-1').addEventListener('change', function(event) {
  loadImg('img-1', event)
});

document.getElementById('sub-image-upload-2').addEventListener('change', function(event) {
  loadImg('img-2', event)
});

document.getElementById('sub-image-upload-3').addEventListener('change', function(event) {
  loadImg('img-3', event)
});

function loadImg(element, eventInput) {
  var file = eventInput.target.files[0];
  var reader = new FileReader();
  if (file) {
    reader.addEventListener("load", function(event) {
      document.querySelector(`#${element} img`).src = event.target.result;
      document.querySelector(`#${element} img`).style = 'display:block';
    });

    document.getElementById(element).classList.add('selected');
    if (element != "img-main") {
      document.querySelector(`#${element} input:first-child`).value = true;
    }
    document.querySelector(`#${element} label`).style = 'display:none';
    reader.readAsDataURL(file);
  }
}

var deleteImgButtons = document.querySelectorAll(`.btn-delete-img`);

for (var i = 0; i < deleteImgButtons.length; i++) {
  deleteImgButtons[i].addEventListener('click', (event) => {
    event.stopPropagation();
    var idParent = event.target.parentElement.id
    document.getElementById(idParent).classList.remove('selected');
    if (idParent != "img-main") {
      document.querySelector(`#${idParent} input:first-child`).value = false;
    }
    document.querySelector(`#${idParent} label`).style = 'display:block';
    document.querySelector(`#${idParent} img`).style = 'display:none';
    document.querySelector(`#${idParent} img`).src = '';
    document.querySelector(`#${idParent} input[type="file"]`).value = '';
  });
}


function addSize() {
  var size = document.getElementById('product-size')
  if (size.value) {
    document.querySelector("#tblSize tbody").innerHTML += `
        <tr>
          <th scope="row"><input type="hidden" value="${size.value}" name="ArraySize[]"> ${size.value}</th>
          <td><input type="hidden" value="0" name="ArrayQuantity[]">0</td>
          <td><button type="button" class="btn btn-danger" onclick="deleteRow(this)">Xóa</button></td>
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
  var size = tblSize.rows[index].cells[0].innerText;
  sizeCombo.innerHTML += `<option value="${size}">${size}</option>`
  tblSize.deleteRow(index);
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
    document.getElementById('msg-name').innerText = 'Bạn chưa nhập tên sản phẩm';
  } else {
    document.getElementById('msg-name').style = 'display:none';
  }

  if (!productPrice.value) {
    flag = 0;
    document.getElementById('msg-price').style = 'display:block';
    document.getElementById('msg-price').innerText = 'Bạn chưa nhập giá bán';
  } else {
    if (productPrice.value < 50000 || productPrice.value > Math.pow(10, 7)) {
      flag = 0;
      document.getElementById('msg-price').innerText = 'Giá nằm trong khoảng 50.000đ đến 10.000.000đ';
      document.getElementById('msg-price').style = 'display:block';
      document.getElementById('msg-price').style = 'display:block';

    } else {
      document.getElementById('msg-price').style = 'display:none';
    }
  }

  if (!selectCategory.value) {
    flag = 0;
    document.getElementById('msg-category').style = 'display:block';
    document.getElementById('msg-category').innerText = 'Bạn chưa chọn danh mục';
  } else {
    document.getElementById('msg-category').style = 'display:none';
  }
  if (!selectSex.value) {
    flag = 0;
    document.getElementById('msg-sex').style = 'display:block';
    document.getElementById('msg-sex').innerText = 'Bạn chưa chọn giới tính';
  } else {
    document.getElementById('msg-sex').style = 'display:none';
  }

  if (tblSize.rows.length == 1) {
    flag = 0;
    document.getElementById('msg-size').style = 'display:block';
    document.getElementById('msg-size').innerText = 'Hãy thêm ít nhất 1 size vào bảng';
  } else {
    document.getElementById('msg-size').style = 'display:none';
  }

  if (!imgMain.classList.contains('selected')) {
    flag = 0;
    document.getElementById('msg-img').style = 'display:block';
    document.getElementById('msg-img').innerText = 'Bạn chưa chọn ảnh chính ';
  } else {
    document.getElementById('msg-img').style = 'display:none';
  }
  if (flag == 0)
    return false;
  else
    return true;
}
</script>