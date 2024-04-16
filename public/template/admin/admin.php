
<div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class='bx bxs-bug'></i>
                    <span>Shop manager</span>

                </i>
            </div>
            <i class="bx bx-menu" id="btn"></i>

        </div>
        <div class="user">
            <img src="../../public/images/arsenal1.jpg" class="user-img">
            <div>
                <p class="bold"> Dinh Chien</p>
                <p>Admin</p>
            </div>
        </div>
        <ul style="padding-left: 0px;">
            <li>
                <a href="#">
                    <i class="bx bxs-grid-alt"></i>
                    <span class="nav-item">Dasboard</span>

                </a>
                <span class="tooltip">Dashboard</span>
            </li>

            <li>
                <a href="#">
                    <i class='bx bxl-product-hunt'></i>
                    <span class="nav-item">Product</span>

                </a>
                <span class="tooltip">Product</span>
            </li>

            <li>
                <a href="#">
                    <i class="bx bxs-grid-alt"></i>
                    <span class="nav-item">Customer</span>

                </a>
                <span class="tooltip">Customer</span>
            </li>

            <li>
                <a href="#">
                    <i class="bx bx-log-out"></i>
                    <span class="nav-item">Account</span>

                </a>
                <span class="tooltip">Account</span>
            </li>
        </ul>
    </div>


    <!-- <div class="main-content">
        <div class="container">
            <h1>Day la header</h1>
            <h1> Testtt </h1>
        </div>
        
    </div> -->

<script>
    let btn = document.querySelector('#btn')
    let sidebar = document.querySelector('.sidebar')
    
    btn.onclick = function()
    {
        sidebar.classList.toggle('active');
    };

</script>

<style> 
*{
    margin:0;
    padding:0;
    box-sizing: border-box;
    font-family: 'poppins',sans-serif;

}
.user-img{
    width:50px;
    border-radius:100%;
    border:1px soild #eee;

}
.sidebar{
    position:absolute;
    top:0;
    left:0;
    height: 100vh;
    width:80px;
    background:#12171e;
    padding: 0.4rem 0.8rem;
    transition: all 0.5s ease;

}
.sidebar.active ~ .main-content {
    left:250px;
    width: calc(100% - 250px);

}

.sidebar.active {
    width:250px;

}

.sidebar #btn {
    position:absolute;
    color:#fff;
    top: 0.4rem;
    left:50%;
    font-size: 1.2rem;
    line-height: 50px;
    transform: translateX(-50%);
    cursor:pointer;
}

.sidebar.active #btn
{
    left:90%;

}

.sidebar .top .logo {
    color:#fff;
    display:flex;
    height:50px;
    width:100%;
    align-items: center;
    pointer-events: none;
    opacity:0;
}
.sidebar.active .top .logo {
    opacity:1;
}

.top .logo i {
    font-size: 2rem;
    margin-right:5px;

}
.user {
    display:flex;
    align-items: center;
    margin: 1rem 0;
}

.user p {
    color:#fff;
    opacity:1;
    margin-left: 1rem;
}


.bold {
    font-weight: 600;

}

.sidebar p {
    opacity:0;

}

.sidebar.active p {
    opacity: 1;

}
.sidebar ul li {
    position:relative;
    list-style-type: none;
    height:50px;
    width:90%;
    margin: 0.8rem auto;
    line-height: 50px;
}

.sidebar ul li a {
    color:white;
    display:flex;
    align-items: center;
    text-decoration: none;
    border-radius: 0.8rem;
}

.sidebar ul li a:hover{
    background-color:#fff;
    color:#12171e;
}
.sidebar ul li a i {
    min-width: 50px;
    text-align: center;
    height:50px;
    border-radius: 12px;
    line-height: 50px;

}

.sidebar .nav-item {
    opacity:0;
}
.sidebar.active .nav-item {
    opacity:1;
}

.sidebar ul li .tooltip {
    position:absolute;
    left:125px;
    top:50%;
    transform: translate(-50%,-50%);
    box-shadow: 0 0.5rem 0.8rem rgba(0,0,0, 0.2);
    border-radius: 0.6rem;
    padding: 0.4rem 1.2rem;
    line-height: 1.8rem;
    z-index: 20;
    opacity:0;
}
.sidebar ul li:hover .tooltip{
    opacity:1;
}
.sidebar.active ul li .tooltip {
    display:none;
}

.main-content{
    position:relative;
    background-color:#eee;
    min-height: 100vh;
    top:0;
    left:80px;
    transition: all 0.5s ease;
    width: calc(100% - 80px);
    padding: 1rem;
}


</style>