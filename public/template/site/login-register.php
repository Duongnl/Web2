<?php 
$url = handle_url::getUrl();
?>
  <div class="signinandout">
    <div class="cont">
      <div class="form sign-in">
        <section>
          <form method="post" action="login_register.php " class="xulylogin">
            <h1>Login</h1>
            <div class="input_login">
              <ion-icon name="mail-outline"></ion-icon>
              <input type="text" name="input_user" placeholder='User' required>
              <!-- <label for="">User</label> -->
            </div>
            <div class="input_login">
              <ion-icon name="lock-closed-outline"></ion-icon>
              <input type="password" name="input_pass" value="" placeholder="Password" required ">
                <!-- <label for="">Password</label> -->

            </div>
            <div class=" forget">
              <label for="">
                <input type="checkbox"> Remember
              </label>
              <a href="<?php  echo $url.'/forgot' ?>">Forgot Password</a>
            </div>
            <button class="btn-login"><a href="#">Login</a></button>
            <button class="register">
              Register
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
            <p>Nếu có rồi thì đăng nhập thôi </p>
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
                <input type="text" placeholder="User" required>
                <!-- <label for ="">User Name</label> -->
              </div>
              <div class="input_Register">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="email" placeholder="Email" required>
                <!-- <label for ="">Email</label> -->
              </div>
              <div class="input_Register">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="text" placeholder="Phone Number" required>
                <!-- <label for ="">Phone Number</label> -->
              </div>
              <div class="input_Register">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" placeholder="Password" required>
                <!-- <label for ="">Password</label> -->
              </div>
              <div class="login">
                <label for="">Already have an account? <a href="#" class="buttonlogin">Login</a> </label>
              </div>
              <label> </label>
              <button class="btn-register">
                <p>Register</p>
              </button>

            </form>
          </section>
        </div>
      </div>
    </div>
  </div>
  <script>
document.querySelector('.img-btn').addEventListener('click', function() {
  document.querySelector('.cont').classList.toggle('s-signup')
});

document.querySelector('.register').addEventListener('click', function() {
  document.querySelector('.cont').classList.toggle('s-signup');
});
document.querySelector('.buttonlogin').addEventListener('click', function() {
  document.querySelector('.cont').classList.toggle('s-signup')
});
  </script>