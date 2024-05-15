
<?php $url=handle_url::getUrl(); ?>


  <div class="account">
    <div class="container ctn-account">
      <div class="nav">
        <h4 style="font-family: Arial, Helvetica, sans-serif; color: #db4444 ;"><a style="color: #000000 ;" href="<?php echo  $url; ?>" class="nav-item">Trang chủ </a>/Quản lý thông tin</h4>
      </div>
    </div>
    
    <div class="account-management">
    <div class="tab_left">
    <div class="button_switch">
      <a type="button" class="user_infor active" id="user_information" onclick="showForm('account_form')">Thông tin người dùng</a>
      <a type="button" class="account_infor" id="account_information" onclick="showForm('account_form_2')">Thông tin tài khoản</a>
      <a href="<?php echo  $url . '/order' ?>" style="text-decoration: none;" class="account_infor">Xem đơn hàng</a>

    </div>
    <div style="display: flex; flex-direction: column;">
        <form action="<?php echo $url . '/account_controller' ?>" method="POST">
          <input type="hidden" value="logout" name="logout">
          <button type="submit" style="text-decoration: none; text-align: center; background-color:#db4444; color:aliceblue" class="view-details-order">Đăng xuất</button>
        </form>
    </div>
    </div>
      <div class="account-management-container">
      
        <section class="account-main-content">
        
          <?php
          if (isset($_SESSION['MaTK'])) {
            $maTK = $_SESSION['MaTK'];
          } else {
            $maTK = NULL;
          }

          $model = new account_model();
          $boolean = $model->checkTaiKhoan($maTK);
          if ($boolean == 1) {
            $query = $model->getTaiKhoanKhachHang($maTK);
          } else {
            $query = $model->getTaiKhoanNhanVien($maTK);
          }
          $row = mysqli_fetch_array($query);
          ?>

          <form action="<?php echo $url . '/account_controller' ?>" method="POST" id="account_form" class="account-profile-section" onsubmit="return validateForm_user()">
            <input type="hidden" id="action" name="action" value="update_user_info">
            <h1 class="account-profile-title">Thông tin người dùng</h1>
            <input type="hidden" id="user_id" name="user_id" value="<?php echo  $row['MaTK'] ?>">

            <div class="info">
              <div class="infor_1">
                <!-- input user name -->
                <div class="account-profile-contact-item">
                  <label class="account-profile-name-label">Họ và tên</label>
                  <input type="text" class="account-profile-contact-value" id="user_name" name="user_name" value="<?php echo  $row['HoTen'] ?>"></input>
                </div>

                <!-- input phone -->
                <div class="account-profile-contact-item">
                  <label class="account-profile-name-label">Số điện thoại</label>
                  <input type="text" class="account-profile-contact-value" id="user_phone" name="user_phone" value="<?php echo '0' . $row['SDT'] ?>"></input>
                </div>
                <!-- date  -->
                <div class="account-profile-contact-item">
                  <label class="account-profile-contact-label">Ngày tạo</label>
                  <input type="date" class="account-profile-contact-value" id="user_date" name="user_date" value="<?php echo  $row['ThoiGian'] ?>" disabled></input>
                </div>
              </div>
              <div class="info_2">
                <!-- quyen -->
                <div class="account-profile-contact-item">
                  <label class="account-profile-contact-label">Quyền</label>
                  <input type="text" class="account-profile-contact-value" id="user_permission" name="user_permission" value="<?php echo  $row['TenQuyen'] ?>" disabled></input>
                </div>
                <!-- dia chi -->
                <div class="account-profile-contact-item">
                  <label class="account-profile-contact-label">Địa chỉ</label>
                  <input type="text" class="account-profile-contact-value" id="user_address" name="user_address" value="<?php echo  $row['DiaChi'] ?>"></input>
                </div>
              </div>
            </div>

            <!-- button -->
            <div class="account-profile-actions">
              <button class="account-profile-cancel"><a style="color: #db4444 ; text-decoration: none;" href="<?php echo  $url; ?>" class="nav-item">Thoát</a></button>
              <input id="btn-user-info-form" type="submit" class="account-profile-save user-infor" value="Cập nhật"></input>
            </div>
          </form>

          <form action="<?php echo $url . '/account_controller' ?>" method="POST" id="account_form_2" class="account-profile-section" onsubmit="return validateForm_account()">
            <h1 class="account-profile-title">Thông tin tài khoản</h1>
            <input type="hidden" id="action" name="action" value="update_account_info">
            <input type="hidden" id="user_id" name="user_id" value="<?php echo  $row['MaTK'] ?>">
            <?php
            if (isset($_SESSION['error'])) {
              echo '<label class="account-profile-name-label">' . $_SESSION['error'] . '</label>';
              unset($_SESSION['error']); // Xóa thông báo lỗi sau khi đã hiển thị
            }
            ?>
            <div class="info_account">
            <div class="info_account_1">
              <div class="account-profile-contact-item">
              <label class="account-profile-name-label">Tên đăng nhập</label>
              <input type="text" class="account-profile-input" placeholder="User name" id="username" name="username" value="<?php echo  $row['TenTK'] ?>"></input>
              </div>
              <div class="account-profile-contact-item">
              <label class="account-profile-name-label">Email</label>
              <input type="text" class="account-profile-input" placeholder="Email" id="email" name="email" value="<?php echo  $row['Email'] ?>"></input>
              </div>
              
            </div>
            <div class="info_account_2">
              <div class="account-profile-contact-item">
              <label class="account-profile-name-label">Mật khẩu</label>
              <input type="password" class="account-profile-input" placeholder="Password" id="password" name="password" value="<?php echo  $row['MatKhau'] ?>"></input>
              </div>
              <div class="account-profile-contact-item">
              <label class="account-profile-name-label">Nhập mật khẩu mới</label>
              <input type="password" class="account-profile-input" placeholder="New Password" id="newpassword" name="newpassword"></input>
              </div>
              <div class="account-profile-contact-item">
              <label class="account-profile-name-label">Xác nhận mật khẩu mới</label>
              <input type="password" class="account-profile-input" placeholder="Confirm New Password" id="cf_password" name="cf_password"></input>
              <label for=""><input type="checkbox" class="show-password"> Hiển thị mật khẩu</input></label>

            </div>
              
            </div>
            </div>
            <div class="account-profile-actions">
              <button class="account-profile-cancel"><a style="color: #db4444 ; text-decoration: none;" href="<?php echo  $url; ?>" class="nav-item">Thoát</a></button>
              <input id="btn-account-form" type="submit" class="account-profile-save user-infor" value="Cập nhật"></input>
              </div>
          </form>

        </section>
      </div>
      
    </div>
  </div>

  <!-- Thông báo -->
