<?php
if (isset($_POST['input-search'])) {
  $input_search = $_POST['input-search'];
}

function tinhGiaGiam($Giaban,$khuyenMai) {
  return $Giaban*(1 - $khuyenMai/100);
}
?>
<input type="hidden" value="<?php if(isset( $_POST['input-search'])) {echo $input_search;} ?>" id="input-search-hidden" name="input-search">
<input type="hidden" value="<?php echo $rootDirectory  ?>"  id="rootDirectory" >
<style>
  .tag-filtter {
    display: flex;
    /* Sử dụng flexbox để quản lý khoảng cách */
    gap: 10px;
    /* Khoảng cách giữa các thẻ span */
  }

  .text-bg-danger {
    padding-top: 7px;
  }

  #delete-tag {
    height: 25px;
    padding-top: 0px;
  }
</style>
<div class="container" style="margin-top: 20px;">

  <!--Bộ lọc -->
  <div class="row row-filter">
    <!-- Loại sản phẩm -->
    <h5 style="margin-top: 20px;" class="h5-filter"> <i class="fa-solid fa-filter"></i> Filter</h5>
    <div class="col-6  col-sm-4 col-md-3 col-Filter">
      <select class="form-select select-filter-type" id="category" aria-label="Default select example">
        <option value="0" select>Tất cả loại</option>
        <?php
        $category_model = new category_model();
        $query = $category_model->getcategoryData();
        while ($row = mysqli_fetch_array($query)) { ?>
          <option value="<?php echo $row['MaDM'] ?> "><?php echo $row['TenDM'] ?></option>
        <?php } ?>
      </select>
    </div>
    <!-- Giá -->
    <div class="col-6 col-sm-4 col-md-2 col-Filter">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle btn-filter-price" type="button" data-bs-toggle="dropdown" aria-expanded="false" style=" background-color: #DB4444; ">
          Price
        </button>
        <ul class="dropdown-menu">
          <li>
            <p>
              <label for="amount" style="padding-left: 10px;">Price range:</label>
              <input type="text" class="amount" readonly style="border:0; color:#000000; font-weight:bold;padding-left: 10px;">
            </p>
            <div class="slider-range" >

            </div>
          </li>
        </ul>
      </div>
    </div>
    <!-- Giới tính  -->
    <div class="col-6 col-sm-4 col-md-2 col-Filter">
      <select class="form-select select-filter-sex" id="sex" aria-label="Default select example">
        <option value="0" select>Tất cả giới tính</option>
        <option value="3">Unsex</option>
        <option value="1">Male</option>
        <option value="2">Female</option>
      </select>
    </div>
    <!-- Size -->
    <div class="col-6 col-sm-4 col-md-2 col-Filter">
      <select class="form-select select-filter-size" id="size" aria-label="Default select example">
        <option value="0" select>Tất cả size</option>
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
        <option value="XXL">XXL</option>
      </select>
    </div>

    <!-- Sale -->
    <div class="col-6 col-sm-4 col-md-2 col-Filter">
      <div class="form-check" style="margin-top:3px;">
        <input class="form-check-input" type="checkbox" value="" id="sale" style="background-color:#DB4444; width:25px; height:25px; ">
        <label style=" margin-top: 4px; margin-left: 10px;" class="form-check-label" for="flexCheckChecked">
          Sale
        </label>
      </div>
    </div>
    <!-- button lọc -->
    <div class="col-6 col-sm-4 col-md-1 col-Filter">
      <div class="filter-label">
        <button type="button" id="button-Filter" class="btn btn-danger btn-filter-label">
          Lọc
        </button>
      </div>
    </div>
  </div>

  <!-- Tag -->
  <div class="row row-tag" style=" margin-top:20px;">
    <div class="col-md-8">
      <h6><i class="fa-solid fa-tags"></i> Tag</h6>
      <div class="tag-filtter">
        <?php if (isset($_POST['input-search'])) { ?>
          <span class="badge text-bg-danger"> <?php echo $input_search ?> </span>
          <button type="button" id="delete-tag" class="btn btn-outline-danger">X</button>

        <?php  } ?>

      </div>
    </div>
    <div class="col-md-4">

    </div>
  </div>

  <!-- Nhãn sản phẩm -->
  <div class="row " style="display: flex;margin-top: 40px;justify-content: space-between; ">
    <span style=" width:150px; font-size: 30px; display:inline;"> Product</span>
    <select class="form-select select-filter-sort" style="width:300px;" aria-label="Default select example">
      <option value="" disabled selected hidden>Sort</option>
      <option value="0" select>Mặc định</option>
      <option value="1" select>Price from low to high</option>
      <option value="2">Price from high to low</option>
    </select>
  </div>

  <!-- Sản phẩm -->
  <div class="row row-product">
    <?php $product_model = new product_model();
    if (isset($_POST['input-search'])) {
      $tenSP = $_POST['input-search'];
      $queryAll = $product_model->getAllProductFollowName($tenSP);
      $queryFollowPage = $product_model->getProductFollowPageName(0, $tenSP);
    } else {
      $queryAll = $product_model->getAllProduct();
      $queryFollowPage = $product_model->getProductFollowPage(0);
    }
    $row_count = mysqli_num_rows($queryAll);


    while ($row = mysqli_fetch_array($queryFollowPage)) {
        $ptKM = $row['MaKM'] != "" ? $product_model->getPhanTramKhuyenMai($row['MaKM']) : null;
        $giaMoi =  $ptKM ?  tinhGiaGiam($row["GiaBan"],$row["PhanTramKM"]) : "";
    ?>
      <div class="col-6 col-sm-4 col-md-3 col-xxl-3">
        <div class="product">
          <a href="<?php echo $rootDirectory."/product-detail?id=".$row["MaSP"] ?>" class="wrap-img">
            <img class="img-product" src="<?php echo $rootDirectory.$row["Url"]?>">
            <div class="deal" style="<?php echo $ptKM ? "display:block" : "display:none" ?>"><?php echo $row["PhanTramKM"]."%" ?></div>
          </a>
          <div class="product-info">
            <div class="product-body">
              <a href="<?php echo $rootDirectory."/product-detail?id=".$row["MaSP"] ?>" class="product-title"><?php echo $row["TenSP"]?></a>
              <div class="prices">
                <div class="new-price"><?php echo $ptKM ? number_format($giaMoi)."đ": number_format($row["GiaBan"])."đ" ?></div>
                <div class="old-price"><?php echo $ptKM ? number_format($row["GiaBan"])."đ": ""?></div>
              </div>  
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <div class="row row-pagination" style="margin-top: 50px;">
    <div class="div-pagination">
      <nav aria-label="...">
        <ul class="pagination" id="page">
          <?php $pageNumber = $row_count / 12;
          $page = ceil($pageNumber);
          for ($i = 1; $i <= $page; $i++) {
            if ($i == 1) { ?>
              <li class="page-item active"><a class="page-link"> <?php echo $i ?> </a></li>
            <?php } else if ($i != 1) { ?>
              <li class="page-item"><a class="page-link"> <?php echo $i ?> </a></li>
          <?php }
          } ?>
        </ul>
      </nav>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>

  $(function() {
    $(".slider-range").slider({
      range: true,
      min: 0,
      max: 10000000, // Thay đổi giá trị max thành 50 triệu VND (hoặc số phù hợp với nhu cầu của bạn)
      step: 50000, // Thay đổi bước thay đổi giá trị thành 500,000 VND (hoặc số phù hợp với nhu cầu của bạn)
      values: [0, 10000000], // Đặt giá trị ban đầu từ 0 đến 50 triệu VND
      slide: function(event, ui) {
        $(".amount").val(formatCurrency(ui.values[0]) + " - " + formatCurrency(ui.values[1])); // Gọi hàm formatCurrency để định dạng hiển thị giá tiền
      }
    });
    $(".amount").val(formatCurrency($(".slider-range").slider("values", 0)) + " - " + formatCurrency($(".slider-range").slider("values", 1))); // Định dạng giá trị ban đầu

    $(".slider-range").on("slidestop", function(event, ui) {
      $(".btn-filter-price").text(formatCurrency(ui.values[0]) + " - " + formatCurrency(ui.values[1])); // Định dạng giá trị khi slider được dừng lại
    });

    // Hàm định dạng số thành chuỗi có dấu phẩy ngăn cách hàng nghìn
    
});
function formatCurrency(number) {
      return number.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    }

  // khai báo
  var category = document.getElementById("category");
  var sex = document.getElementById("sex");
  var size = document.getElementById("size");
  var sale = document.getElementById("sale");
  var input_search_hidden = document.getElementById("input-search-hidden");
  var rootDirectory =document.getElementById("rootDirectory");
  rootDirectory_data =rootDirectory.value;


  // biến chứa dữ liệu
  var category_data = 0;
  var sex_data = 0;
  var size_data = 0;
  var sale_data = false;
  var input_search_hidden_data = '';
  var startPrice_data = 0;
  var endPrice_data= 500;
  
  // click vào chuyển trang
  $(document).ready(function() {
    $('#page').on("click", "a", function() {
      var page_data = $(this).text(); // lấy số của trang khi click vào
  
      input_search_hidden_data =input_search_hidden.value;


      // Bỏ lớp active khỏi tất cả các thẻ li có class="page-item"
      $('.page-item').removeClass('active');
      // Thêm lớp active vào thẻ li của nút được click
      $(this).parent('li').addClass('active');

      // dùng post gửi thông tin.
      $.post("./site/controller/product_controller.php", {
          page: page_data,
          category: category_data,
          startPrice: startPrice_data,
          endPrice: endPrice_data,
          sex: sex_data,
          size: size_data,
          sale: sale_data,
          tenSP: input_search_hidden_data,
          rootDirectory: rootDirectory_data,
        },

        function(data, status) {
          $('.row-product').html(data);
          // Cuộn trang lên đầu sau khi nhận được dữ liệu với hiệu ứng nhanh
          $('html, body').animate({
            scrollTop: 0
          }, 100); // 400 milliseconds (0.4 seconds)
        });
    });

    $('#button-search').click(function() {

      category.value = 0;
      sex.value = 0;
      size.value = 0;
      sale.checked = false;
      // Lấy thẻ slider-range và thiết lập giá trị mặc định từ 0 đến 500
      $(".slider-range").slider("values", [0, 10000000]);
      // Cập nhật giá trị trong input amount và button btn-filter-price
      $(".amount").val(formatCurrency(0)+" - "+formatCurrency(10000000));
      $(".btn-filter-price").text("Price");

       category_data = category.value;
       startPrice_data = $(".slider-range").slider("values", 0);
       endPrice_data = $(".slider-range").slider("values", 1);
       sex_data = sex.value;
       size_data = size.value;
       sale_data = sale.checked;
       page_data = 1;

      var input_search = document.getElementById('input-search').value;

      input_search_hidden.value = input_search;
      var tag_filtter = document.querySelector('.tag-filtter');
      tag_filtter.innerHTML = '';

      var newSpanSearch = document.createElement('span');
      newSpanSearch.classList.add('badge', 'text-bg-danger');
      newSpanSearch.textContent = input_search_hidden.value;

      var buttonDeleteTag = document.createElement('button');
      buttonDeleteTag.setAttribute('type', 'button');
      buttonDeleteTag.setAttribute('id', 'delete-tag');
      buttonDeleteTag.classList.add('btn', 'btn-outline-danger');
      buttonDeleteTag.textContent = 'X';
      tag_filtter.appendChild(newSpanSearch);
      tag_filtter.appendChild(buttonDeleteTag);

     


      $.post("./site/controller/product_controller.php", {
          page: page_data,
          category: category_data,
          startPrice: startPrice_data,
          endPrice: endPrice_data,
          sex: sex_data,
          size: size_data,
          sale: sale_data,
          tenSP:  input_search_hidden.value,
          rootDirectory: rootDirectory_data,
        },
        function(data, status) {
          $('.row-product').html(data);
          // xóa hết phân trang
          var paginationList = document.querySelector('.pagination');
          paginationList.innerHTML = '';
         setPage();
       
       
        });



    });

    function setPage (){
      var page_number = row_count / 12;
          var page = Math.ceil(page_number);
          for (var i = 1; i <= page; i++) {
            if (i == 1) {
              // Tạo một đối tượng li mới
              var newListItem = document.createElement('li');
              newListItem.classList.add('page-item');
              newListItem.classList.add('active');
              // Tạo một đối tượng a mới
              var newLink = document.createElement('a');
              newLink.classList.add('page-link');
              newLink.textContent = i; // Nội dung của thẻ a

              // Đặt thẻ a vào thẻ li
              newListItem.appendChild(newLink);

              // Lấy đối tượng ul có class là "pagination"
              var paginationList = document.querySelector('.pagination');

              // Thêm đối tượng li mới vào ul
              paginationList.appendChild(newListItem);
            } else if (i != 1) {
              // Tạo một đối tượng li mới
              var newListItem = document.createElement('li');
              newListItem.classList.add('page-item');

              // Tạo một đối tượng a mới
              var newLink = document.createElement('a');
              newLink.classList.add('page-link');
              newLink.textContent = i; // Nội dung của thẻ a

              // Đặt thẻ a vào thẻ li
              newListItem.appendChild(newLink);

              // Lấy đối tượng ul có class là "pagination"
              var paginationList = document.querySelector('.pagination');

              // Thêm đối tượng li mới vào ul
              paginationList.appendChild(newListItem);
            }
          }
    }

    function clearTagFiltter() {
      // Lấy phần tử có class là "tag-filtter"
      var tagFiltter = document.querySelector('.tag-filtter');

      // Lấy danh sách tất cả các phần tử con trừ phần tử đầu tiên
      var children = Array.from(tagFiltter.children).slice(1);

      // Xóa các phần tử con
      children.forEach(function(child) {
        child.remove();
      });
    }

    $('#button-Filter').click(function() {

      category_data = category.value;
      startPrice_data = $(".slider-range").slider("values", 0);
      endPrice_data = $(".slider-range").slider("values", 1);
      sex_data = sex.value;
      size_data = size.value;
      sale_data = sale.checked;
      input_search_hidden_data = input_search_hidden.value;

      
      
      var page_data = 1;
      // In ra console để kiểm tra
      console.log("Category: " + category_data);
      console.log("Giá bắt đầu: " + startPrice_data);
      console.log("Giá kết thúc: " + endPrice_data);
      console.log("Sex : " + sex_data);
      console.log("Size : " + size_data);
      console.log("Sale : " + sale_data);
      console.log('Tên sản phẩm :'+input_search_hidden_data);

      $.post("./site/controller/product_controller.php", {
          page: page_data,
          category: category_data,
          startPrice: startPrice_data,
          endPrice: endPrice_data,
          sex: sex_data,
          size: size_data,
          sale: sale_data,
          tenSP: input_search_hidden_data,
          rootDirectory: rootDirectory_data,
        },

        function(data, status) {
          $('.row-product').html(data);
          //  lấy text
          var selectedOptionCategory = category.options[category.selectedIndex];
          var selectedNameCategory = selectedOptionCategory.text;
          console.log(selectedNameCategory);
          var selectedOptionSex = sex.options[sex.selectedIndex];
          var selectedNameSex = selectedOptionSex.text;
          console.log(selectedNameSex);
          var selectedOptionSize = size.options[size.selectedIndex];
          var selectedNameSize = selectedOptionSize.text;
          console.log(selectedNameSize);
          // thêm span
          var newSpanCategory = document.createElement('span');
          newSpanCategory.classList.add('badge', 'text-bg-danger');
          newSpanCategory.textContent = selectedNameCategory;

          var newSpanPrice = document.createElement('span');
          newSpanPrice.classList.add('badge', 'text-bg-danger');
          newSpanPrice.textContent = '$' + startPrice_data + ' - $' + endPrice_data;

          var newSpanSex = document.createElement('span');
          newSpanSex.classList.add('badge', 'text-bg-danger');
          newSpanSex.textContent = selectedNameSex;

          var newSpanSize = document.createElement('span');
          newSpanSize.classList.add('badge', 'text-bg-danger');
          newSpanSize.textContent = selectedNameSize;

          var newSpanSale = document.createElement('span');
          newSpanSale.classList.add('badge', 'text-bg-danger');
          if (sale_data == true) {
            newSpanSale.textContent = 'Đang Sale';
          }

          var buttonDeleteTag = document.createElement('button');
          buttonDeleteTag.setAttribute('type', 'button');
          buttonDeleteTag.setAttribute('id', 'delete-tag');
          buttonDeleteTag.classList.add('btn', 'btn-outline-danger');
          buttonDeleteTag.textContent = 'X';

          //thay tag
          var tag_filtter = document.querySelector('.tag-filtter');
          if (input_search_hidden_data != '') {
            clearTagFiltter();
          } else {
            tag_filtter.innerHTML = '';
          }

          if (category_data != 0) {
            tag_filtter.appendChild(newSpanCategory);
          }
          tag_filtter.appendChild(newSpanPrice);

          if (sex_data != 0) {
            tag_filtter.appendChild(newSpanSex);
          }

          if (size_data != 0) {
            tag_filtter.appendChild(newSpanSize);
          }
          if (sale_data == true) {
            tag_filtter.appendChild(newSpanSale);
          }
          tag_filtter.appendChild(buttonDeleteTag);

          // xóa hết phân trang
          var paginationList = document.querySelector('.pagination');
          paginationList.innerHTML = '';

        
              setPage();


        });
    });

    $(document).on('click', '#delete-tag', function() {

      input_search_hidden.value = '';
      input_search_hidden_data = input_search_hidden.value;

      category.value = 0;
      sex.value = 0;
      size.value = 0;
      sale.checked = false;
      // Lấy thẻ slider-range và thiết lập giá trị mặc định từ 0 đến 500
      $(".slider-range").slider("values", [0, 10000000]);
      // Cập nhật giá trị trong input amount và button btn-filter-price
      $(".amount").val(formatCurrency(0)+" - "+formatCurrency(10000000));
      $(".btn-filter-price").text("Price");

      category_data = category.value;
      startPrice_data = $(".slider-range").slider("values", 0);
      endPrice_data = $(".slider-range").slider("values", 1);
      sex_data = sex.value;
      size_data = size.value;
      sale_data = sale.checked;
      var page_data = 1;

      var tag_filtter = document.querySelector('.tag-filtter');
      tag_filtter.innerHTML = '';

      $.post("./site/controller/product_controller.php", {
          page: page_data,
          category: category_data,
          startPrice: startPrice_data,
          endPrice: endPrice_data,
          sex: sex_data,
          size: size_data,
          sale: sale_data,
          tenSP: input_search_hidden_data,
          rootDirectory: rootDirectory_data,
        },

        function(data, status) {
          $('.row-product').html(data);
          // xóa hết phân trang
          var paginationList = document.querySelector('.pagination');
          paginationList.innerHTML = '';
            setPage();

        });


    });



  });
</script>