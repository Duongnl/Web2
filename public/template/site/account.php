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
        <form action="../site/controller/account_controller.php" method="POST" id="account_form" class="account-profile-section">
          <input type="hidden" id="action" name="action" value="">
          <h1 class="account-profile-title">User information</h1>
          <input type="hidden" id="user_id" name="user_id" value="">
          <div class="account-profile-name">
            <div class="account-profile-name-item">
              <label class="account-profile-name-label">User Name</label>
              <input type="text" class="account-profile-name-value" id="user_name" name="user_name"></input>
            </div>
            <div class="account-profile-name-item">
              <label class="account-profile-name-label">Phone Number</label>
              <input type="text" class="account-profile-name-value" id="user_phone" name="user_phone"></input>
            </div>
          </div>
          <div class="account-profile-contact">
            <div class="account-profile-contact-item">
              <label class="account-profile-contact-label">Date</label>
              <input type="date" class="account-profile-contact-value" id="user_date" name="user_date"></input>
            </div>
            <div class="account-profile-contact-item">
              <label class="account-profile-contact-label">Permission</label>
              <input type="text" class="account-profile-contact-value" id="user_permission" name="user_permission"></input>
            </div>
            <div class="account-profile-contact-item">
              <label class="account-profile-contact-label">Address</label>
              <input type="text" class="account-profile-contact-value" id="user_address" name="user_address"></input>
            </div>
          </div>
          <div class="account-profile-actions">
            <button class="account-profile-cancel">Cancel</button>
            <input id="btn-user-info-form" type="submit" class="account-profile-save user-infor"></input>
          </div>
          <form action="" method="POST" id="account_form_2" class="account-information">
            <h1 class="account-profile-title">Account information</h1>
            <input type="text" class="account-profile-password-input" placeholder="User name" id="username" name="username"></input>
            <input type="text" class="account-profile-password-input" placeholder="Email" id="email" name="email"></input>
            <input type="text" class="account-profile-password-input" placeholder="Password" id="password" name="password"></input>
            <input type="text" class="account-profile-password-input" placeholder="New Password" id="newpassword" name="newpassword"></input>
            <input type="text" class="account-profile-password-input" placeholder="Confirm New Password" id="cf_password" name="cf_password"></input>
            <label for=""><input type="checkbox" class="show-password"> Show password</input></label>
            <div class="account-profile-actions">
              <button class="account-profile-cancel">Cancel</button>
              <input id="btn-account-form" type="submit" class="account-profile-save user-infor"></input>
              <a href="<?php echo  $url . '/cart-detail' ?>" style="text-decoration: none;" class="account-profile-save">See Details Order</a href="">
            </div>
          </form>
        </form>
      </section>
    </div>
  </div>
</div>