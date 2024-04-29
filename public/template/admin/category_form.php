<style>
    #category_form {
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

    #memo {
        display: none;
        color: #DB4444;
        font-size: 13px;
        margin-left: 46px;
    }

    #overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5); /* Màu đen với độ mờ 50% */
    z-index: 1; /* Đảm bảo lớp phủ nằm trên nội dung */
    display: none;
    }

</style>

<form action="../admin/controller/category_controller.php" method="POST" id="category_form">
    <input type="hidden" id="action" name="action" value="">
    <button name="exit-category" type="button" class="btn btn-outline-danger" style="border: 0px; border-radius:20px;float:right" onclick="exit_category()"> <b>X</b> </button>
    <div style=" padding: 20px;">
        <!-- <h3 style="text-align: center;" >Edit category</h3> -->
        <input type="text" id="input-text-head" value="" style="text-align: center;margin:0 auto;display:block; border:none; font-size :25px;" disabled>
        <div class="input-group flex-nowrap" style="margin-top: 20px;">
            <span class="input-group-text" id="addon-wrapping" style=" padding-right: 14px; padding-left: 14px;"><b>ID </b></span>
            <input id="category_id" name="category_id" type="text" class="form-control" placeholder="category ID" aria-label="Username" aria-describedby="addon-wrapping" readonly>
        </div>
        <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-list"></i></span>
            <input id="category_name" name="category_name" type="text" class="form-control" placeholder="Category name" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <b id="memo"> Category name is empty !</b>

        <input id="btn-category-form" type="submit" class="btn btn-success" style=" margin:0 auto;display:block; margin-top: 20px; " onclick="return inspect()" value="" ></input>
    </div>
</form>

<div id="overlay" onclick="click_overlay()" ></div>





<!-- Thông báo -->
<?php require_once('./public/template/admin/toast.php');
toast::memo("Success", "back_from_category_controller", "limegreen");
?>



<script>
    function category_form(maDM, tenDM, formName, action, buttonName) {
        document.getElementById("category_form").style.display = "block";
        document.getElementById("overlay").style.display = "block";
        document.getElementById("input-text-head").value = formName;
        document.getElementById("category_id").value = maDM;
        document.getElementById("category_name").value = tenDM;
        document.getElementById("action").value = action;
        document.getElementById("btn-category-form").value = buttonName;
        if  (action == 'delete')  {
            document.getElementById("category_name").readOnly = true;
        } else {
            document.getElementById("category_name").readOnly = false;
        }

    }

    function exit_category() {
        document.getElementById("category_form").style.display = "none";
        document.getElementById("memo").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }

    function click_overlay() {
        document.getElementById("category_form").style.display = "none";
        document.getElementById("memo").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }



    function inspect() {
        var category_name = document.getElementById("category_name").value.trim();
        if (category_name == "") {
            document.getElementById("memo").style.display = "block";
            return false;
        } else {
            return true;
        }
    }
</script>