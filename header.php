<style>
  *{
    margin : 0;
    padding : 0;
    box-sizing: border-box;
    font-family: 'poppins',sans-serif;
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
  
  .menu a {
    text-decoration: none;
    color: black;
  }
  .inputsearch{
    font-family: Poppins, sans-serif;
    flex-grow: 1;
    background:#F5F5F5;
    border:none;
  }
  .icon-search{
    aspect-ratio: 1;
    object-fit: cover;
    object-position: center;
    width: 24px;
  }
  .rightnav{
    display:flex;
    height: 100%;
    justify-content: center;
  }
  .searching{
    display: flex;
    flex-direction: row;
    background-color: #f5f5f5;
    padding:10px 20px;
  }
  .rightNav
    {
      display: flex;
    flex-direction: row;
    }
  .iconsearch{
    display: flex;
    align-items: center;
    text-decoration: none;
    margin-left:10px;
  }
  .fav-shop{
    display:flex;
    align-items: center;
  }
  .fs20{
    font-size: 20px;
  }
  .pdrl20
  {
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
  
  
  .announcement-inner {
    display: flex;
    margin-right: 76px;
    width: 859px;
    max-width: 100%;
    justify-content: space-between;
    gap: 20px;
  }
  
  @media (max-width: 991px) {
    .announcement-inner {
      margin-right: 10px;
      flex-wrap: wrap;
    }
    .announcement-container {
      max-width: 100%;
      padding: 0 20px;
    }
    .sale-message {
      flex-wrap: wrap;
    }
    .navigation-container,
    .menu ,
    .rightNav{
      max-width: 100%;
      flex-wrap: wrap;
    }
    .logo {
      white-space: initial;
    }
    .language-selector {
      white-space: initial;
    }
    .searching{
        padding:0;
      }
    .rightNav
       {
        height:30px;
        padding: 3px 20px;
      }
      .sale-text {
      max-width: 100%;
    }
  }
  
  
  .sale-message {
    display: flex;
    gap: 8px;
  }
  
  
  
  .sale-text {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    line-height: 150%;
    flex-grow: 1;
    flex-basis: auto;
    margin: auto 0;
  }
  
 
  
  .shop-now {
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    line-height: 24px;
    text-decoration: underline;
    cursor: pointer;
  }
  
  .language-selector {
    justify-content: center;
    display: flex;
    gap: 5px;
    font-weight: 400;
    white-space: nowrap;
    line-height: 150%;
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
</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
  <div class="announcement-container">
    <div class="announcement-inner">
      <div class="sale-message">
        <p class="sale-text">Summer Sale For All Swim Suits And Free Express Delivery - OFF 50%!</p>
        <div tabindex="0" role="button" class="shop-now">Shop Now</div>
      </div>
      <div class="language-selector">
        <div class="language-text">English</div>
        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/8c458026ddcb4daaaca9291897ab1b8ab8e65bd1233e48db8bbc95eb90ee3e16?apiKey=de754edacf6d4fbeaf990b709fcfe0b5&" alt="Country flag" class="country-flag" loading="lazy"/>
      </div>
    </div>
  </div>



<header class="header">
  <nav class="navigation-container">
    <div class="logo">Exclusive</div>
    <div class="menu">
      <a href="/" class="home">Home</a>
      <a href="/contact" class="contact">Contact</a>
      <a href="/about" class="about">About</a>
      <a href="/signup" class="sign-up">Sign Up</a>
    </div>
    <div class="rightNav">
      <div class="searching">
      <input type="email" id="input-search" class="inputsearch" placeholder="What are you looking for?" aria-label="What are you looking for?" />
        <a href="/" class="iconsearch"> 
          <i class="fa-solid fa-magnifying-glass fs20" style="color: #000;"></i>
        </a>
      </div>
        <div class="fav-shop">
           <i class="fa-solid fa-cart-plus fs20 pdrl20 "></i>
          <i class="fa-solid fa-user fs20 "></i> 
        </div>
      </div>
    </div>
  </nav>

</header>

</body>
</html>



