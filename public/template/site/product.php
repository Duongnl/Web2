<style>
  .tag-filtter {
  display: flex; /* Sử dụng flexbox để quản lý khoảng cách */
  gap: 10px; /* Khoảng cách giữa các thẻ span */
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
                <div class="slider-range">

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
            <option value="XXL">S</option>
          </select>
        </div>

        <!-- Sale -->
        <div class="col-6 col-sm-4 col-md-2 col-Filter">
          <!-- <div class="filter-sale">
            <input type="checkbox" class="btn-check" id="btn-check-3-outlined" autocomplete="off"
              style=" border: 1px solid black; color:black">
            <label class="btn btn-outline-secondary" for="btn-check-3-outlined"
              style="width:100%;border: 1px solid black; "> <i class="fa-solid fa-percent"></i> Sale</label>
          </div> -->
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
              <!-- <i class="fa-solid fa-filter"></i>  -->
              Lọc
            </button>
          </div>
        </div>
      </div>

      <!-- Tag -->
      <div class="row row-tag" style=" margin-top:20px;">
        <div class="col-md-8">
          <h6><i class="fa-solid fa-tags"></i> Tag</h6>
          <div class="tag-filtter" >
            <span class="badge text-bg-danger">Tất cả loại</span>
            <span class="badge text-bg-danger">$0 - $555</span>
            <span class="badge text-bg-danger">Tất cả giới tính</span>
            <span class="badge text-bg-danger">Tất cả size</span>
            <span class="badge text-bg-danger">Tất cả</span>
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
        $queryAll = $product_model->getAllProduct();
        $row_count = mysqli_num_rows($queryAll);
        $queryFollowPage = $product_model->getProductFollowPage(0);

        while ($row = mysqli_fetch_array($queryFollowPage)) {
        ?>
          <div class="col-6 col-sm-4 col-md-3 col-xxl-3">
            <div class="product">
              <a href="" class="wrap-img">
                <img class="img-product" src="<?php echo $row['Url'] ?>  ">
                <?php if ($row['PhanTramKM'] != '') { ?>
                  <div class="deal"> <?php echo '-' . $row['PhanTramKM'] . '%'  ?> </div>
                <?php  } ?>
              </a>
              <div class="product-info">
                <div class="product-body">
                  <a href="" class="product-title"> <?php echo $row['TenSP'] ?> </a>
                  <div class="prices">
                    <div class="new-price"> <?php echo $row['GiaBan'] ?> </div>
                    <div class="old-price">$260</div>
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
              <!-- <li class="page-item "><a class="page-link" href="#">2</a></li> -->
              <!-- <li class="page-item active" aria-current="page"><a class="page-link" href="#">3</a></li> -->
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
          max: 500,
          values: [0, 500],
          slide: function(event, ui) {
            $(".amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
          }
        });
        $(".amount").val("$" + $(".slider-range").slider("values", 0) +
          " - $" + $(".slider-range").slider("values", 1));

        $(".slider-range").on("slidestop", function(event, ui) {
          $(".btn-filter-price").text("$" + ui.values[0] + "-$" + ui.values[1]);
        });

      });

      $(document).ready(function() {
        $('#page').on("click", "a", function() {
          var page_data = $(this).text();
          // Lấy giá trị bắt đầu và kết thúc của thanh trượt
          var category_data = document.getElementById("category").value;
          var startPrice_data = $(".slider-range").slider("values", 0);
          var endPrice_data = $(".slider-range").slider("values", 1);
          var sex_data = document.getElementById("sex").value;
          var size_data = document.getElementById("size").value;
          var sale_data = document.getElementById("sale").checked;

          // Bỏ lớp active khỏi tất cả các thẻ li có class="page-item"
          $('.page-item').removeClass('active');
          // Thêm lớp active vào thẻ li của nút được click
          $(this).parent('li').addClass('active');

          $.post("./site/controller/product_controller.php", {
              page: page_data,
              category: category_data,
              startPrice: startPrice_data,
              endPrice: endPrice_data,
              sex: sex_data,
              size: size_data,
              sale: sale_data,
            },

            function(data, status) {
              $('.row-product').html(data);
              // Cuộn trang lên đầu sau khi nhận được dữ liệu với hiệu ứng nhanh
              $('html, body').animate({
                scrollTop: 0
              }, 100); // 400 milliseconds (0.4 seconds)
            });
        });


        $('#button-Filter').click(function() {

          // Lấy giá trị bắt đầu và kết thúc của thanh trượt
          var categoryID = document.getElementById("category");
          var sexID = document.getElementById("sex");
          var sizeID = document.getElementById("size");


          var category_data = categoryID.value;
          var startPrice_data = $(".slider-range").slider("values", 0);
          var endPrice_data = $(".slider-range").slider("values", 1);
          var sex_data = sexID.value;
          var size_data = sizeID.value;
          var sale_data = document.getElementById("sale").checked;
          var page_data = 1;

          // In ra console để kiểm tra
          console.log("Category: " + category_data);
          console.log("Giá bắt đầu: " + startPrice_data);
          console.log("Giá kết thúc: " + endPrice_data);
          console.log("Sex : " + sex_data);
          console.log("Size : " + size_data);
          console.log("Sale : " + sale_data);

          $.post("./site/controller/product_controller.php", {
              page: page_data,
              category: category_data,
              startPrice: startPrice_data,
              endPrice: endPrice_data,
              sex: sex_data,
              size: size_data,
              sale: sale_data,
            },

            function(data, status) {
              $('.row-product').html(data);
              //  lấy text
              var selectedOptionCategory = categoryID.options[categoryID.selectedIndex];
              var selectedNameCategory = selectedOptionCategory.text;
             console.log(selectedNameCategory);
              var selectedOptionSex = sexID.options[sexID.selectedIndex];
              var selectedNameSex = selectedOptionSex.text;
              console.log(selectedNameSex);
              var selectedOptionSize = sizeID.options[sizeID.selectedIndex];
              var selectedNameSize = selectedOptionSize.text;
              console.log(selectedNameSize);
              // thêm span
              var newSpanCategory = document.createElement('span');
              newSpanCategory.classList.add('badge', 'text-bg-danger');
              newSpanCategory.textContent = selectedNameCategory;
              
              var newSpanPrice = document.createElement('span');
              newSpanPrice.classList.add('badge', 'text-bg-danger');
              newSpanPrice.textContent = '$'+startPrice_data+' - $'+ endPrice_data;

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
              } else  {
                newSpanSale.textContent = 'Tất cả';
              }



              //thay tag
              var tag_filtter = document.querySelector('.tag-filtter');
              tag_filtter.innerHTML = '';
              tag_filtter.appendChild(newSpanCategory);
              tag_filtter.appendChild(newSpanPrice);
              tag_filtter.appendChild(newSpanSex);
              tag_filtter.appendChild(newSpanSize);
              tag_filtter.appendChild(newSpanSale);

              // xóa hết phân trang
              var paginationList = document.querySelector('.pagination');
              paginationList.innerHTML = '';

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



            });
        });



      });
    </script>