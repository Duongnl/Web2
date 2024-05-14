<?php

$url = handle_url::getUrl();
?>
<style>
  #memo-taikhoan,
  #memo-matkhau {
    color: #DB4444;
    font-size: 13px;
    border: 0;
    width: 300px;
  }
</style>
<div class="signinandout">
  <div class="cont">

    <!-- Đăng nhập -->
    <div class="form sign-in">
      <section>
        <form method="post" action="login_register.php " class="xulylogin">
          <h1>Login</h1>

          <!-- Nhập tài khoản -->
          <div class="input_login" style="margin-bottom: 0px;">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="text" id="taikhoan" name="taikhoan" placeholder='User' required>
          </div>
          <input type="text" id="memo-taikhoan" value="" disabled></input>

          <!-- nhập mật khẩu -->
          <div class="input_login" style=" margin-top: 15px;margin-bottom: 0px;">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input type="password" id ="matkhau" name="matkhau" value="" placeholder="Password" required >
          </div>
          <input  type=" text" id="memo-matkhau" value="" disabled></input>

            <div class=" forget">
              <label for="">
                <input type="checkbox"> Remember
              </label>
              <a href="<?php echo $url . '/forgot' ?>">Forgot Password</a>
            </div>

            <!-- button đăng nhập -->
            <button  type="button" class="btn-login" id="dangnhap" >Login</button>

            <button class="register">
              Register
            </button>

        </form>
      </section>
    </div>

    <!-- Đăng ký -->
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
          <form method="post" action="login_register.php " class="xulylogin">
            <h1>Register</h1>
            <div class="input_Register">
              <ion-icon name="mail-outline"></ion-icon>
              <input name="input_user" type="text" placeholder="User" required>
              <!-- <label for ="">User Name</label> -->
            </div>
            <div class="input_Register">
              <ion-icon name="mail-outline"></ion-icon>
              <input name="input_email" type="email" placeholder="Email" required>
              <!-- <label for ="">Email</label> -->
            </div>
            <div class="input_Register">
              <ion-icon name="mail-outline"></ion-icon>
              <input name="input_phonenumber" type="text" placeholder="Phone Number" required>
              <!-- <label for ="">Phone Number</label> -->
            </div>
            <div class="input_Register">
              <ion-icon name="lock-closed-outline"></ion-icon>
              <input name="input_pass" type="password" placeholder="Password" required>
              <!-- <label for ="">Password</label> -->
            </div>
            <div class="login">
              <label for="">Already have an account? <a href="#" class="buttonlogin">Login</a> </label>
            </div>
            <!-- <label> </label> -->
            <input id="memo" value=""></input>
            <button class="btn-register">
              Register
            </button>

          </form>
        </section>
      </div>
    </div>


  </div>
</div>
<script>
  $(document).ready(function() {

    $('#dangnhap').click(function() {
      console.log("có vào");
      var taikhoan_data = document.getElementById('taikhoan').value;
      var matkhau_data = document.getElementById('matkhau').value;
      var memo_taikhoan =document.getElementById('memo-taikhoan');
      var memo_matkhau =document.getElementById('memo-matkhau');
      var flag = true;
      var memo = {}; 
      if (taikhoan_data == "") {
        memo['memo_taikhoan'] = 'Tài khoản không được để trống';
        flag =false;
      } else {
        memo['memo_taikhoan'] = '';
      } 

      if (matkhau_data == "") {
        memo['memo_matkhau'] = 'Mật khẩu không được để trống';
        flag =false;
      } else {
        memo['memo_matkhau'] = '';
      }

      if (flag == true) {
        $.post("./site/controller/login_register_controller.php", {
          taikhoan: taikhoan_data,
          matkhau: matkhau_data,
        },

        function(data, status) {
            if (data == 'Wrong password') {
              memo_taikhoan.value = "";
              memo_matkhau.value = "Wrong password";
            } else if (data == "Account does not exist"){
              memo_taikhoan.value = "Account does not exist";
              memo_matkhau.value = "";
            } else if (data == "correct") {
            
              window.location.href = '<?php echo $url; ?>'
            }
        });
      } else {
        memo_taikhoan.value = memo['memo_taikhoan'];
        memo_matkhau.value = memo['memo_matkhau'];
      }

     

    });

  });
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

