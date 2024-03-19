<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet"  type="text/css" href="Product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  

</head>

<body>
    <div class="container" >
        
        <!-- Nhãn bộ lọc -->
        <div class="row row-filter-lable" >
        <h5 style="margin-top: 20px;" > <i class="fa-solid fa-filter"></i> Bộ lọc</h5>
        </div>

        <!--Bộ lọc -->
        <div class="row row-filter" >
            <!-- Loại sản phẩm -->
            <div class="col-6  col-sm-4 col-md-3 col-Filter" >
                <select class="form-select select-filter-type" aria-label="Default select example">
                    <option value="" disabled selected hidden >Loại sản phẩm</option>
                    <option value="0" select>Tất cả loại</option>
                    <option value="1">Loại thể thao</option>
                    <option value="2">Loại du lịch</option>
                    <option value="3">Áo thun cao cổ</option>
                </select>
            </div>
            <!-- Giá -->
            <div class="col-6 col-sm-4 col-md-2 col-Filter" >
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Giá
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <p>
                                <label for="amount" style="padding-left: 10px;"  >Price range:</label>
                                <input type="text" id="amount"  readonly style="border:0; color:#000000; font-weight:bold;padding-left: 10px;">
                            </p>
                            <div id="slider-range"></div>
                            <!-- <button type="button" class="btn btn-outline-secondary btn-filter-price">Chọn</button>  -->
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Giới tính  -->
            <div class="col-6 col-sm-4 col-md-2 col-Filter">
                <select class="form-select select-filter-sex" aria-label="Default select example">
                    <option value="" disabled selected hidden >Giới tính</option>
                    <option value="0" select>Tất cả giới tính</option>
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>
                </select>
            </div>
            <!-- Size -->
            <div class="col-6 col-sm-4 col-md-2 col-Filter">
                <select class="form-select select-filter-size" aria-label="Default select example">
                    <option value="" disabled selected hidden >Size</option>
                    <option value="0" select>Tất cả size</option>
                    <option value="1">XXL</option>
                    <option value="2">XL</option>
                    <option value="3">L</option>
                    <option value="4">M</option>
                    <option value="5">S</option>
                </select>
            </div>

            <!-- Sale -->
            <div  class="col-6 col-sm-4 col-md-2 col-Filter" >
                <div class="filter-sale" >
                    <input type="checkbox" class="btn-check" id="btn-check-2-outlined"   autocomplete="off" style=" border: 1px solid black; color:black">
                    <label class="btn btn-outline-secondary" for="btn-check-2-outlined" style="width:100%;border: 1px solid black; "> <i class="fa-solid fa-percent"></i> Sale</label>
                </div> 
            </div>
            <!-- button lọc -->
            <div class="col-6 col-sm-4 col-md-1 col-Filter" >
                <div class="filter-label" >
                    <button type="button" class="btn btn-danger btn-filter-label">
                    <!-- <i class="fa-solid fa-filter"></i>  -->
                    Lọc</button>
                </div>  
            </div>
        </div>
        
        <!-- Tag -->
        <div class="row row-tag" >
            <div class="col-md-8" >
                <h6><i class="fa-solid fa-tags"></i> Tag</h6>
                <span class="badge text-bg-danger">Tất cả loại</span>
                <span class="badge text-bg-danger">$50 - $555</span>
                <span class="badge text-bg-danger">Tất cả giới tính</span>
                <span class="badge text-bg-danger">Tất cả size</span>
                <span class="badge text-bg-danger">Đang sale</span>
            </div>
            <div class="col-md-4" >

            </div>
        </div>

        <!-- Nhãn sản phẩm -->
        <div class="row " style="margin-top: 40px;"  >
            <h3>Product</h3>
        </div>

        <!-- Sản phẩm -->
        <div class="row row-product">
            <div class="col-6 col-sm-4 col-md-3 col-xxl-3 product">
                <a href="" class="wrap-img">
                <img class="img-product" src="img.png">
                <div class="deal"><span>-50%</span></div>
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
                <img class="img-product" src="img.png">
                <div class="deal"><span>-50%</span></div>
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
                <img class="img-product" src="img.png">
                <div class="deal"><span>-50%</span></div>
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
                <img class="img-product" src="img.png">
                <div class="deal"><span>-50%</span></div>
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
                <img class="img-product" src="img.png">
                <div class="deal"><span>-50%</span></div>
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
                <img class="img-product" src="img.png">
                <div class="deal"><span>-50%</span></div>
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
                <img class="img-product" src="img.png">
                <div class="deal"><span>-50%</span></div>
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
                <img class="img-product" src="img.png">
                <div class="deal"><span>-50%</span></div>
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
                <img class="img-product" src="img.png">
                <div class="deal"><span>-50%</span></div>
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
                <img class="img-product" src="img.png">
                <div class="deal"><span>-50%</span></div>
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
                <img class="img-product" src="img.png">
                <div class="deal"><span>-50%</span></div>
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
                <img class="img-product" src="img.png">
                <div class="deal"><span>-50%</span></div>
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

        <div class="row row-pagination" >
            <div class="div-pagination" >
                <nav aria-label="..." >
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item " >
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </div>
    <style>
        *{
         box-sizing: border-box;   
         padding:0;
         
        }
        body{
        width: 100%;
        }
    </style>
    <script src="popper.min.js" ></script>
    <script type="text/javascript" src="bootstrap.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 75, 300 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
            });
            $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
            " - $" + $( "#slider-range" ).slider( "values", 1 ) );
        } );
    </script>
</body>
</html>