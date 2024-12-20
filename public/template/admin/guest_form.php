<style>
    #guest_form {
        background-color: whitesmoke;
        border: 1px solid gray;
        border-radius: 20px;

        width: 50%;
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
        background: none;
        border: none;
        width:100%;
    }
    .main_content {
        display:flex;
        gap : 5%;
        justify-content: space-around;
    }
.right_colum,
.left_colum {
    width:50%;
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
<?php 
$request = $_SERVER['REQUEST_URI'];
$url =  handle_url::getURLAdmin($request);
?>
<form action="<?php echo $url.'/guest_controller' ?>" method="POST" id="guest_form">
    <input type="hidden" id="action" name="action" value="">
    <input type="hidden" id="maTK" name="maTK" value="">
    <button name="exit-guest_manager" type="button" class="btn btn-outline-danger" style="border: 0px; border-radius:20px;float:right" onclick="exit_guest()"> <b>X</b> </button>
    <div style=" padding: 20px;">
        <!-- <h3 style="text-align: center;" >Edit supplier</h3> -->
        <input type="text" id="input-text-head" value="" style="text-align: center;margin:0 auto;display:block; border:none; font-size :25px;" disabled>
        <div class="main_content">
        <div class="left_colum">
        <label style="margin-top: 10px;border:0px">ID Guest  </label>
        
        <div class="input-group flex-nowrap" style="margin-top: 10px;">

            <span class="input-group-text" id="addon-wrapping" style=" padding-right: 14px; padding-left: 14px;"><b> ID </b></span>
            <input id="guest_id" name="guest_id" type="text" class="form-control" placeholder="Guest ID" aria-label="Username" aria-describedby="addon-wrapping" readonly>
        </div>
        <label style="margin-top: 10px;border:0px"> Guest Name </label>


        <div class="input-group flex-nowrap" style="margin-top: 10px;border:0px">
            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-boxes-packing"></i></span>
            <input id="guest_name" name="guest_name" type="text" class="form-control" placeholder="Guest name" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <label style="margin-top: 10px;border:0px">UserName </label>

        <div class="input-group flex-nowrap" style="margin-top: 10px;border:0px">
            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-user"></i></span>
            <input id="guest_tenTK" name="guest_tenTK" type="text" class="form-control" placeholder="TenTaiKhoan" aria-label="tenTK" aria-describedby="addon-wrapping">
        </div>

        <label style="margin-top: 10px;border:0px">Position </label>

        <div class="input-group flex-nowrap" style="margin-top: 10px;border:0px">
            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-people-roof"></i></span>
            <input id="guest_QuyenKH" name="guest_QuyenKH" type="text" class="form-control" placeholder="Quyền " aria-label="Quyen" aria-describedby="addon-wrapping">
        </div>


        </div>
        <div class="right_colum">
        <label style="margin-top: 10px;border:0px">Guest Email </label>


        <div class="input-group flex-nowrap" style="margin-top: 10px;border:0px">
            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-envelope"></i></span>
            <input id="guest_email" name="guest_email" type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="addon-wrapping">
        </div>

        <label style="margin-top: 10px;border:0px">Guest PhoneNumber </label>

        <div class="input-group flex-nowrap" style="margin-top: 10px;border:0px">
            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-phone"></i></span>
            <input id="guest_sdt" name="guest_sdt" type="text" class="form-control" placeholder="SDT" aria-label="SDT" aria-describedby="addon-wrapping">
        </div>
        <label style="margin-top: 10px;border:0px">Guest Password </label>

        <div class="input-group flex-nowrap" style="margin-top: 10px;border:0px">
            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-key"></i></span>
            <input id="guest_matkhau" name="guest_matkhau" type="text" class="form-control" placeholder="MatKhau" aria-label="MatKhau" aria-describedby="addon-wrapping">
        </div>
        <label style="margin-top: 10px;border:0px">Guest Address </label>
        <div class="input-group flex-nowrap" style="margin-top: 10px;border:0px">
            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-location-dot"></i></span>
            <input id="guest_diaChi" name="guest_diaChi" type="text" class="form-control" placeholder="DiaChi" aria-label="DiaChi" aria-describedby="addon-wrapping">
        </div>
        </div>
        </div>
        <input id="memo" disabled value ="" style="text-align: center; margin-left:0px"></input>
        <input id="btn-guest-form" type="submit" class="btn btn-success" style=" margin:0 auto;display:block; margin-top: 20px; " onclick="return inspect()" value=""></input>
    </div>
</form>

<div id="overlay" onclick="click_overlay()" ></div>





<!-- Thông báo -->
<?php require_once('./public/template/admin/toast.php');
toast::memo("Success", "back_from_controller", "limegreen");
?>



<script>
    function guest_form(maKH, tenKH, tenTK, quyen, email, sdt, matKhau, diaChiKH,maTK , formName, action, buttonName) {
        document.getElementById("guest_form").style.display = "block";
        document.getElementById("overlay").style.display = "block";
        document.getElementById("input-text-head").value = formName;

        document.getElementById("guest_id").value = maKH;
        document.getElementById("guest_name").value = tenKH;
        document.getElementById("guest_QuyenKH").value = "";
        document.getElementById("guest_QuyenKH").readOnly = true;
        document.getElementById("guest_tenTK").value = tenTK.trim();

        document.getElementById("guest_email").value = email;
        document.getElementById("guest_sdt").value = sdt;
        document.getElementById("guest_matkhau").value = matKhau;
        document.getElementById("guest_diaChi").value = diaChiKH;
        document.getElementById("action").value = action;
        document.getElementById("maTK").value = maTK;
        document.getElementById("btn-guest-form").value = buttonName;











        document.getElementById("btn-guest-form").value = buttonName ;
        if  (action == 'delete')  {
            document.getElementById("guest_name").readOnly = true;
            document.getElementById("guest_tenTK").readOnly=true;
            document.getElementById("guest_email").readOnly=true;
            document.getElementById("guest_sdt").readOnly=true;
            document.getElementById("guest_matkhau").readOnly=true;
            document.getElementById("guest_diaChi").readOnly=true;
            document.getElementById("guest_QuyenKH").disabled = true;

            


        } else {
            document.getElementById("guest_name").readOnly = false;
            document.getElementById("guest_tenTK").readOnly=false;
            document.getElementById("guest_email").readOnly=false;
            document.getElementById("guest_sdt").readOnly=false;
            document.getElementById("guest_matkhau").readOnly=false;
            document.getElementById("guest_diaChi").readOnly=false;
            document.getElementById("guest_QuyenKH").disabled = false;
        }

    }

    function exit_guest() {
        document.getElementById("guest_form").style.display = "none";
        document.getElementById("memo").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }

    function click_overlay() {
        document.getElementById("guest_form").style.display = "none";
        document.getElementById("memo").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }



    function inspect() {
        var guest_name = document.getElementById("guest_name").value.trim();
        var guest_tenTK = document.getElementById("guest_tenTK").value.trim();
        var guest_email = document.getElementById("guest_email").value.trim();
        var guest_sdt = document.getElementById("guest_sdt").value.trim();
        var guest_matkhau = document.getElementById("guest_matkhau").value.trim();
        var guest_diaChiKH = document.getElementById("guest_diaChi").value.trim();
        
        
        function checkEmail(email)
        {
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return emailRegex.test(email);
        }
        function checkRegexUserName(UserName)
        {
            var pattern = /^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){2,18}[a-zA-Z0-9]$/;
            return pattern.test(UserName.trim());
        }
        function checkValidEmail(email)
        {
            <?php 
            $account_manager_model = new account_manager_model();
            $queryEmail =$account_manager_model->FilterEmail();
            $ArrayEmail = [];
            while($row = mysqli_fetch_array($queryEmail))
            {
                $ArrayEmail = $row['Email'];
            }
            
            ?>
            var ArrayEmails = <?php echo json_encode($ArrayEmail) ; ?> ;
            return ArrayEmails.includes(email); 

        }
        function checkValidPhone(PhoneNumber)
        {
            <?php 
                $account_manager_model = new account_manager_model();
                $querySDT =$account_manager_model->FilterSDT();
                $ArraySDT = [];
                while($row = mysqli_fetch_array($querySDT))
            {
                $ArraySDT = $row['SDT'];
            }
            
            ?>
            var ArraySDTs = <?php echo json_encode($ArraySDT) ; ?> ;
            return ArraySDTs.includes(PhoneNumber); 

        }
        function checkPhoneNumber(PhoneNumber)
        {
            var pattern = /^(0[1-9])+([0-9]{8})\b/;
            return pattern.test(PhoneNumber);
        }
        function checkUserName(UserName)
        {
            var maTK =  document.getElementById("maTK").value
            //  var tenTK =  document.getElementById("staff_tenTK").value
             
             
            <?php
                    // require('../model/account_manager_model.php');
                    $account_manager_model = new account_manager_model();
                    $queryTenTK =$account_manager_model->FilterTenTK();
                    $ArrayTenTK = [];
                    while($row = mysqli_fetch_array($queryTenTK))
                    {
                        $ArrayTenTK[] = $row['TenTK'].'-'.$row['MaTK'];
                    }
            ?>

            var ArrayUserName = <?php echo json_encode($ArrayTenTK); ?>;
            console.log(ArrayUserName)    

            var flag =true;
            ArrayUserName.forEach(element => {
                const parts = element.split("-");
                console.log("parts>>>",parts)
                console.log("UserName>>>",UserName)
                console.log("maTK>>>",maTK)
                if (UserName == parts[0] && maTK != parts[1]){
                    console.log("đã vào")
                    flag =false
                    return;
                } 
            });
            return flag;
            
        }


        if (guest_name == "" || guest_tenTK == "" || guest_email == "" || guest_sdt=="" || guest_matkhau== "" || guest_diaChiKH == "" ) {
            notification = document.getElementById("memo");
            notification.style.display = "block";
            notification.value = "Thông tin không được để trống ! ";
            return false;
        } else if(!checkEmail(guest_email))
        {
            notification = document.getElementById("memo");
            notification.style.display = "block";
            notification.value = "Sai định dạng về Email ! ";
            return false;
        }
        else if (!checkPhoneNumber(guest_sdt))
        {
            notification = document.getElementById("memo");
            notification.style.display = "block";
            notification.value = "Sai định dạng về Số điện thoại ! ";
            return false;
        }
        else if(checkUserName(guest_tenTK)==false)
         {
            notification = document.getElementById("memo");
             notification.style.display = "block";
            notification.value = "Ten tài khoản đã tồn tại ";
             return false;
         } 
          else if (checkRegexUserName(guest_tenTK)==false)
        {
            notification = document.getElementById("memo");
            notification.style.display = "block";
            notification.value = "Sai định dạng tài khoản ! ";
            return false;
        }
        else
        {
            return true;
        }
        
    }
</script>