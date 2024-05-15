<style>
  #search-product {
    margin-top: 10px;
    margin-bottom: 10px;
    background-color: #fff;
    display: flex;
    position: relative;
  }

  #search-product #search-txt {
    width: 65%;
    border: none;
    outline: none;
    padding: 6px 12px;
  }

  .wrap-button {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }

  .btn-search {
    width: 35%;
  }

  .wrap-table {
    clear: both;
    min-height: 560px;
    height: 560px;
    white-space: nowrap;
  }

  a {
    text-decoration: none;
  }

  .pagination {
    justify-content: center;
  }

  @media screen and (max-width:768px) {
    .wrap-button {
      flex-direction: column;
    }
  }
</style>
<?php
$product_model = new product_model();
$request = $_SERVER['REQUEST_URI'];
$url = handle_url::getURLAdmin($request);


$list = $product_model->getListSP();
?>
<div class="main-content">
  <h3 class="h1-head-name">Sản phẩm</h3>
  <div class="wrap-button">
    <a href=<?php echo $request . "/add" ?>>
      <button type="button" class="btn btn-success" style="margin-top: 10px; margin-bottom: 10px; ">
        <i class="fa-solid fa-circle-plus"></i> Thêm sản phẩm
      </button>
    </a>
  </div>
  <div class="wrap-table table-responsive-lg">
    <table class="table table-striped table-hover"  id="datatablesSimple">
      <thead>
        <tr>
          <th>ID</th>
          <th>Ảnh</th>
          <th>Tên sản phẩm</th>
          <th>Danh mục</th>
          <th>Số lượng</th>
          <th>Giá bán</th>
          <th>Khuyến mãi</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">


        <!-- <tr class="tr-body" style="height: 55px; line-height: 55px">
          <th scope="row">1</th>
          <td>
            <img src="../public/images/arsenal1.jpg" width="55px" height="55px">
          </td>
          <td>The north coat</td>
          <td>T-shirt</td>
          <td>150</td>
          <td>200$</td>
          <td>Sale 111111</td>
          <td>
            <button type="button" class="btn btn-info btn-view">
              <i class="fa-solid fa-eye"></i>
            </button>
            <button type="button" class="btn btn-warning btn-edit">
              <i class="fa-solid fa-pen-to-square"></i>
            </button>
            <button type="button" class="btn btn-danger btn-delete">
              <i class="fa-solid fa-trash"></i>
            </button>
          </td>
        </tr> -->
      </tbody>
    </table>
  </div>
  <ul class="pagination">
    <!-- <li class="page-item disabled">
      <span class="page-link">Previous</span>
    </li>
    <li class="page-item active"><span class="page-link">1</span></li>
    <li class="page-item">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li> -->
  </ul>

</div>

<?php require_once ('./public/template/admin/toast.php');
if (isset($_SESSION["back-from-controller"])) {
  switch ($_SESSION["back-from-controller"]) {
    case "add":
      toast::memo("Thêm thành công", "add-success", "limegreen");
      break;
    case "update":
      toast::memo("Sửa thành công", "update-success", "limegreen");
      break;
  }
  unset($_SESSION["back-from-controller"]);
}

?>

