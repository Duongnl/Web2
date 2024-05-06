<?php
$url = handle_url::getUrl();
?>


<div class="account">
  <div class="container ctn-account">
    <div class="nav">
      <h4><a style="color: #db4444 ;" href="<?php echo  $url; ?>" class="nav-item">Home </a>/My Account</h4>
    </div>
  </div>
  <div class="account-management">
    <div class="account-management-container">
      <section class="account-main-content">

        <?php $maTK = 2;
        $model = new account_model();
        $boolean = $model->checkTaiKhoan($maTK);
        if ($boolean == 1) {
          $query = $model->getTaiKhoanKhachHang($maTK);
        } else {
          $query = $model->getTaiKhoanNhanVien($maTK);
        }
        $row = mysqli_fetch_array($query);
        ?>

        <form action="../site/controller/account_controller.php" method="POST" id="account_form" class="account-profile-section">
          <input type="hidden" id="action" name="action" value="">
          <h1 class="account-profile-title">User information</h1>
          <input type="hidden" id="user_id" name="user_id" value="">

            <!-- input user name -->
            <div class="account-profile-name-item">
              <label class="account-profile-name-label">User Name</label>
              <input type="text" class="account-profile-name-value" id="user_name" name="user_name" value="<?php echo  $row['HoTen'] ?>"></input>
            </div>

            <!-- input phone -->
            <div class="account-profile-name-item">
              <label class="account-profile-name-label">Phone Number</label>
              <input type="text" class="account-profile-name-value" id="user_phone" name="user_phone" value="<?php echo  $row['SDT'] ?>"></input>
            </div>
            <!-- date  -->
            <div class="account-profile-contact-item">
              <label class="account-profile-contact-label">Date</label>
              <input type="date" class="account-profile-contact-value" id="user_date" name="user_date" value="<?php echo  $row['ThoiGian'] ?>" disabled></input>
            </div>
            <!-- quyen -->
            <div class="account-profile-contact-item">
              <label class="account-profile-contact-label">Permission</label>
              <input type="text" class="account-profile-contact-value" id="user_permission" name="user_permission" value="<?php echo  $row['TenQuyen'] ?>" disabled></input>
            </div>
            <!-- dia chi -->
            <div class="account-profile-contact-item">
              <label class="account-profile-contact-label">Address</label>
              <input type="text" class="account-profile-contact-value" id="user_address" name="user_address" value="<?php echo  $row['DiaChi'] ?>"></input>
            </div>
          
          <!-- button -->
          <div class="account-profile-actions">
            <button class="account-profile-cancel"><a style="color: #db4444 ; text-decoration: none;" href="<?php echo  $url; ?>" class="nav-item">Cancel</a></button>
            <input id="btn-user-info-form" type="submit" class="account-profile-save user-infor" value=""></input>
          </div>
        </form>

        <form action="" method="POST" id="account_form_2" class="account-profile-section">
          <h1 class="account-profile-title">Account information</h1>
          <label class="account-profile-name-label">User Name</label>
          <input type="text" class="account-profile-input" placeholder="User name" id="username" name="username" value="<?php echo  $row['TenTK'] ?>"></input>
          <label class="account-profile-name-label">Email</label>
          <input type="text" class="account-profile-input" placeholder="Email" id="email" name="email" value="<?php echo  $row['Email'] ?>"></input>
          <label class="account-profile-name-label">Password</label>
          <input type="password" class="account-profile-input" placeholder="Password" id="password" name="password" value="<?php echo  $row['MatKhau'] ?>"></input>
          <label class="account-profile-name-label">New Password</label>
          <input type="password" class="account-profile-input" placeholder="New Password" id="newpassword" name="newpassword"></input>
          <label class="account-profile-name-label">Confirm New Password</label>
          <input type="password" class="account-profile-input" placeholder="Confirm New Password" id="cf_password" name="cf_password"></input>
          <label for=""><input type="checkbox" class="show-password"> Show password</input></label>
          <div class="account-profile-actions">
            <button class="account-profile-cancel"><a style="color: #db4444 ; text-decoration: none;" href="<?php echo  $url; ?>" class="nav-item">Cancel</a></button>
            <input id="btn-account-form" type="submit" class="account-profile-save user-infor" value=""></input>
            
          </div>
        </form>

      </section>
    </div>
    <a href="<?php echo  $url . '/cart-detail' ?>" style="text-decoration: none;" class="view-details-order">View Details Order</a href="">
  </div>
</div>
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
</script>