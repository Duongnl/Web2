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

.pagination {
  justify-content: center;
}

@media screen and (max-width:768px) {
  .wrap-button {
    flex-direction: column;
  }
}
</style>
<div class="main-content">
  <h3 class="h1-head-name">Product</h3>
  <div class="wrap-button">
    <form action="" id="search-product">
      <input type="text" id="search-txt" placeholder="Search product">
      <button type="button" class="btn btn-primary btn-search">
        <i class="fa-solid fa-magnifying-glass"></i>
        Search
      </button>
    </form>

    <button type="button" class="btn btn-success" style="margin-top: 10px; margin-bottom: 10px; ">
      <i class="fa-solid fa-circle-plus"></i> Add new product
    </button>
  </div>
  <div class="wrap-table table-responsive-lg">
    <table class="table table-striped table-hover" style="text-align: center;">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Image</th>
          <th scope="col">Name product</th>
          <th scope="col">Category</th>
          <th scope="col">Quantity</th>
          <th scope="col">Price</th>
          <th scope="col">Sale</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody class="table-group-divider ">
        <tr class="tr-body" style="height: 55px; line-height: 55px">
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
        </tr>
        <tr class="tr-body" style="height: 55px; line-height: 55px">
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
        </tr>
        <tr class="tr-body" style="height: 55px; line-height: 55px">
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
        </tr>
        <tr class="tr-body" style="height: 55px; line-height: 55px">
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
        </tr>
        <tr class="tr-body" style="height: 55px; line-height: 55px">
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
        </tr>
        <tr class="tr-body" style="height: 55px; line-height: 55px">
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
        </tr>
        <tr class="tr-body" style="height: 55px; line-height: 55px">
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
        </tr>
      </tbody>
    </table>
  </div>
  <ul class="pagination">
    <li class="page-item disabled">
      <span class="page-link">Previous</span>
    </li>
    <li class="page-item active"><span class="page-link">1</span></li>
    <li class="page-item">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>

  <?php
  require_once('./public/template/admin/product_form.php');
  ?>
</div>