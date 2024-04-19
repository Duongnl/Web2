<?php 
  if (isset($_SESSION['origin_path'])) {
    $origin_path = $_SESSION['origin_path'];
}
?>
<div class="announcement-container">
   <!-- <div class="announcement-inner"> -->
   <div class="sale-message">
     <p class="sale-text">Summer Sale For All Swim Suits And Free Express Delivery - OFF 50%!</p>
     <div tabindex="0" role="button" class="shop-now">Shop Now</div>
   </div>
   <!-- <div class="language-selector">
        <div class="language-text">English</div>
        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/8c458026ddcb4daaaca9291897ab1b8ab8e65bd1233e48db8bbc95eb90ee3e16?apiKey=de754edacf6d4fbeaf990b709fcfe0b5&" alt="Country flag" class="country-flag" loading="lazy"/>
      </div> -->
   <!-- </div> -->
 </div>

 <header class="header">
   <!-- <nav class="navigation-container"> -->
   <div class="header-mobile">
     <i class="nav-bar-mobile fa-solid fa-bars p-2" style="font-size:28px"></i>
     <i class="search-mobile fa-solid fa-magnifying-glass p-2 fs20"></i>
   </div>
   <ul class="menu-mobile">
     <li><a href="<?php  echo $origin_path.'' ?>">Home</a></li>
     <li><a href="<?php echo $origin_path.'product'?>">Product</a></li>
     <li><a href="<?php echo ""; echo ($baseName != 'about') ? $request . 'about' : $request; ?>">About</a></li>
   </ul>
   <div class="logo">Exclusive</div>
   <div class="menu">
     <a href="<?php  echo $origin_path.''?>" class="home">Home</a>
     <a href="<?php echo $origin_path.'product'?>" class="about">Product</a>
     <a href="<?php echo $origin_path.'about' ?>" class="about">About</a>
     <!-- <a href="/store/Web2-main/Web2-main/site/view/login-register-page.php" class="sign-up">Sign Up</a> -->
   </div>
   <div class="rightNav">
     <div class="searching">
       <input type="text" id="input-search" class="inputsearch" placeholder="What are you looking for?"
         aria-label="What are you looking for?" style="width: 215px;" />
       <a href="/" class="iconsearch">
         <i class="fa-solid fa-magnifying-glass fs20"></i>
       </a>
       <i class="close-search-mobile-tablet fa-solid fa-x fs20 p-2"></i>
     </div>
     <div class="fav-shop">
       <i class="search-tablet fa-solid fa-magnifying-glass fs20 p-2"></i>
       <a href="<?php  echo $origin_path.'cart';?>">
         <i class="fa-solid fa-cart-plus fs20 p-2"></i>
       </a>
       <a href="<?php  echo $origin_path.'login';?>">
         <i href="" class="fa-solid fa-user fs20 p-2"></i>
       </a>
     </div>
   </div>
   </div>
   <!-- </nav> -->

   <!-- nav hidden -->
   <!-- <div class="container ctn-hidden">
      <div class="row">
        <nav class="navbar navbar-light bg-dark" style="background-color:white !important;">
          <div class="container-fluid ctn-header-fluid">
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
    </div> -->



 </header>
 <script src="./public/js/header.js"></script>