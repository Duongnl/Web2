
<body>
  <div class="signinandout">
  <div class="cont">
    <div class="form sign-in"><section>
        <form method="post" action ="login_register.php " class="xulylogin">
            <?php 
              require 'xuly.php';
            ?>;
            <h1>Login</h1>
            <div class="input_login">
                <ion-icon name="mail-outline"></ion-icon>
                <input type ="text" name="input_user"placeholder='' required>
                <label for="">User</label>
            </div>
            <div class="input_login">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="input_pass" value="" required>
                <label for="">Password</label>

            </div>
            <div class="forget">
                <label for ="">
                    <input type ="checkbox"> Remember
                </label>
                <a href="#" >Forget Password</a>
            </div>
            <button class="btn-login"><a href="#">Login</a></button>
            <button class="register">
                <p> Register</p>
            </button>
        </form>

    </section>

    
    </div>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>Đăng ký ở đây nè!</h2>
          <p>Chưa có tài khoản à? <br> Đăng ký đê !</p>
        </div>
        <div class="img-text m-in">
          <h2>Đăng nhập đê! </h2>
          <p>Nếu có rồi thì đăng nhập thôi  </p>
        </div>
        <div class="img-btn">
          <span class="m-up">Đăng ký</span>
          <span class="m-in">Đăng Nhập </span>
        </div>
      </div>
      <div class="form sign-up">
        <section>
            <form>
                <h1>Register</h1>
                <div class="input_Register">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type = "text" required>
                    <label for ="">User Name</label>
                </div>
                <div class="input_Register">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type = "email" required>
                    <label for ="">Email</label>
                </div>
                <div class="input_Register">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type = "text" required>
                    <label for ="">Phone Number</label>
                </div>
                <div class="input_Register">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type = "password" required>
                    <label for ="">Password</label>
                </div>
                <div class="login">
                    <label for="">Already have an account? <a href="#" class="buttonlogin">Login</a> </label>
                </div>
                <label > </label>
                <button class="btn-register"><p>Register</p></button>
    
            </form>
        </section>
    </div>
    </div>
  </div>
  </div>
<script >
    document.querySelector('.img-btn').addEventListener('click', function()
	{
		document.querySelector('.cont').classList.toggle('s-signup')
	}
);

document.querySelector('.register').addEventListener('click', function()
	{
		document.querySelector('.cont').classList.toggle('s-signup')
	}
);
document.querySelector('.buttonlogin').addEventListener('click', function()
	{
		document.querySelector('.cont').classList.toggle('s-signup')
	}
);
</script>

<style>
  *, *:before, *:after{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'popping', sans-serif;
}

.signinandout{
  width: 100%;
  height: 100vh;
  justify-content:center;
  display: flex;
  align-items: center;
  flex-direction: column;
}

input, button{
  border:none;
  outline: none;
  background: none;
}

.cont{
  overflow: hidden;
  position: relative;
  border-radius: 45px;
  width: 900px;
  height: 550px;
  background: #fff;
  box-shadow: 0 19px 38px rgba(0, 0, 0, 0.30), 0 15px 12px rgba(0, 0, 0, 0.22);
}

.form{
  position: relative;
  width: 640px;
  height: 100%;
  padding: 20px 50px;
  -webkit-transition:-webkit-transform 1.2s ease-in-out;
  transition: -webkit-transform 1.2s ease-in-out;
  transition: transform 1.2s ease-in-out;
  transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
}

h2{
  width: 100%;
  font-size: 30px;
}

label{
  display: block;
 
  text-align: center;
}

label span{
  font-size: 14px;
  font-weight: 600;
  color: #505f75;
  text-transform: uppercase;
}

input{
  display: block;
  width: 100%;
  margin-top: 5px;
  font-size: 16px;
  padding-bottom: 5px;
  border-bottom: 1px solid rgba(109, 93, 93, 0.4);
}

button{
  display: block;
  margin: 0 auto;
  width: 260px;
  height: 36px;
  border-radius: 30px;
  color: #fff;
  font-size: 15px;
  cursor: pointer;
}

