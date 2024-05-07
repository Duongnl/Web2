<style>
    #staff_manager_form {
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

<form action="<?php echo $url.'/staff_controller'  ?>   " method="POST" id="staff_manager_form">
    <input type="hidden" id="action" name="action" value="">
    <button name="exit-staff_manager" type="button" class="btn btn-outline-danger" style="border: 0px; border-radius:20px;float:right" onclick="exit_staff()"> <b>X</b> </button>
    <div style=" padding: 20px;">
        <!-- <h3 style="text-align: center;" >Edit supplier</h3> -->
        <input type="text" id="input-text-head" value="" style="text-align: center;margin:0 auto;display:block; border:none; font-size :25px;" disabled>
        <div class="main_content">
        <div class="left_colum">
        <div class="input-group flex-nowrap" style="margin-top: 20px;">
            <span class="input-group-text" id="addon-wrapping" style=" padding-right: 14px; padding-left: 14px;"><b> ID </b></span>
            <input id="staff_id" name="staff_id" type="text" class="form-control" placeholder="Staff ID" aria-label="Username" aria-describedby="addon-wrapping" readonly>
        </div>
        <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-boxes-packing"></i></span>
            <input id="staff_name" name="staff_name" type="text" class="form-control" placeholder="Staff name" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-boxes-packing"></i></span>
            <select id="Position" name="Position"  class="form-control"  aria-label="Position" aria-describedby="addon-wrapping">
                <?php 
                    require_once('./admin/model/quyen_model.php');
                    // Tạo một đối tượng quyen_model
                    $quyen_model = new quyen_model();
                    // Gọi hàm để lấy dữ liệu quyền từ cơ sở dữ liệu
                    $queryQuyen = $quyen_model->getQuyenData();
                    // Lặp qua kết quả và tạo các lựa chọn cho combo box
                    while ($row = mysqli_fetch_array($queryQuyen)) {
                    echo "<option value='" . $row['MaQuyen'] . "'>" . $row['TenQuyen'] . "</option>";
                    }
                ?>    
            </select>
        </div>
        <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-boxes-packing"></i></span>
            <input id="staff_tenTK" name="staff_tenTK" type="text" class="form-control" placeholder="Tên tài khoản" aria-label="tenTK" aria-describedby="addon-wrapping">
        </div>
        </div>
        <div class="right_colum">
        <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-boxes-packing"></i></span>
            <input id="staff_email" name="staff_email" type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-boxes-packing"></i></span>
            <input id="staff_sdt" name="staff_sdt" type="text" class="form-control" placeholder="SDT" aria-label="SDT" aria-describedby="addon-wrapping">
        </div>

        <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-boxes-packing"></i></span>
            <input id="staff_matkhau" name="staff_matkhau" type="text" class="form-control" placeholder="MatKhau" aria-label="MatKhau" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap" style="margin-top: 20px;border:0px">
            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-boxes-packing"></i></span>
            <input id="staff_diaChiNV" name="staff_diaChiNV" type="text" class="form-control" placeholder="DiaChi" aria-label="DiaChi" aria-describedby="addon-wrapping">
        </div>
        </div>
        </div>
        <input id="memo" value =""></input>
        <input id="btn-staff-form" type="submit" class="btn btn-success" style=" margin:0 auto;display:block; margin-top: 20px; " onclick="return inspect()" value=""></input>
    </div>
</form>

<div id="overlay" onclick="click_overlay()" ></div>





<!-- Thông báo -->
<?php require_once('./public/template/admin/toast.php');
toast::memo("Success", "back_from_controller", "limegreen");
?>



<script>
    function staff_manager_form(maNV, tenNV, tenTK, email, sdt, matKhau, thoiGian, diaChiNV , formName, action, buttonName) {
        document.getElementById("staff_manager_form").style.display = "block";
        document.getElementById("overlay").style.display = "block";
        document.getElementById("input-text-head").value = formName;
        document.getElementById("staff_id").value = maNV;
        document.getElementById("staff_name").value = tenNV;
        // $tenQuyen = $_GET['Position'];
        document.getElementById("staff_tenTK").value = tenTK;
        document.getElementById("staff_email").value = email;
        document.getElementById("staff_sdt").value = sdt;
        document.getElementById("staff_matkhau").value = matKhau;
        document.getElementById("staff_diaChiNV").value = diaChiNV;
        document.getElementById("action").value = action;


        document.getElementById("btn-staff-form").value = buttonName ;
        if  (action == 'delete')  {
            document.getElementById("staff_name").readOnly = true;
            document.getElementById("staff_tenTK").readOnly = true;
            document.getElementById("staff_email").readOnly = true;
            document.getElementById("staff_sdt").readOnly = true;
            document.getElementById("staff_matkhau").readOnly = true;
            document.getElementById("staff_diaChiNV").readOnly = true;

        } else {
            document.getElementById("staff_name").readOnly = false;
        }

    }

    function exit_staff() {
        document.getElementById("staff_manager_form").style.display = "none";
        document.getElementById("memo").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }

    function click_overlay() {
        document.getElementById("staff_manager_form").style.display = "none";
        document.getElementById("memo").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }



    function inspect() {
        var staff_name = document.getElementById("staff_name").value.trim();
        var staff_tenTK = document.getElementById("staff_tenTK").value.trim();
        var staff_email = document.getElementById("staff_email").value.trim();
        var staff_sdt = document.getElementById("staff_sdt").value.trim();
        var staff_matkhau = document.getElementById("staff_matkhau").value.trim();
        var staff_diaChiNV = document.getElementById("staff_diaChiNV").value.trim();
        
        
        function checkEmail(email)
        {
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return emailRegex.test(email);
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
        
        function checkPhoneNumber(PhoneNumber)
        {
            var pattern = /^(0[1-9])+([0-9]{8})\b/;
            return pattern.test(PhoneNumber);
        }
        function checkUserName(UserName)
        {
            <?php
                    // require('../model/account_manager_model.php');
                    $account_manager_model = new account_manager_model();
                    $queryTenTK =$account_manager_model->FilterTenTK();
                    $ArrayTenTK = [];
                    while($row = mysqli_fetch_array($queryTenTK))
                    {
                        $ArrayTenTK = $row['TenTK'];
                    }
            ?>

            var ArrayUserName = <?php echo json_encode($ArrayTenTK); ?>;
            return ArrayUserName.includes(UserName);
            
        }


        if (staff_name == "" || staff_tenTK == "" || staff_email == "" || staff_sdt=="" || staff_matkhau== "" || staff_diaChiNV == "" ) {
            notification = document.getElementById("memo");
            notification.style.display = "block";
            notification.value = "Thông tin không được để trống ! ";
            return false;
        } else if(!checkEmail(staff_email))
        {
            notification = document.getElementById("memo");
            notification.style.display = "block";
            notification.value = "Sai định dạng về Email ! ";
            return false;
        }
        else if (!checkPhoneNumber(staff_sdt))
        {
            notification = document.getElementById("memo");
            notification.style.display = "block";
            notification.value = "Sai định dạng về Số điện thoại ! ";
            return false;
        }
         else if(checkUserName(staff_tenTK))
         {
            notification = document.getElementById("memo");
             notification.style.display = "block";
            notification.value = "Ten tài khoản đã tồn tại ";
             return false;
         }
         else if (checkValidEmail(staff_email))
         {
            notification = document.getElementById("memo");
             notification.style.display = "block";
            notification.value = "Email đã tồn tại ";
             return false;
         }
        else
        {
            return true;
        }
        
    }
</script>