<?php
$request = $_SERVER['REQUEST_URI'];
$url =  handle_url::getURLAdmin($request);
?>

<style>
    #discount_form {
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
        color: #DB4444;
        font-size: 13px;
        margin-left: 46px;
        border: 0;
        width: 300px;
    }

    #memo_percent {
        color: #DB4444;
        font-size: 13px;
        margin-left: 46px;
        border: 0;
        width: 300px;
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

<form action="<?php echo $url . '/discount_controller' ?>" method="POST" id="discount_form">
    <input type="hidden" id="action" name="action" value="">
    <button name="exit-discount" type="button" class="btn btn-outline-danger" style="border: 0px; border-radius:20px;float:right" onclick="exit_discount()"> <b>X</b> </button>
    <div style=" padding: 20px;">
        <!-- <h3 style="text-align: center;" >Edit discount</h3> -->
        <input type="text" id="input-text-head" value="" style="text-align: center;margin:0 auto;display:block; border:none; font-size :25px;" disabled>
        <div class="input-group flex-nowrap" style="margin-top: 20px;">
            <span class="input-group-text" id="addon-wrapping" style=" padding-right: 14px; padding-left: 14px;"><b>ID </b></span>
            <input id="discount_id" name="discount_id" type="text" class="form-control" placeholder="discount ID" aria-label="Username" aria-describedby="addon-wrapping" readonly>
        </div>
        <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-percent"></i></span>
            <input id="discount_name" name="discount_name" type="text" class="form-control" placeholder="discount name" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <input type="text" value="" id="memo" disabled>
        <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-percent"></i></span>
            <input id="discount_percent" name="discount_percent" type="number" min="0" max="100" class="form-control" placeholder="discount percent" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <input type="text" value="" id="memo_percent" disabled>

        <input id="btn-discount-form" type="submit" class="btn btn-success" style=" margin:0 auto;display:block; margin-top: 20px; " onclick="return inspect()" value=""></input>
    </div>
</form>

<div id="overlay" onclick="click_overlay()"></div>





<!-- Thông báo -->
<?php require_once('./public/template/admin/toast.php');
toast::memo("Success", "back_from_discount_controller", "limegreen");
?>



<script>
    function discount_form(maKM, tenKM, phamtramKM, formName, action, buttonName) {
        document.getElementById("discount_form").style.display = "block";
        document.getElementById("overlay").style.display = "block";
        document.getElementById("input-text-head").value = formName;
        document.getElementById("discount_id").value = maKM;
        document.getElementById("discount_name").value = tenKM;
        document.getElementById("discount_percent").value = phamtramKM;
        document.getElementById("action").value = action;
        document.getElementById("btn-discount-form").value = buttonName;
        if (action == 'delete') {
            document.getElementById("discount_name").readOnly = true;
        } else {
            document.getElementById("discount_name").readOnly = false;
        }

    }

    function exit_discount() {
        document.getElementById("discount_form").style.display = "none";
        document.getElementById("memo").value = "";
        document.getElementById("memo_percent").value = "";
        document.getElementById("overlay").style.display = "none";
    }

    function click_overlay() {
        document.getElementById("discount_form").style.display = "none";
        document.getElementById("memo").style.display = "none";
        document.getElementById("memo_percent").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }



    function inspect() {
        var discount_name = document.getElementById("discount_name").value.trim();
        var discount_percent = document.getElementById("discount_percent").value.trim();

        var validName = /^[a-zA-Z0-9\s]+$/; // Mẫu cho tên chiết khấu
        var validPercent = /^(100|[1-9]?[0-9])$/; // Mẫu cho phần trăm chiết khấu

        // Kiểm tra và hiển thị thông báo nếu discount_name hoặc discount_percent không hợp lệ
        if (discount_name == "") {
            document.getElementById("memo").value = "Discount name is empty!";
            return false;
        } else if (!validName.test(discount_name)) {
            document.getElementById("memo").value = "Invalid discount name!";
            return false;
        } else if (discount_percent === "") {
            document.getElementById("memo_percent").value = "Discount percent is empty!";
            return false;
        } else if (!validPercent.test(discount_percent)) {
            document.getElementById("memo_percent").value = "Invalid discount percent!";
            return false;
        } else {
            document.getElementById("memo").value = "";
            document.getElementById("memo_percent").value = "";
            return true;
        }
    }
</script>