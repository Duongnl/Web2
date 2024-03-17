<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./assets/css/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>


.card-img-top {
  transition: All .5s ease-in-out;
}

.wrap-img {
  padding: 40px;
  background-color: #F5F5F5;
  position: relative;

  
}

/* .wrap-img::before {
  content: "-40%";
  position: absolute;
  top: 12px;
  left: 12px;
  width: 55px;
  height: 26px;
  background-color: #DB4444;
  border-radius: 4px;
  padding: 4px 12px;
  gap: 12px;
  color: #fff;
  font-weight: 400;
  display: flex;
  align-items: center;
  justify-content: center;
} */

.card {
  margin-top: 10px;
  border: none;
}

.product {
  text-decoration: none;
}

.product-body {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.product-title {
  text-decoration: none;
  color: #000;
  font-weight: 500;
}

.prices {
  display: flex;
  gap: 12px;
}

.new-price {
  color: red;
  font-weight: 500;
}

.old-price {
  opacity: 0.5;
  text-decoration: line-through
}

.price{
  background-color:black;
  position:absolute;
  width:100%;
  bottom:22%;
  color:red;
  opacity:0;
  transition: all 0.5 ease-in-out;
}
.card:hover .label {
      opacity: 1;
      transform: translateY(-20px);
  }


/* .card-img-top:hover {
  transform: translateY(-20px);
} */


</style>



</script>

<body>
  <header style="height:120px; border-bottom:1px solid #ccc;">Header</header>
  <div class="container">
    <!-- <div class="slideshow">
        <div class="slide">
          <img src="" alt="" style="width: 100%">

        </div>
      </div> -->
    <div class="row">
      <div class="col-6 col-xs-6 col-sm-4 col-md-3 col-xxl-3">
        <div class="card product">
          <a href="" class="wrap-img " width="270px" height="250px">
            <img class="card-img-top" src="./product.png" width="140px" height="146px"></i>
          </a>
          <label class="price" for""> Add to Cart </label>
          <div class="d-flex justify-content-between align-items-center mx-1 my-2">
            <div class="product-body">
              <a href="" class="product-title">The north coat</a>
              <div class="prices">
                <div class="new-price">$260</div>
                <div class="old-price">$260</div>
              </div>
            </div>
            <button type="button" class="btn btn-outline-primary btn-add-to-cart">
              <i class="fa-solid fa-cart-plus"></i>
            </button>
          </div>
        </div>
      </div>



    </div>
  </div>
</body>

</html>