

<style>
    #supplier_form {
        background-color: whitesmoke;
        border: 1px solid gray;
        border-radius: 20px;
       
        width: 500px;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        position: fixed;
       display: none;
    }
    #memo {
        display: none;
        color: #DB4444;
        font-size: 13px;
        margin-left: 46px;
    }

</style>

<form action="../controller/supplier_controller.php"  method="POST" id = "supplier_form">
        <input type="hidden" id="action" name="action" value="">
        <button name="exit-supplier"  type="button" class="btn btn-outline-danger" style="border: 0px; border-radius:20px;float:right"  onclick="exit_supplier()"> <b>X</b> </button>
        <div style=" padding: 20px;" >
            <!-- <h3 style="text-align: center;" >Edit supplier</h3> -->
            <input type="text" id="input-text-head" value=""  style="text-align: center;margin:0 auto;display:block; border:none; font-size :25px;" disabled >
            <div class="input-group flex-nowrap" style="margin-top: 20px;" >
                <span class="input-group-text" id="addon-wrapping" style=" padding-right: 14px; padding-left: 14px;" ><b>ID </b></span>
                <input id="supplier_id" name="supplier_id" type="text" class="form-control" placeholder="Supplier ID" aria-label="Username" aria-describedby="addon-wrapping" readonly  >
            </div>
            <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px" >
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-boxes-packing"></i></span>
                <input id="supplier_name" name = "supplier_name" type="text" class="form-control" placeholder="Supplier name" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <b id="memo"> Supplier name is empty !</b> 
            
            <button type="submit" class="btn btn-success" style=" margin:0 auto;display:block; margin-top: 20px; " onclick="return inspect()" >Save</button>
        </div>
</form>

<!-- Thông báo -->
<?php  require_once('../../public/template/admin/toast.php');   
       toast::memo("Success","back_from_controller","limegreen" );
?>



<script>
 function supplier_form(maNCC, tenNCC , formName,action) {
    document.getElementById("supplier_form").style.display = "block";
    document.getElementById("input-text-head").value= formName;
    document.getElementById("supplier_id").value = maNCC;
    document.getElementById("supplier_name").value = tenNCC; 
    document.getElementById("action").value = action; 
    
  }

    function exit_supplier() {
    document.getElementById("supplier_form").style.display = "none";
    document.getElementById("memo").style.display = "none";
  }

  function inspect(){
    var supplier_name =  document.getElementById("supplier_name").value.trim();
    if (supplier_name == "") {
        document.getElementById("memo").style.display = "block";
        return false;
    } else {
        return true;
    }
  }
</script>
