<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./public/css/home.css">
</head>


<body>
  <div class="container">
    <div class="banner">
      <img alt="" class="img-slide active" src="./public/images/slide1.jpg">
      <img alt="" class="img-slide" src="./public/images/slide2.jpg">
      <img alt="" class="img-slide " src="./public/images/slide3.jpg">
      <div class="group-nav">
        <i class="fa-solid fa-angle-left"></i>
        <div class="badge-nav">
          <span class="badge active" onclick='showSlide(1)'></span>
          <span class="badge" onclick='showSlide(2)'></span>
          <span class="badge" onclick='showSlide(3)'></span>
        </div>
        <i class="fa-solid fa-angle-right"></i>
      </div>
      <div class="content">
        <h3>Lorem</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde tempora officiis temporibus fugit, maiores
          commodi mollitia, similique deleniti omnis praesentium, culpa nulla a quaerat quos et ab ducimus vel laborum.
        </p>
        <a class="shop-now" href="">Shop Now <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>

    <div class="block categories">
      <div class="top">
        <div class="left">
          <div class="title">
            Categories
          </div>
          <div class="desc">Browse By Category</div>
        </div>
        <div class="right">
          <i class="fa-solid fa-arrow-left scrollToLeft"></i>
          <i class="fa-solid fa-arrow-right scrollToRight"></i>
        </div>
      </div>
      <div class="bottom row">
        <div class="col-4 col-sm-3 col-md-2 col-xxl-2">
          <a href="" class="category-group">
            <i class="fa-solid fa-volleyball"></i>
            <div class="category-name">
              Sport
            </div>
          </a>
        </div>
        <div class="col-4 col-sm-3 col-md-2 col-xxl-2">
          <a href="" class="category-group">
            <i class="fa-solid fa-person"></i>
            <div class="category-name">
              Men
            </div>
          </a>
        </div>
        <div class="col-4 col-sm-3 col-md-2 col-xxl-2">
          <a href="" class="category-group">
            <i class="fa-solid fa-person-dress"></i>
            <div class="category-name">
              Women
            </div>
          </a>
        </div>
        <div class="col-4 col-sm-3 col-md-2 col-xxl-2">
          <a href="" class="category-group">
            <i class="fa-solid fa-shirt"></i>
            <div class="category-name">
              T-shirt
            </div>
          </a>
        </div>
        <div class="col-4 col-sm-3 col-md-2 col-xxl-2">
          <a href="" class="category-group">
            <i class="fa-solid fa-shirt"></i>
            <div class="category-name">
              T-shirt
            </div>
          </a>
        </div>
        <div class="col-4 col-sm-3 col-md-2 col-xxl-2">
          <a href="" class="category-group">
            <i class="fa-solid fa-shirt"></i>
            <div class="category-name">
              T-shirt
            </div>
          </a>
        </div>
        <div class="col-4 col-sm-3 col-md-2 col-xxl-2">
          <a href="" class="category-group">
            <i class="fa-solid fa-shirt"></i>
            <div class="category-name">
              T-shirt
            </div>
          </a>
        </div>
        <div class="col-4 col-sm-3 col-md-2 col-xxl-2">
          <a href="" class="category-group">
            <i class="fa-solid fa-shirt"></i>
            <div class="category-name">
              T-shirt
            </div>
          </a>
        </div>
      </div>
    </div>
    <hr>
    <div class="block best-selling">
      <div class="top">
        <div class="left">
          <div class="title">
            This month
          </div>
          <div class="desc">Best Selling Products</div>
        </div>
        <div class="right">
          <button type="button" class="btn btn-view-all">View All</button>
        </div>
      </div>
      <div class="bottom row">
        <div class="col-6 col-sm-4 col-md-3 col-xxl-3">
          <div class="product">
            <a href="" class="wrap-img">
              <img class="img-product" src="./public/images/img1.png">
              <div class="deal">-50%</div>
            </a>
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
        <div class="col-6 col-sm-4 col-md-3 col-xxl-3 product">
          <a href="" class="wrap-img">
            <img class="img-product" src="./public/images/img1.png">
            <div class="deal">-50%</div>
          </a>
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
        <div class="col-6 col-sm-4 col-md-3 col-xxl-3 product">
          <a href="" class="wrap-img">
            <img class="img-product" src="./public/images/img1.png">
            <div class="deal">-50%</div>
          </a>
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
        <div class="col-6 col-sm-4 col-md-3 col-xxl-3 product">
          <a href="" class="wrap-img">
            <img class="img-product" src="./public/images/img1.png">
            <div class="deal">-50%</div>
          </a>
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
    <hr>
    <div class="block explore-products">
      <div class="top">
        <div class="left">
          <div class="title">
            Our Products
          </div>
          <div class="desc">Explore Our Products</div>
        </div>
      </div>
      <div class="row">
        <div class="col-6 col-sm-4 col-md-3 col-xxl-3 product">
          <a href="" class="wrap-img">
            <img class="img-product" src="./public/images/img1.png">
            <div class="deal">-50%</div>
          </a>
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
        <div class="col-6 col-sm-4 col-md-3 col-xxl-3 product">
          <a href="" class="wrap-img">
            <img class="img-product" src="./public/images/img1.png">
            <div class="deal">-50%</div>
          </a>
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
        <div class="col-6 col-sm-4 col-md-3 col-xxl-3 product">
          <a href="" class="wrap-img">
            <img class="img-product" src="./public/images/img1.png">
            <div class="deal">-50%</div>
          </a>
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
        <div class="col-6 col-sm-4 col-md-3 col-xxl-3 product">
          <a href="" class="wrap-img">
            <img class="img-product" src="./public/images/img1.png">
            <div class="deal">-50%</div>
          </a>
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
        <div class="col-6 col-sm-4 col-md-3 col-xxl-3 product">
          <a href="" class="wrap-img">
            <img class="img-product" src="./public/images/img1.png">
            <div class="deal">-50%</div>
          </a>
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
        <div class="col-6 col-sm-4 col-md-3 col-xxl-3 product">
          <a href="" class="wrap-img">
            <img class="img-product" src="./public/images/img1.png">
            <div class="deal">-50%</div>
          </a>
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
        <div class="col-6 col-sm-4 col-md-3 col-xxl-3 product">
          <a href="" class="wrap-img">
            <img class="img-product" src="./public/images/img1.png">
            <div class="deal">-50%</div>
          </a>
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
        <div class="col-6 col-sm-4 col-md-3 col-xxl-3 product">
          <a href="" class="wrap-img">
            <img class="img-product" src="./public/images/img1.png">
            <div class="deal">-50%</div>
          </a>
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
        <div class="col-6 col-sm-4 col-md-3 col-xxl-3 product">
          <a href="" class="wrap-img">
            <img class="img-product" src="./public/images/img1.png">
            <div class="deal">-50%</div>
          </a>
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
        <div class="col-6 col-sm-4 col-md-3 col-xxl-3 product">
          <a href="" class="wrap-img">
            <img class="img-product" src="./public/images/img1.png">
            <div class="deal">-50%</div>
          </a>
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
        <div class="col-6 col-sm-4 col-md-3 col-xxl-3 product">
          <a href="" class="wrap-img">
            <img class="img-product" src="./public/images/img1.png">
            <div class="deal">-50%</div>
          </a>
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
        <div class="col-6 col-sm-4 col-md-3 col-xxl-3 product">
          <a href="" class="wrap-img">
            <img class="img-product" src="./public/images/img1.png">
            <div class="deal">-50%</div>
          </a>
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
      <button type="button" class="btn btn-view-all-products">View all products</button>
    </div>

    <div class="policy">
      <div class="policy-item">
        <div class="policy-icon">
          <svg width="40" height="40" viewBox="0 0 40 40" fill="none" stroke="#fff" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_120_1374)">
              <path
                d="M11.6667 31.6667C13.5076 31.6667 15 30.1743 15 28.3333C15 26.4924 13.5076 25 11.6667 25C9.82573 25 8.33334 26.4924 8.33334 28.3333C8.33334 30.1743 9.82573 31.6667 11.6667 31.6667Z"
                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path
                d="M28.3333 31.6667C30.1743 31.6667 31.6667 30.1743 31.6667 28.3333C31.6667 26.4924 30.1743 25 28.3333 25C26.4924 25 25 26.4924 25 28.3333C25 30.1743 26.4924 31.6667 28.3333 31.6667Z"
                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path
                d="M8.33331 28.3335H6.99998C5.89541 28.3335 4.99998 27.4381 4.99998 26.3335V21.6668M3.33331 8.3335H19.6666C20.7712 8.3335 21.6666 9.22893 21.6666 10.3335V28.3335M15 28.3335H25M31.6667 28.3335H33C34.1046 28.3335 35 27.4381 35 26.3335V18.3335M35 18.3335H21.6666M35 18.3335L30.5826 10.9712C30.2211 10.3688 29.5701 10.0002 28.8676 10.0002H21.6666"
                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path
                d="M8 28H6.66667C5.5621 28 4.66667 27.1046 4.66667 26V21.3333M3 8H19.3333C20.4379 8 21.3333 8.89543 21.3333 10V28M15 28H24.6667M32 28H32.6667C33.7712 28 34.6667 27.1046 34.6667 26V18M34.6667 18H21.3333M34.6667 18L30.2493 10.6377C29.8878 10.0353 29.2368 9.66667 28.5343 9.66667H21.3333"
                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M5 11.8182H11.6667" stroke="black" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
              <path d="M1.81818 15.4545H8.48484" stroke="black" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
              <path d="M5 19.0909H11.6667" stroke="black" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
            </g>
            <defs>
              <clipPath id="clip0_120_1374">
                <rect width="40" height="40" fill="white" />
              </clipPath>
            </defs>
          </svg>
        </div>
        <div class="policy-desc">
          <h5 class="title">FREE AND FAST DELIVERY</h5>
          <p class="desc">Free delivery for all orders over $140</p>
        </div>
      </div>
      <div class="policy-item">
        <div class="policy-icon">
          <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_2823_352)">
              <path
                d="M13.3334 24.9998C13.3334 23.1589 11.841 21.6665 10 21.6665C8.15907 21.6665 6.66669 23.1589 6.66669 24.9998V28.3332C6.66669 30.1741 8.15907 31.6665 10 31.6665C11.841 31.6665 13.3334 30.1741 13.3334 28.3332V24.9998Z"
                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path
                d="M33.3334 24.9998C33.3334 23.1589 31.841 21.6665 30 21.6665C28.1591 21.6665 26.6667 23.1589 26.6667 24.9998V28.3332C26.6667 30.1741 28.1591 31.6665 30 31.6665C31.841 31.6665 33.3334 30.1741 33.3334 28.3332V24.9998Z"
                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path
                d="M6.66669 24.9998V19.9998C6.66669 16.4636 8.07145 13.0722 10.5719 10.5717C13.0724 8.07126 16.4638 6.6665 20 6.6665C23.5362 6.6665 26.9276 8.07126 29.4281 10.5717C31.9286 13.0722 33.3334 16.4636 33.3334 19.9998V24.9998"
                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M30 31.6665C30 32.9926 28.9464 34.2644 27.0711 35.202C25.1957 36.1397 22.6522 36.6665 20 36.6665"
                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </g>
            <defs>
              <clipPath id="clip0_2823_352">
                <rect width="40" height="40" fill="white" />
              </clipPath>
            </defs>
          </svg>

        </div>
        <div class="policy-desc">
          <h5 class="title">24/7 CUSTOMER SERVICE</h5>
          <p class="desc">Friendly 24/7 customer support</p>
        </div>
      </div>
      <div class="policy-item">
        <div class="policy-icon">
          <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M8.09912 30.5992L8.09889 30.5991C7.22616 29.9483 6.42555 28.9206 5.84276 27.759C5.25992 26.5973 4.91669 25.3451 4.91669 24.2666V11.8666C4.91669 9.50736 6.67152 6.96177 8.89119 6.13513L8.89215 6.13477L17.2084 3.01826C17.2085 3.01823 17.2086 3.0182 17.2086 3.01817C17.9621 2.73661 18.9616 2.5874 19.9834 2.5874C21.0051 2.5874 22.0046 2.73661 22.7581 3.01817C22.7581 3.0182 22.7582 3.01823 22.7583 3.01826L31.0746 6.13477L31.0755 6.13513C33.2952 6.96177 35.05 9.50736 35.05 11.8666V24.2499C35.05 25.3371 34.7066 26.5892 34.1241 27.7483C33.5416 28.9073 32.7411 29.9313 31.8678 30.5824L31.8676 30.5826L24.7009 35.9326L24.7009 35.9325L24.6947 35.9373C23.412 36.9264 21.724 37.4332 20 37.4332C18.2774 37.4332 16.5852 36.927 15.2649 35.9486C15.2647 35.9484 15.2646 35.9483 15.2644 35.9482L8.09912 30.5992ZM17.7419 4.43145L17.7412 4.4317L9.42456 7.54837L9.42386 7.54863C8.59627 7.86019 7.85504 8.52248 7.32412 9.29061C6.79303 10.059 6.43335 10.9898 6.43335 11.8832V24.2666C6.43335 25.161 6.74394 26.1892 7.20094 27.101C7.65782 28.0126 8.29331 28.8722 9.00087 29.4005L9.00092 29.4006L16.1672 34.7503C17.2292 35.5445 18.6283 35.9249 20.0021 35.9249C21.3761 35.9249 22.7783 35.5445 23.8478 34.7516L23.8491 34.7506L31.0158 29.4006L31.0167 29.3999C31.7314 28.8638 32.3669 28.005 32.8222 27.0943C33.2776 26.1837 33.5834 25.16 33.5834 24.2666V11.8666C33.5834 10.9804 33.2229 10.0538 32.6926 9.28645C32.1621 8.51889 31.4223 7.85396 30.5976 7.5338L30.5977 7.53376L30.5921 7.5317L22.2755 4.41503L22.2755 4.41495L22.2664 4.41174C21.6283 4.18651 20.8002 4.08314 20.0007 4.08532C19.2021 4.0875 18.3752 4.19514 17.7419 4.43145Z"
              fill="#FAFAFA" stroke="#FAFAFA" />
            <path
              d="M17.4131 21.0536L17.7667 21.4071L18.1202 21.0536L24.4036 14.7703C24.6916 14.4822 25.1751 14.4822 25.4631 14.7703C25.7512 15.0583 25.7512 15.5417 25.4631 15.8298L18.2965 22.9965C18.1452 23.1478 17.9579 23.2167 17.7667 23.2167C17.5755 23.2167 17.3882 23.1478 17.2369 22.9965L14.5536 20.3131C14.2655 20.0251 14.2655 19.5417 14.5536 19.2536C14.8416 18.9655 15.3251 18.9655 15.6131 19.2536L17.4131 21.0536Z"
              fill="#FAFAFA" stroke="#FAFAFA" />
          </svg>
        </div>
        <div class="policy-desc">
          <h5 class="title">MONEY BACK GUARANTEE</h5>
          <p class="desc">We return money within 30 days</p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>