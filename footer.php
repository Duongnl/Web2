
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </head>

  <body>
    <section class="newsletter-section">
        <div class="newsletter-container">
          <div class="newsletter-content">
            <h2 class="newsletter-title">Exclusive</h2>
            <p class="newsletter-offer">Subscribe </p>
            <p class="newsletter-offer" id ="small"> Get 10% off your first order</p>
            <form class="email-input-container">
              <input type="email" id="emailInput" class="email-input" placeholder="Enter your email" style="color:white" />
              <a href="#" > <ion-icon name="mail-unread-outline"></ion-icon> </ion-icon> </a>
              
            </form>
          </div>
          <div class="support-content">
            <h2 class="support-title">Support</h2>
            <address id ="small" class="support-address">HCM, HCM, HCM, VietNam.</address>
            <a id ="small" href="DivineThift@gmail.com" class="support-email">DivineThift@gmail.com</a>
            <a id ="small" href="tel:0888888888" class="support-phone">0888888888</a>
          </div>
          <nav class="account-navigation">
            <h2  class="account-title">Account</h2>
            <a id ="small" href="#" class="account-links">My Account</a>
            <a id ="small" href="#" class="account-links">Login / Register</a>
            <a id ="small" href="#" class="account-links">Cart</a>
            <a id ="small" href="#" class="account-links">Wishlist</a>
            <a id ="small" href="#" class="account-links">Shop</a>
          </nav>
          <nav class="quick-links">
            <h2 class="links-title">Quick Link</h2>
            <a id ="small" href="#" class="quick-link-item">Privacy Policy</a>
            <a id ="small" href="#" class="quick-link-item">Terms Of Use</a>
            <a id ="small" href="#" class="quick-link-item">FAQ</a>
            <a id ="small" href="#" class="quick-link-item">Contact</a>
          </nav>
          <div class="app-download">
            <h2 class="download-app-text">Download App</h2>
            <p id ="small" class="download-app-offer">Save $3 with App New User Only</p>
            <div class="appIconsWrapper">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/5440fda2301de4db42cb3b78ea9e454c8a6e45def7b4a78502c73f2e432adfbb?apiKey=de754edacf6d4fbeaf990b709fcfe0b5&" alt="Main App Icon" class="mainAppIcon" />
                <div class="secondaryAppIcons">
                  <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/df59572eb8c812f019934d33ba52be08e637c623b1c2c4343e086e5a6869b3c4?apiKey=de754edacf6d4fbeaf990b709fcfe0b5&" alt="Secondary App Icon 1" class="secondaryAppIcon" />
                  <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/f5c8569b4d912f2f0d95c365e51f1f979a971234e5fa2a900f3797efb56a7b34?apiKey=de754edacf6d4fbeaf990b709fcfe0b5&" alt="Secondary App Icon 2" class="secondaryAppIcon" />
                </div>
              </div>
            <div class="social-media-container">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/30ef1881c8ba382ad841b10dec22c4728e1ac56594cd8fd1b8fc54e4c0c91052?apiKey=de754edacf6d4fbeaf990b709fcfe0b5&" alt="" />
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/299d8c8dd55a041f11e42c5997f8f5724c1f20a83cc35e4cc7bdd140f8fd83e0?apiKey=de754edacf6d4fbeaf990b709fcfe0b5&" alt="" />
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/d0b67f52bb53b8c3b436cfc50867157e647c1cc5fa6f7cc373ba309b35f3d286?apiKey=de754edacf6d4fbeaf990b709fcfe0b5&" alt="" />
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/017f03fd6271e23e94e189db8506f53ec67e53623ecac07e20b0cc0e64aa481c?apiKey=de754edacf6d4fbeaf990b709fcfe0b5&" alt="" />
            </div>
          </div>
        </div>
      </section>
    
    
    
  </body>
  </html>

  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

  <style>
    *{
        margin : 0;
        padding : 0;
        box-sizing: border-box;
        font-family: 'poppins',sans-serif;
    }
    .newsletter-section {
      justify-content: flex-end;
      background-color: #000;
      display: flex;
      margin-top: 32px;
      width: 100%;
      flex-direction: column;
      padding: 80px 0 80px;
    }
  
    .newsletter-container {
      justify-content: space-between;
      align-items: start;
      align-self: center;
      display: flex;
      width: 100%;
      max-width: 1170px;
      gap: 30px;
      padding: 0 20px;
    }
  
    .newsletter-content,
    .support-content,
    .account-navigation,
    .quick-links,
    .app-download {
      display: flex;
      flex-direction: column;
      font-size: 16px;
      color: #fafafa;
      font-weight: 400;
      line-height: 150%;
      flex-grow: 1;
      flex-basis: 0%;
      padding: 2px 0;
    }
  
    .newsletter-title,
    .support-title,
    .account-title,
    .links-title,
    .download-app-text {
      font: 700 24px/100% Inter, sans-serif;
      margin-bottom: 27px;
    }
  
    .newsletter-offer,
    .support-address,
    .support-email,
    .support-phone,
    .account-links,
    .quick-link-item,
    .download-app-offer {
      font-family: Poppins, sans-serif;
      margin-bottom: 16px;
      text-decoration: none;
      color: white;
      font-weight: 600;

    }
  
    .email-input-container {
      border-radius: 4px;
      border: 1px solid rgba(250, 250, 250, 1);
      display: flex;
      margin-top: 16px;
      justify-content: space-between;
      gap: 10px;
    }
    .email-input-container a ion-icon {
      color:white;
      display:flex;
      text-align:center;
      font-size:38px;

    }
    .social-media-container {
      display: flex;
      margin-top: 24px;
      padding-right: 30px;
      justify-content: space-between;
      gap: 20px;
    }
  
    .footer {
      align-items: center;
      display: flex;
      margin-top: 60px;
      width: 100%;
      flex-direction: column;
      font-size: 16px;
      color: #fff;
      font-weight: 400;
      line-height: 150%;
      padding: 16px 60px 0;
    }
  
    @media (max-width: 991px) {
      .newsletter-section,
      .newsletter-container,
      .email-input-container,
      .social-media-container,
      .footer {
        max-width: 100%;
        flex-wrap: wrap;
        padding-right: 20px;
      }
  
      .newsletter-title,
      .support-title,
      .account-title,
      .links-title,
      .download-app-text,
      .newsletter-offer,
      .support-address,
      .support-email,
      .support-phone,
      .account-links,
      .quick-link-item,
      .download-app-offer {
        white-space: initial;
        
      }
    }
    .email-input-label {
      font-family: Poppins, sans-serif;
      flex-grow: 1;
      visibility: hidden;
    }
    .appDownloadSection {
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }
  
    .downloadPrompt {
      color: #fafafa;
      font: 500 20px/1.4 Poppins, sans-serif;
    }
  
    .saveOffer {
      color: #fafafa;
      margin-top: 24px;
      font: 500 12px/1.5 Poppins, sans-serif;
    }
  
    .appIconsWrapper {
      display: flex;
      margin-top: 8px;
      gap: 8px;
    }
  
    .mainAppIcon {
      aspect-ratio: 1;
      object-fit: cover;
      width: 80px;
      margin: auto 0;
    }
  
    .secondaryAppIcons {
      display: flex;
      flex-direction: column;
      align-items: center;
      flex-grow: 1;
    }
  
    .secondaryAppIcon {
      aspect-ratio: 2.78;
      object-fit: cover;
      width: 110px;
      margin-top: 4px;
    }
  
    .socialMediaIcons {
      display: flex;
      margin-top: 24px;
      padding-right: 30px;
      justify-content: space-between;
      gap: 20px;
    }
    
  
    .socialMediaIcon {
      aspect-ratio: 1;
      object-fit: cover;
      width: 24px;
    }
  
    @media (max-width: 991px) {
      .saveOffer {
        white-space: initial;
      }
  
      .socialMediaIcons {
        padding-right: 20px;
      }
    }
    

  .email-input {
    font-family: Poppins, sans-serif;
    flex-grow: 1;
    background:none;
    border:none;
    font-weight: 600;
    padding: 12px 16px;
    width:80%;
  }

  .email-icon {
    aspect-ratio: 1;
    object-fit: cover;
    object-position: center;
    width: 24px;
  }

  .visually-hidden {
    position: absolute;
    width: 1px;
    height: 1px;
    margin: -1px;
    padding: 0;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    border: 0;
  }
  #small{
    font-size: 14px;
    font-weight: 200;

  }
  </style>

  