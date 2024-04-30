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
        <div class="account-profile-section">
          <h1 class="account-profile-title">Edit Your Profile</h1>
          <div class="account-profile-name">
            <div class="account-profile-name-item">
              <label class="account-profile-name-label">First Name</label>
              <input type="text" class="account-profile-name-value" placeholder="Md" aria-label="Md"></input>
            </div>
            <div class="account-profile-name-item">
              <label class="account-profile-name-label">Last Name</label>
              <input type="text" class="account-profile-name-value" placeholder="Rimel" aria-label="Rimel"></input>
            </div>
          </div>
          <div class="account-profile-contact">
            <div class="account-profile-contact-item">
              <label class="account-profile-contact-label">Email</label>
              <input type="text" class="account-profile-contact-value" placeholder="rimel1111@gmail.com"
                aria-label="rimel1111@gmail.com"></input>
            </div>
            <div class="account-profile-contact-item">
              <label class="account-profile-contact-label">Address</label>
              <input type="text" class="account-profile-contact-value" placeholder="Kingston, 5236, US"
                aria-label="Kingston, 5236, US"></input>
            </div>
          </div>
          <h4 class="account-profile-password-title">Password Changes</h4>
          <input type="text" class="account-profile-password-input" placeholder="Current Passwod"
            aria-label="Current Passwod"></input>
          <input type="text" class="account-profile-password-input" placeholder="New Passwod"
            aria-label="New Passwod"></input>
          <input type="text" class="account-profile-password-input" placeholder="Confirm New Passwod"
            aria-label="Confirm New Passwod"></input>
          <div class="account-profile-actions">
            <button class="account-profile-cancel">Cancel</button>
            <button class="account-profile-save">Save Changes</button>
            <a href="<?php  echo  $url.'/cart-detail' ?>" style="text-decoration: none;" class="account-profile-save">See Details Order</a href="">
          </div>
        </div>
      </section>
    </div>
  </div>
</div>