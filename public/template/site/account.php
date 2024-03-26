<style>
  *{
    margin : 0;
    padding : 0;
    box-sizing: border-box;
    font-family: 'poppins',sans-serif;

}
  .account-management {
    align-self: center;
    margin-top: 10%;
    width: 100%;
  }

  @media (max-width: 991px) {
    .account-management {
      max-width: 100%;
      margin-top: 40px;
    }
  }

  .account-management-container {
    display: flex;
    gap: 20px;
  }

  @media (max-width: 991px) {
    .account-management-container {
      flex-direction: column;
      align-items: stretch;
      gap: 0;
    }
  }

  .account-sidebar {
    display: flex;
    flex-direction: column;
    line-height: normal;
    width: 19%;
    margin-left: 0;
  }

  @media (max-width: 991px) {
    .account-sidebar {
      width: 100%;
    }
  }

  .account-sidebar-menu {
    display: flex;
    margin-top: 7px;
    flex-direction: column;
    font-size: 14px;
    color: #000;
    font-weight: 500;
    line-height: 150%;
  }

  @media (max-width: 991px) {
    .account-sidebar-menu {
      margin-top: 40px;
    }
  }

  .account-sidebar-title {
    font-family: Poppins, sans-serif;
    font-weight: 500;
  }

  .account-sidebar-active {
    color: #db4444;
    font-family: Poppins, sans-serif;
  }

  .account-sidebar-item {
    font-family: Poppins, sans-serif;
  }

  .account-sidebar-item-nowrap {
    font-family: Poppins, sans-serif;
    white-space: nowrap;
  }

  @media (max-width: 991px) {
    .account-sidebar-item-nowrap {
      white-space: initial;
    }
  }

  .account-sidebar-subtitle {
    font-family: Poppins, sans-serif;
    font-weight: 500;
  }

  .account-main-content {
    display: flex;
    flex-direction: column;
    line-height: normal;
    width: 81%;
    margin-left: 20px;
  }

  @media (max-width: 991px) {
    .account-main-content {
      width: 100%;
    }
  }

  .account-profile-section {
    border-radius: 4px;
    box-shadow: 0 1px 13px 0 rgba(0, 0, 0, 0.05);
    background-color: #fff;
    display: flex;
    flex-grow: 1;
    flex-direction: column;
    font-size: 16px;
    line-height: 150%;
    width: 100%;
    padding: 43px 80px;
  }

  @media (max-width: 991px) {
    .account-profile-section {
      max-width: 100%;
      margin-top: 40px;
      padding: 0 20px;
    }
  }

  .account-profile-title {
    color: #db4444;
    font: 500 20px/140% Poppins, sans-serif;
  }

  @media (max-width: 991px) {
    .account-profile-title {
      max-width: 100%;
    }
  }

  .account-profile-name {
    display: flex;
    margin-top: 23px;
    justify-content: space-between;
    gap: 20px;
    color: #000;
    font-weight: 400;
  }

  @media (max-width: 991px) {
    .account-profile-name {
      max-width: 100%;
      flex-wrap: wrap;
    }
  }

  .account-profile-name-item {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    flex-basis: 0;
    width: fit-content;
  }

  .account-profile-name-label {
    font-family: Poppins, sans-serif;
  }

  .account-profile-name-value {
    font-family: Poppins, sans-serif;
    border-radius: 4px;
    background-color: #f5f5f5;
    margin-top: 8px;
    justify-content: center;
    align-items: start;
    white-space: nowrap;
    padding: 19px 60px 19px 16px;
    border:none;
  }

  @media (max-width: 991px) {
    .account-profile-name-value {
      padding-right: 20px;
      white-space: initial;
    }
  }

  .account-profile-contact {
    display: flex;
    margin-top: 24px;
    justify-content: space-between;
    gap: 20px;
    color: #000;
    font-weight: 400;
    white-space: nowrap;
  }

  @media (max-width: 991px) {
    .account-profile-contact {
      max-width: 100%;
      flex-wrap: wrap;
      white-space: initial;
    }
  }

  .account-profile-contact-item {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    flex-basis: 0;
    width: fit-content;
  }

  @media (max-width: 991px) {
    .account-profile-contact-item {
      white-space: initial;
    }
  }

  .account-profile-contact-label {
    font-family: Poppins, sans-serif;
  }

  .account-profile-contact-value {
    font-family: Poppins, sans-serif;
    border-radius: 4px;
    background-color: #f5f5f5;
    margin-top: 8px;
    justify-content: center;
    align-items: start;
    padding: 17px 60px 17px 16px;
    border:none;
  }

  @media (max-width: 991px) {
    .account-profile-contact-value {
      padding-right: 20px;
      white-space: initial;
    }
  }

  .account-profile-password-title {
    color: #000;
    font-family: Poppins, sans-serif;
    font-weight: 400;
    margin-top: 24px;
  }

  @media (max-width: 991px) {
    .account-profile-password-title {
      max-width: 100%;
    }
  }

  .account-profile-password-input {
    font-family: Poppins, sans-serif;
    border-radius: 4px;
    background-color: #f5f5f5;
    margin-top: 8px;
    justify-content: center;
    align-items: start;
    color: #000;
    font-weight: 400;
    white-space: nowrap;
    padding: 19px 60px 19px 16px;
    border: none;
  }

  @media (max-width: 991px) {
    .account-profile-password-input {
      white-space: initial;
      max-width: 100%;
      padding-right: 20px;
    }
  }

  .account-profile-actions {
    align-self: end;
    display: flex;
    margin-top: 24px;
    justify-content: space-between;
    gap: 20px;
    white-space: nowrap;
  }

  @media (max-width: 991px) {
    .account-profile-actions {
      white-space: initial;
    }
  }

  .account-profile-cancel {
    color: #000;
    font-family: Poppins, sans-serif;
    font-weight: 400;
    margin: auto 0;
  }

  .account-profile-save  {
    font-family: Poppins, sans-serif;
    justify-content: center;
    border-radius: 4px;
    background-color: #db4444;
    color: #fafafa;
    font-weight: 500;
    flex-grow: 1;
    padding: 16px 48px;
    border: none;
  }
  .account-profile-cancel{
    font-family: Poppins, sans-serif;
    justify-content: center;
    border-radius: 4px;
    background-color: #fff;
    color: #000;
    font-weight: 500;
    flex-grow: 1;
    padding: 16px 48px;
    border: none;
  }


  @media (max-width: 991px) {
    .account-profile-save {
      white-space: initial;
      padding: 0 20px;
    }
  }
  .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1168px;
    width: 100%;
    margin: 79px 0;
    gap: 20px;
    font-size: 14px;
    font-weight: 400;
  }

  @media (max-width: 991px) {
    .container {
      flex-wrap: wrap;
      margin-top: 40px;
    }
  }

  .nav {
    display: flex;
    color: #000;
    line-height: 150%;
    flex: 1;
  }

  .nav-item {
    font-family: Poppins, sans-serif;
  }

  .welcome-message {
    color: #db4444;
    font-family: Poppins, sans-serif;
    line-height: 21px;
    margin: auto 0;
  }

  .highlight {
    color: #db4444;
  }
  .nav a{
    text-decoration: none;
    color:black;
  }
  .account{
    width:80%;
    margin:auto;
  }
  .account-sidebar a {
    text-decoration: none;
    color:#000;
    opacity:0.5;
  }
  .manage-account{
    padding: 10px 30px;
    display:flex;
    flex-direction: column;
  }
  .myorder{
    padding: 10px 30px;
    display:flex;
    flex-direction: column;
  }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <title>Document</title>
