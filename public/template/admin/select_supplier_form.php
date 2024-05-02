<?php
$request = $_SERVER['REQUEST_URI'];
$url =  handle_url::getURLAdmin($request);
?>

<style>
    #select_supplier_form{
        background-color: whitesmoke;
        border: 1px solid gray;
        border-radius: 20px;

        width: 500px;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        position: fixed;
        display: none;

        z-index: 2;

    }

    #overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        /* Màu đen với độ mờ 50% */
        z-index: 1;
        /* Đảm bảo lớp phủ nằm trên nội dung */
        display: none;
    }
</style>
<form action="<?php echo $url . '/import_form' ?>" method="POST" id="select_supplier_form">
    <button name="exit-supplier" type="button" class="btn btn-outline-danger" style="border: 0px; border-radius:20px;float:right" onclick="exit_supplier()"> <b>X</b> </button>
    <div style=" padding: 20px;">
        <!-- <h3 style="text-align: center;" >Edit supplier</h3> -->
        <input type="text" id="input-text-head" value="" style="text-align: center;margin:0 auto;display:block; border:none; font-size :25px;" disabled>

        <select name="supplier" class="form-select select-filter-type" aria-label="Default select example" style=" margin-top: 20px;">
            <?php
            $supplier_model = new supplier_model();
            $query = $supplier_model->getSupplierData();
            while ($row = mysqli_fetch_array($query)) {
                $supplier = [];
                $supplier['MaNCC'] = $row['MaNCC'];
                $supplier['TenNCC'] = $row['TenNCC'];
                $supplier_data = json_encode($supplier); 
            ?>
            <option  value="<?php echo htmlspecialchars($supplier_data); ?>">  <?php echo $row['TenNCC']?>  </option>
            <?php } ?>
        </select>
        <input id="btn-supplier-form" type="submit" class="btn btn-success" style=" margin:0 auto;display:block; margin-top: 20px; " value=""></input>
    </div>
</form>

<div id="overlay" onclick="click_overlay()"></div>

<script>
    function select_supplier_form(formName, buttonName) {
        document.getElementById("select_supplier_form").style.display = "block";
        document.getElementById("overlay").style.display = "block";
        document.getElementById("input-text-head").value = formName;
        document.getElementById("btn-supplier-form").value = buttonName;
       
    }

    function exit_supplier() {
        document.getElementById("select_supplier_form").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }

    function click_overlay() {
        document.getElementById("select_supplier_form").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }
</script>