<?php require_once('./public/template/admin/toast.php');
toast::memo("Success", "back_from_controller", "limegreen");
?>
  <script>
        
    document.addEventListener('DOMContentLoaded', function() {
      var passwordInput = document.getElementById('password');
      var newpassword = document.getElementById('newpassword');
      var Confirmpassword = document.getElementById('cf_password');
      var showPasswordCheckbox = document.querySelector('.show-password');
      showPasswordCheckbox.addEventListener('change', function() {
        if (this.checked) {
          passwordInput.type = 'text';
          newpassword.type = 'text';
          Confirmpassword.type = 'text';
        } else {
          passwordInput.type = 'password';
          newpassword.type = 'password';
          Confirmpassword.type = 'password';
        }
      });
    });

    function validateForm_user() {
      var userName = document.getElementById("user_name").value;
      var userPhone = document.getElementById("user_phone").value;
      var userAddress = document.getElementById("user_address").value;

      var nameRegex = /^[\p{L} ]*$/u; // Chỉ chấp nhận ký tự chữ và khoảng trắng
      var phoneRegex = /^\d{10}$/; // Chỉ chấp nhận ký tự số
      var addressRegex = /^[\p{L}0-9\s\/]*$/u; // Chấp nhận ký tự chữ, số và dấu /

      if (!nameRegex.test(userName)) {
        alert("Tên không được chứa ký tự đặc biệt!");
        return false;
      }

      if (!phoneRegex.test(userPhone)) {
        alert("Số điện thoại chỉ được chứa số và đủ 10 số!");
        return false;
      }

      if (!addressRegex.test(userAddress)) {
        alert("Địa chỉ không được chứa ký tự đặc biệt, chỉ cho phép / !");
        return false;
      }
    }

    function validateForm_account() {
      var username = document.getElementById("username").value;
      var email = document.getElementById("email").value;

      var usernameRegex = /^[a-zA-Z0-9]*$/; // Chỉ chấp nhận ký tự chữ và số
      var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; // Định dạng email
      if (!usernameRegex.test(username)) {
        alert("Tên tài khoản không được chứa ký tự đặc biệt và khoảng trắng!");
        return false;
      }

      if (!emailRegex.test(email)) {
        alert("Email phải có định dạng đúng, ví dụ: example@gmail.com");
        return false;
      }
      return true;
    }
    function showForm(formId) {
    var formToShow = document.getElementById(formId);
    var otherFormId = (formId === 'account_form') ? 'account_form_2' : 'account_form';
    var otherForm = document.getElementById(otherFormId);
    
    var userInforLink = document.getElementById('user_information');
    var accountInforLink = document.getElementById('account_information');

    formToShow.style.display = 'block';
    otherForm.style.display = 'none';
    
    // Thêm lớp 'active' cho liên kết được chọn và loại bỏ lớp 'active' cho liên kết khác
    if (formId === 'account_form') {
        userInforLink.classList.add('active');
        accountInforLink.classList.remove('active');
    } else {
        userInforLink.classList.remove('active');
        accountInforLink.classList.add('active');
    }
}
</script>