<?php
$request = $_SERVER['REQUEST_URI'];
$url =  handle_url::getURLAdmin($request);
?>

<style>
  .btn-delete {
    display: none;
  }

  .tr-body:hover .btn-delete {
    display: block;
  }
</style>


<div class="main-content">
  <a type="button" href="<?php echo  $url . '/import'; ?>" class="btn btn-light"><i class="fa-solid fa-arrow-left" style="display: inline-block; font-size: 40px;"></i></a>
  <h3 style="display: inline-block;padding-left: 15px;" class="h1-head-name">Import product</h3>

  <div style="display:flex; margin-bottom: 20px; "  >
    <select class="form-select select-filter-type" aria-label="Default select example" style=" margin-top: 20px;" >
      <option value="" disabled selected hidden>Supplier name</option>
      <option value="0" select>Supplier DV</option>
      <option value="1">Supplier HT</option>
      <option value="2">Supplier New</option>
      <option value="3">Supplier DU</option>
    </select>
    <button type="button" class="btn btn-success" style="height: 40px;margin-top: 20px;margin-left: 20px;" >Select</button>
  </div>



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