</head>
<body>
  <div class="account">
  <div class="container"  style=" margin-bottom: 40px; margin-top: 20px;">
    <div class="nav">
      <a href="#" class="nav-item">Home/</a>
      <a href="#" class="nav-item">My Account</a>
    </div>
    <div class="welcome-message">
      Welcome! <span class="highlight">Md Rimel</span>
    </div>
  </div>
<div class="account-management" style="margin-top: 0px;" >
  <div class="account-management-container">
    <aside class="account-sidebar">
      <nav class="account-sidebar-menu">
        <h3 class="account-sidebar-title">Manage My Account</h3>
      <div class="manage-account">
        <a href="#" class="account-sidebar-active">My Profile</a>
        <a href="#" class="account-sidebar-item">Address Book</a>
        <a href="#" class="account-sidebar-item-nowrap">My Payment Options</a>
      </div>
        <h3 class="account-sidebar-subtitle">My Orders</h3>
      <div class="myorder">
        <a href="#" class="account-sidebar-item">My Returns</a>
        <a href="#" class="account-sidebar-item-nowrap">My Cancellations</a>
      </div>
        <h3 class="account-sidebar-subtitle">My WishList</h3>
      </nav>
    </aside>
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
            <input type="text" class="account-profile-contact-value" placeholder="rimel1111@gmail.com" aria-label="rimel1111@gmail.com"></input>
          </div>
          <div class="account-profile-contact-item">
            <label class="account-profile-contact-label">Address</label>
            <input type="text" class="account-profile-contact-value" placeholder="Kingston, 5236, US" aria-label="Kingston, 5236, US"></input>
          </div>
        </div>
        <h4 class="account-profile-password-title">Password Changes</h4>
        <input type="text" class="account-profile-password-input"  placeholder="Current Passwod" aria-label="Current Passwod" ></input>
        <input type="text" class="account-profile-password-input"  placeholder="New Passwod" aria-label="New Passwod"></input>
        <input type="text" class="account-profile-password-input"  placeholder="Confirm New Passwod" aria-label="Confirm New Passwod"></input>
        <div class="account-profile-actions">
          <button class="account-profile-cancel">Cancel</button>
          <button class="account-profile-save">Save Changes</button>
        </div>
      </div>
    </section>
  </div>
</div>
</div>
</body>
</html>




