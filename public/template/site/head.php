<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'poppins', sans-serif;
}

.navigation-container {
  display: flex;
  justify-content: space-between;
  gap: 20px;
  margin-top: 30px;
  width: 100%;
  max-width: 1170px;
  align-items: center;
}

.logo {
  font: 700 24px/100% Inter, sans-serif;
  padding: 3px 20px;
}

.menu {
  display: flex;
  justify-content: space-between;
  gap: 20px;
  font-size: 16px;
  font-weight: 400;
  text-align: center;
  line-height: 150%;
  padding: 0 20px;
  font-family: Poppins, sans-serif;
}

.header {
  display: flex;
  justify-content: space-around;
  gap: 20px;
}

.query-input {
  border-radius: 4px;
  background-color: #f5f5f5;
  display: flex;
  flex-direction: column;
  font-size: 12px;
  color: #000;
  font-weight: 400;
  line-height: 150%;
  flex-grow: 1;
  flex-basis: 0%;
  padding: 7px 20px;
  margin: auto 0;
}

.image-gallery {
  display: flex;
  justify-content: center;
  gap: 16px;
  margin: auto 0;
}

.image {
  aspect-ratio: 1;
  object-fit: cover;
  object-position: center;
  width: 24px;
}

.image-large {
  aspect-ratio: 1;
  object-fit: cover;
  object-position: center;
  width: 32px;
}

@media (max-width:991px) {

  .navigation-container,
  .menu {
    max-width: 100%;
    flex-wrap: wrap;
  }

  .logo {
    white-space: initial;
  }
}

.menu a {
  text-decoration: none;
  color: black;
}

.inputsearch {
  font-family: Poppins, sans-serif;
  flex-grow: 1;
  background: #F5F5F5;
  border: none;
  outline: none;

}

.icon-search {
  aspect-ratio: 1;
  object-fit: cover;
  object-position: center;
  width: 24px;
}

.rightnav {
  display: flex;
  height: 100%;
  justify-content: center;
}

.searching {
  display: flex;
  flex-direction: row;
  background-color: #f5f5f5;
  padding: 10px 20px;
}

.rightNav {
  display: flex;
  flex-direction: row;
}

.iconsearch {
  display: flex;
  align-items: center;
  text-decoration: none;
  margin-left: 10px;
}

.fav-shop {
  display: flex;
  align-items: center;
}

.fs20 {
  font-size: 20px;
}

.pdrl20 {
  padding: 0 30px;
}

.announcement-container {
  justify-content: center;
  align-items: center;
  background-color: #000;
  display: flex;
  width: 100%;
  flex-direction: column;
  font-size: 14px;
  color: #fafafa;
  padding: 12px 60px;
}

@media (max-width: 991px) {
  .announcement-container {
    max-width: 100%;
    padding: 0 20px;
  }
}

.announcement-inner {
  display: flex;
  /* margin-right: 76px; */
  width: 859px;
  max-width: 100%;
  /* justify-content: space-between; */
  gap: 20px;
  justify-content: center;
}

@media (max-width: 991px) {
  .announcement-inner {
    margin-right: 10px;
    flex-wrap: wrap;
  }
}

.sale-message {
  display: flex;
  gap: 8px;
}

@media (max-width: 991px) {
  .sale-message {
    flex-wrap: wrap;
  }
}

.sale-text {
  font-family: 'Poppins', sans-serif;
  font-weight: 400;
  line-height: 150%;
  flex-grow: 1;
  flex-basis: auto;
  margin: auto 0;
}

@media (max-width: 991px) {
  .sale-text {
    max-width: 100%;
  }
}

.shop-now {
  text-align: center;
  font-family: 'Poppins', sans-serif;
  font-weight: 600;
  line-height: 24px;
  cursor: pointer;
  text-decoration: none;
  cursor: pointer;
  border: 1px solid #fff;
  padding: 5px 10px;
}