<script>
  var url = window.location.href.split("admin")[0];
  console.log(`${url}admin/controller/product_controller`)

  function deleteSP(id, sl) {
    if (confirm("Bạn có muốn xóa sản phẩm này")) {
      $.ajax({
        url: `${url}admin/controller/product_controller`,
        method: "POST",
        data: {
          method: "DELETE",
          id,
          sl
        },
        success: function (data) {
          alert(data);
          fetch_product_data();
        }
      })
    }
  }

  function fetch_product_data() {
    $.ajax({
      type: "POST",
      url: `${url}admin/controller/product_controller`,
      data: {
        method: "GET"
      },
      dataType: "json"
    }).done(function (result) {

      loadProduct( result)
      // renderPagination(0, result);

    })
  }

  fetch_product_data();

  function  loadProduct( result) {
    var html = "";
    var rootDirectory = "<?php echo $rootDirectory ?>"
    var url = "<?php echo $url ?>"
    for (var i = 0; i < result.data.length; i++) {
      html += ` <tr class="tr-body" style="height: 55px; line-height: 55px">
          <th scope="row">${result.data[i]["MaSP"]}</th>
          <td>
            <img src="${rootDirectory + result.data[i]["AnhChinh"]}" width="55px" height="55px">
          </td>
          <td>${result.data[i]["TenSP"]}</td>
          <td>${result.data[i]["DanhMuc"]}</td>
          <td>${result.data[i]["SoLuong"]}</td>
          <td data-order=${result.data[i]["GiaBan"]}>${formatCurrency(result.data[i]["GiaBan"])}</td>
          <td>${result.data[i]["KhuyenMai"]}</td>
          <td>
            <a href="${url + "/product/view?id=" + result.data[i]["MaSP"]}">
              <button type="button" class="btn btn-info btn-view">
                <i class="fa-solid fa-eye"></i>
              </button>
            </a>
            <a href="${url + "/product/edit?id=" + result.data[i]["MaSP"]}">
              <button type="button" class="btn btn-warning btn-edit">
                <i class="fa-solid fa-pen-to-square"></i>
              </button>
            </a>
              <button type="button" class="btn btn-danger btn-delete" onclick="deleteSP(${result.data[i]["MaSP"]}, ${result.data[i]["SoLuong"]} )">
                <i class="fa-solid fa-trash"></i>
              </button>
            </td>
          </tr>`;
    }
    $('#datatablesSimple tbody').html(html)

    const datatablesSimple = document.getElementById('datatablesSimple');
        if (datatablesSimple) {
         console.log( new simpleDatatables.DataTable(datatablesSimple, {
                searchable: true,
                labels: {
                    perPage: 'mục mỗi trang', // Label cho dropdown chọn số lượng item trên mỗi trang
                    noRows: 'Không có dữ liệu', // Label hiển thị khi không có dữ liệu
                    info: 'Hiển thị {start} đến {end} của {rows} mục', // Label hiển thị thông tin pagination
                    placeholder: "Tìm kiếm sản phẩm...",
                    noResults: "Không tìm thấy sản phẩm"
                }
                
            }));  

        }

        console.log(datatablesSimple)

        

  }
  function formatCurrency(amount) {
    // Chèn dấu phẩy vào hàng nghìn và thêm đơn vị tiền tệ
    return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ";
  }

  function renderPagination(pageSelect, data) {
    var pageCount = data.pageCount;
    var pagination = "";
    pagination += `<li class="page-item ${pageSelect == 0 ? "disabled" : ""}">
      <span class="page-link">Previous</span>
   `
    for (var i = 0; i < pageCount; i++) {
      if (i == pageSelect) {
        pagination += `</li><li class="page-item active"><span class="page-link">${i + 1}</span></li>`
      } else {
        pagination += `<li class="page-item">
      <a class="page-link" href="#">${i + 1}</a>
    </li>`
      }
    }
    pagination += ` <li class="page-item ${pageSelect == (pageCount - 1) ? "disabled" : ""}">
      <a class="page-link" href="#">Next</a>
    </li>`

    $('.pagination').html(pagination);
  }


  $("#search-txt").keyup(function (event) {
    if(event.keyCode == 13) {
      $(".btn-search").click();
    }
  })
  
  $(".btn-search").click(function() {
    var key =  $("#search-txt").val();
    searchProduct(key);
    $("#search-txt").val("");
  })

  function searchProduct(key) {
  $.ajax({
      type: "POST",
      url: `${url}/admin/controller/product_controller`,
      data: {
        method: "GET",
        search: key
      }
    }).done(function (result) {
      console.log(result)
    })
  }
    
</script>