.submit{
  margin-top: 40px;
  margin-bottom: 30px;
  text-transform: uppercase;
  font-weight: 600;
  font-family: 'Nunito', sans-serif;
  background: -webkit-linear-gradient(left, #7579ff, #b224ef);
}

.submit:hover{
  background: -webkit-linear-gradient(left, #b224ef, #7579ff);
}

.forgot-pass{
  margin-top: 15px;
  text-align: center;
  font-size: 14px;
  font-weight: 600;
  color: #0c0101;
  cursor: pointer;
}

.forgot-pass:hover{
  color: red;
}

.social-media{
  width: 100%;
  text-align: center;
  margin-top: 20px;
}

.social-media ul{
  list-style: none;
}

.social-media ul li{
  display: inline-block;
  cursor: pointer;
  margin: 25px 15px;
}

.social-media img{
  width: 40px;
  height: 40px;
}

.sub-cont{
  overflow: hidden;
  position: absolute;
  left: 640px;
  top: 0;
  width: 900px;
  height: 100%;
  padding-left: 260px;
  background: #fff;
  -webkit-transition: -webkit-transform 1.2s ease-in-out;
  transition: -webkit-transform 1.2s ease-in-out;
  transition: transform 1.2s ease-in-out;
}

.cont.s-signup .sub-cont{
  -webkit-transform:translate3d(-640px, 0, 0);
          transform:translate3d(-640px, 0, 0);
}

.img{
  overflow: hidden;
  z-index: 2;
  position: absolute;
  left: 0;
  top: 0;
  width: 260px;
  height: 100%;
  padding-top: 360px;
}

.img:before{
  content: '';
  position: absolute;
  right: 0;
  top: 0;
  width: 900px;
  height: 100%;
  background-image: url('imgmainlogin.jpg');
  background-size: cover;
  border-radius: 45px;
  transition: -webkit-transform 1.2s ease-in-out;
  transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
}

.img:after{
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.3);
}

.cont.s-signup .img:before{
  -webkit-transform:translate3d(640px, 0, 0);
          transform:translate3d(640px, 0, 0);
}

.img-text{
  z-index: 2;
  position: absolute;
  left: 0;
  top: 50px;
  width: 100%;
  padding: 0 20px;
  text-align: center;
  color: #fff;
  -webkit-transition:-webkit-transform 1.2s ease-in-out;
  transition: -webkit-transform 1.2s ease-in-out;
  transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
}

.img-text h2{
  margin-bottom: 10px;
  font-weight: normal;
}

.img-text p{
  font-size: 14px;
  line-height: 1.5;
}

.cont.s-signup .img-text.m-up{
  -webkit-transform:translateX(520px);
          transform:translateX(520px);
}

.img-text.m-in{
  -webkit-transform:translateX(-520px);
          transform:translateX(-520px);
}

.cont.s-signup .img-text.m-in{
  -webkit-transform:translateX(0);
          transform:translateX(0);
}


.sign-in{
  padding-top: 65px;
  -webkit-transition-timing-function:ease-out;
          transition-timing-function:ease-out;
}

.cont.s-signup .sign-in{
  -webkit-transition-timing-function:ease-in-out;
          transition-timing-function:ease-in-out;
  -webkit-transition-duration:1.2s;
          transition-duration:1.2s; 
  -webkit-transform:translate3d(640px, 0, 0);
          transform:translate3d(640px, 0, 0);
}

.img-btn{
  overflow: hidden;
  z-index: 2;
  position: relative;
  width: 100px;
  height: 36px;
  margin: 0 auto;
  background: transparent;
  color: #fff;
  text-transform: uppercase;
  font-size: 15px;
  cursor: pointer;
}

.img-btn:after{
  content: '';
  z-index: 2;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  border: 2px solid #fff;
  border-radius: 30px;
}

.img-btn span{
  position: absolute;
  left: 0;
  top: 0;
  display: -webkit-box;
  display: flex;
  -webkit-box-pack:center;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  -webkit-transition:-webkit-transform 1.2s;
  transition: -webkit-transform 1.2s;
  transition: transform 1.2s;
  transition: transform 1.2s, -webkit-transform 1.2s;;
}

.img-btn span.m-in{
  -webkit-transform:translateY(-72px);
          transform:translateY(-72px);
}

.cont.s-signup .img-btn span.m-in{
  -webkit-transform:translateY(0);
          transform:translateY(0);
}

.cont.s-signup .img-btn span.m-up{
  -webkit-transform:translateY(72px);
          transform:translateY(72px);
}

.sign-up{
  -webkit-transform:translate3d(-900px, 0, 0);
          transform:translate3d(-900px, 0, 0);
}

.cont.s-signup .sign-up{
  -webkit-transform:translate3d(0, 0, 0);
          transform:translate3d(0, 0, 0);
}

*{
  margin : 0;
  padding : 0;
  box-sizing: border-box;
  font-family: 'poppins',sans-serif;

}


  


section
{

  position:relative;
  max-width: 100%;
  background-color: transparent;
  border: 2px soild rgba(255,255,255,0,5);
  backdrop-filter: blur(55px);
  display:flex;
  justify-content: center;
  align-items: center;
}
.input_login input {
  width:100%;
  height:50px;
  background:transparent;
  border:none;
  outline: none;
  font-size: 1rem;
  padding:0 35px 0 5px;
  color:#000;


}
.btn-register p {
  color:white;
}

.register{
  width:100%;
  height:40px;
  border-radius:40px;
  background-color: rgb(255, 255, 255);
  outline:none;
  cursor:pointer;
  font-size:1rem;
  font-weight:600;
  transition:all 0.4 ease;

}


.input_Register input {
  width:100%;
  height: 50px;
  background:transparent;
  border:none;
  outline: none;
  font-size:1rem;
  padding:0 35px 0 5px;
  color:#000;

}

.input_login ion-icon{
  position:absolute;
  right:8px;
  color:#000;

  font-size:1.2rem;
  top: 20px

}
.input_Register ion-icon{
  position:absolute;
  right:8px;
  color:#000;

  font-size: 1.2rem;
  top: 20px;
}

.forget {
  margin:35px 0;
  font-size: 0.8rem;
  color:#000;

  display:flex;
  justify-content: space-between;


}
.login {
  margin:35px 0;
  font-size:0.8rem;
  color:#000;

  display:flex;
  justify-content: center;
}


h1{
  font-size:2rem;
  color:#000;

  text-align: center;

}

.input_login {
  position:relative;
  margin:30px 0;
  max-width: 310px;
  border-bottom: 2px solid #000;
}

.input_Register{
  position:relative;
  margin: 30px 0;
  max-width:310px;
  border-bottom: 2px solid #000;

}
.input_login label
{
  position:absolute;
  top:50%;
  left:5px;
  transform:translateY(-50%);
  color:#000;
  font-size:1rem;
  pointer-events: none;
  transition:all 0.5s ease-in-out;


}
.input_Register label 
{
  position: absolute;
  top :50%;
  left: 5px;
  transform: translateY(-50%);
  color:#000;
  font-size:1rem;
  pointer-events: none;
  transition:all 0.5s ease-in-out;
  

}

input:focus ~ label,
input:valid ~ label {
  top: -5px;
}

.forget label {
  display:flex;
  align-items: center;

}


.forget label input {
  margin-right:3px;

}
.login a{
  color:#000;
  text-decoration: none;
  font-weight: 600;

}
.login a:hover{
  text-decoration: underline;
}
.forget a{
  color:#000;
  text-decoration: none;
  font-weight:600;

}
.forget a:hover{
  text-decoration: underline;

}

button {
  width:100%;
  height:40px;
  border-radius:40px;
  background-color: rgb(0,0,0,1);
  outline:none;
  cursor:pointer;
  font-size:1rem;
  font-weight:600;
  transition:all 0.4 ease;

}


button:hover{
  background-color:rgb(255,255,255,0,5)

}
.register{
  font-size : 0.9 rem;
  color: #000;
  text-align: center;
  margin:25px 0 10px;
}

.register p a {
  text-decoration: none;
  color:#000;
  font-weight: 600;

}
.register p a:hover {
  text-decoration: underline;
}
.btn-login a {
  color:white;
  text-decoration: none;
  transition:0.5s;
  animation: icon-out 0.5 forwards;
  animation-timing-function: cubic-bezier(0.5, -0.6, 1, 1);

}



</style>
<header>
<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</header>
</body>
</html>