.language-selector {
  justify-content: center;
  display: flex;
  gap: 5px;
  font-weight: 400;
  white-space: nowrap;
  line-height: 150%;
}

@media (max-width: 991px) {
  .language-selector {
    white-space: initial;
  }
}

.language-text {
  font-family: 'Poppins', sans-serif;
  flex-grow: 1;
}

.country-flag {
  aspect-ratio: 1;
  object-fit: contain;
  width: 24px;
}

.a-hidden {
  display: block;
  /* Đảm bảo phần tử a hiển thị dạng block để có thể chỉnh kích thước và margin */
  text-decoration: none;
  color: black;
  padding: 10px;
  width: 100%;
  border-bottom: 1px solid black;
  border-radius: 5px;
}

/* 884 */
.ctn-hidden {
  display: none;
}

.header {
  border-bottom: 1px solid black;
}

@media (max-width: 904px) {
  .navigation-container {
    display: none;
  }

  .ctn-hidden {
    display: block;
  }

  .header {
    border-bottom: 0px;
  }

}
</style>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="announcement-container">
    <div class="announcement-inner">
      <div class="sale-message">
        <p class="sale-text">Summer Sale For All Swim Suits And Free Express Delivery - OFF 50%!</p>
        <div tabindex="0" role="button" class="shop-now">Shop Now</div>
      </div>
      <!-- <div class="language-selector">
        <div class="language-text">English</div>
        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/8c458026ddcb4daaaca9291897ab1b8ab8e65bd1233e48db8bbc95eb90ee3e16?apiKey=de754edacf6d4fbeaf990b709fcfe0b5&" alt="Country flag" class="country-flag" loading="lazy"/>
      </div> -->
    </div>
  </div>



  <header class="header">
    <nav class="navigation-container" style="margin-bottom: 10px">
      <div class="logo">Exclusive</div>
      <div class="menu">
        <a href="/store/Web2-main/Web2-main/indx.php" class="home">Home</a>
        <a href="/contact" class="contact">Product</a>
        <a href="/about" class="about">About</a>
        <a href="/store/Web2-main/Web2-main/site/view/login-register-page.php" class="sign-up">Sign Up</a>
      </div>
      <div class="rightNav">
        <div class="searching">
          <input type="email" id="input-search" class="inputsearch" placeholder="What are you looking for?"
            aria-label="What are you looking for?" style="width: 205px;" />
          <a href="/" class="iconsearch">
            <i class="fa-solid fa-magnifying-glass fs20" style="color: #000;"></i>
          </a>
        </div>
        <div class="fav-shop">
          <i class="fa-solid fa-cart-plus fs20 pdrl20 "></i>
          <i class="fa-solid fa-user fs20 " style="margin-right: 20px;"></i>
        </div>
      </div>
      </div>
    </nav>

    <!-- nav hidden -->
    <div class="container ctn-hidden">
      <div class="row">
        <nav class="navbar navbar-light bg-dark" style="background-color:white !important;">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
              aria-expanded="false" aria-label="Toggle navigation" style="border: 1px solid black; width : 100% ">
              <span class="navbar-toggler-icon" style="color: black; float:left;"></span>
            </button>
          </div>
        </nav>
        <div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark" style="padding-top: 10px;">
          <div class="bg-light p-4" style="border: 1px solid black; box-shadow: 0 20px 40px -17px rgba(0, 0, 0, 0.5);">

            <a class="a-hidden" style="padding-top: 0px;" href="/" class="home">Home</a>
            <a class="a-hidden" href="/contact" class="contact">Product</a>
            <a class="a-hidden" href="/about" class="about">About</a>
            <a class="a-hidden" href="/signup" class="sign-up">Sign Up</a>
          </div>

        </div>
      </div>
    </div>



  </header>
  <!-- <script type="text/javascript" src="../../system/library/popper.min.js"></script> -->
  <!-- <script type="text/javascript" src="../../system/library/bootstrap.js" ></script> -->
</body>

</html>


<!-- helooo ae -->