<?php 
?>
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class='bx bxs-bug'></i>
                    <span>DIVINE</span>

      </i>
    </div>
    <i class="bx bx-menu" id="btn"></i>

        </div>
        <div class="user">
            <img src="../public/images/logo.png" class="user-img">
            <div>
                <p class="bold"> Nguyễn Văn A</p>
                <p>Admin</p>
            </div>
        </div>
        <ul style="padding-left: 0px;">
        
        <li>
                <a href="<?php echo $url.'/statistic';?>">
                <i class="fa-solid fa-chart-simple icon"  ></i>
                    <span class="nav-item">Thống Kê</span>

                </a>
                <span class="tooltip">Thống Kê</span>
            </li>
            <li>
                <a href="<?php echo $url.'/product';?>">
                    <i class='bx bxl-product-hunt icon'></i>
                    <span class="nav-item">Sản Phẩm</span>

                </a>
                <span class="tooltip">Sản Phẩm</span>
            </li>
            <li>
                <a href="<?php echo $url.'/category';?>">
                    <i class="fa-solid fa-list"></i>
                    <span class="nav-item">Danh Mục</span>

                </a>
                <span class="tooltip">Danh Mục</span>
            </li>

            <li>
                <a href="<?php echo $url.'/discount';?>">
                <i class="fa-solid fa-percent icon"></i>
                    <span class="nav-item">Khuyến Mãi</span>

                </a>
                <span class="tooltip">Khuyến Mãi</span>
            </li>

            <li>
                <a href="<?php echo $url.'/supplier'?>">
                <i class="fa-solid fa-boxes-packing icon"></i>
                    <span class="nav-item">Nhà Cung Cấp</span>

                </a>
                <span class="tooltip">Nhà Cung Cấp</span>
            </li>

            <li>
                <a href="<?php echo $url.'/staff'?>">
                <i class="fa-solid fa-user icon"></i>
                    <span class="nav-item">Nhân Viên</span>

                </a>
                <span class="tooltip">Nhân Viên</span>
            </li>

            <li>
                <a href="<?php echo $url.'/guest'?>">
                <i class="fa-solid fa-circle-user icon"></i>
                    <span class="nav-item">Khách Hàng</span>

                </a>
                <span class="tooltip">Khách Hàng</span>
            </li>
            <li>
                <a href="<?php echo $url.'/permission'?>">
                <i class="fa-solid fa-users icon"></i>
                    <span class="nav-item">Quyền</span>

                </a>
                <span class="tooltip">Quyền</span>
            </li>
            <li>
                <a href="<?php echo $url.'/order'?>">
                <i class="fa-solid fa-receipt icon"></i>
                    <span class="nav-item">Đơn Hàng</span>

                </a>
                <span class="tooltip">Đơn Hàng</span>
            </li>
            <li>
                <a href="<?php echo $url.'/import'?>">
                <i class="fa-solid fa-file-import icon"></i>
                    <span class="nav-item">Nhập Hàng</span>

                </a>
                <span class="tooltip">Nhập Hàng</span>
            </li>
            <li>
                <a href="<?php $trimmed_url = str_replace("/admin", "",$url); echo $trimmed_url;?>">
                <i class="fa-solid fa-arrow-right-from-bracket icon"></i>
                    <span class="nav-item">Thoát</span>

                </a>
                <span class="tooltip">Thoát</span>
            </li>
        </ul>
    </div>


<script>
let btn = document.querySelector('#btn')
let sidebar = document.querySelector('.sidebar')

btn.onclick = function() {
  sidebar.classList.toggle('active');
};
</script>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'poppins', sans-serif;

}

.icon {
  padding-right: 7px;
}

.user-img {
  width: 50px;
  border-radius: 100%;
  border: 1px soild #eee;

}

.sidebar {
  position: absolute;
  top: 0;
  left: 0;
  width: 86px;
  background: #12171e;
  padding: 0.4rem 0.8rem;
  transition: all 0.5s ease;
  height: 100vh;
  overflow: hidden;



}

.sidebar:hover {

  overflow-y: scroll;
  overflow-x: hidden;

  scrollbar-width: thin;
  scrollbar-color: #808080 #f0f0f0;
}



.sidebar.active~.main-content {
  left: 250px;
  width: calc(100% - 250px);

}

.sidebar.active {
  width: 250px;
}

.sidebar #btn {
  position: absolute;
  color: #fff;
  top: 0.4rem;
  left: 50%;
  font-size: 1.2rem;
  line-height: 50px;
  transform: translateX(-50%);
  cursor: pointer;
}

.sidebar.active #btn {
  left: 90%;

}

.sidebar .top .logo {
  color: #fff;
  display: flex;
  height: 50px;
  width: 100%;
  align-items: center;
  pointer-events: none;
  opacity: 0;

}

.sidebar.active .top .logo {
  opacity: 1;
}

.top .logo i {
  font-size: 2rem;
  margin-right: 5px;

}

.user {
  display: flex;
  align-items: center;
  margin: 1rem 0;
}

.user p {
  color: #fff;
  opacity: 1;
  margin-left: 1rem;
}


.bold {
  font-weight: 600;

}

.sidebar p {
  opacity: 0;

}

.sidebar.active p {
  opacity: 1;

}

.sidebar ul li {
  position: relative;
  list-style-type: none;
  height: 50px;
  width: 90%;
  margin: 0.8rem auto;
  line-height: 50px;
}

.sidebar ul li a {
  color: white;
  display: flex;
  align-items: center;
  text-decoration: none;
  border-radius: 0.8rem;
}

.sidebar ul li a:hover {
  background-color: #fff;
  color: #12171e;

}

.sidebar ul li a i {
  min-width: 50px;
  text-align: center;
  height: 50px;
  border-radius: 12px;
  line-height: 50px;

}

.sidebar .nav-item {
  opacity: 0;
}

.sidebar.active .nav-item {
  opacity: 1;
}

.sidebar ul li .tooltip {
  position: absolute;
  left: 125px;
  top: 50%;
  transform: translate(-50%, -50%);
  box-shadow: 0 0.5rem 0.8rem rgba(0, 0, 0, 0.2);
  border-radius: 0.6rem;
  padding: 0.4rem 1.2rem;
  line-height: 1.8rem;
  z-index: 20;
  opacity: 1;
  display: none;
}

.sidebar ul li:hover .tooltip {
  opacity: 2;
  display: block;
}

.sidebar.active ul li .tooltip {
  display: none;
}

.main-content {
  position: relative;
  background-color: #eee;
  min-height: 100vh;
  top: 0;
  left: 80px;
  transition: all 0.5s ease;
  width: calc(100% - 80px);
  padding: 1rem;
  height: 100vh;
  overflow-y: scroll;
}
</style>