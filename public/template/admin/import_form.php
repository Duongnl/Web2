<?php
$request = $_SERVER['REQUEST_URI'];
$url =  handle_url::getURLAdmin($request);

if (isset($_POST['supplier']) ) {
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
</style>


<div class="main-content">
  <a type="button" href="<?php echo  $url . '/import'; ?>" class="btn btn-light"><i class="fa-solid fa-arrow-left" style="display: inline-block; font-size: 30px;"></i></a>
  <h3 style="display: inline-block;padding-left: 15px;" class="h1-head-name">Import product</h3>
  
  <div style="display: flex; margin-top:10px;margin-bottom: 10px;" >
    <p style="font-size: 18px; margin-bottom: 0px;" > Supplier ID : <?php  echo $maNCC ?> </p>
    <p style="font-size: 18px;margin-left: 100px;margin-bottom: 0px;"> Supplier name : <?php  echo $tenNCC ?> </p>
  </div>
  
  <div style="display:flex;align-items: baseline; margin-bottom: 10px; "  >
    <p style="font-size: 18px;margin-right: 20px;">Product: </p>
    <select class="form-select select-filter-type" aria-label="Default select example"  >
      <option value="0" select>Áo thun kaki</option>
      <option value="1">Quần đen thun co giãn</option>
      <option value="2">Áo vest</option>
      <option value="3">Áo sơ mi tay dài</option>
    </select>
  </div>

  <div style="display:flex; align-items: baseline;margin-bottom: 10px;"  >
  <p style="font-size: 18px;margin-right: 55px;">Size: </p>  
  <select class="form-select select-filter-type" aria-label="Default select example"  >
      <option value="0" select>S</option>
      <option value="1">M</option>
      <option value="2">X</option>
      <option value="3">XL</option>
    </select>
  </div>

  <div style="display:flex;align-items: baseline; margin-bottom: 10px; "  >
    <p style="font-size: 18px;margin-right: 13px;">Quantity: </p>
    <div class="input-group flex-nowrap" >
        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-plus"></i></span>
        <input id="quantity" name="quantity" type="number" class="form-control" placeholder="Quantity product" aria-label="Username" aria-describedby="addon-wrapping">
    </div>
  </div>

  <div style="display:flex;align-items: baseline; margin-bottom: 10px; "  >
    <p style="font-size: 18px;margin-right: 47px;">Cost: </p>
    <div class="input-group flex-nowrap" >
        <span class="input-group-text" id="addon-wrapping" style=" padding-right: 13px; padding-left: 16px;"><i class="fa-solid fa-dollar-sign"></i></span>
        <input id="cost" name="cost" type="number" class="form-control" placeholder="Dollar" aria-label="Username" aria-describedby="addon-wrapping">
    </div>
    <button type="button" class="btn btn-success" style=" margin-left : 10px; width:150px;" >Add</button>
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