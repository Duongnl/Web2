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
          <form method="post" action="login_register.php " class="xulylogin" style="width:500px">
            <h1>Register</h1>
            <div class="row">
                  <div class="col-6">
                    <div class="input_Register">
                      <ion-icon name="person-outline"></ion-icon>
                      <input type="text" id="input_user" name="taikhoan" placeholder='User' required>
                    </div>

                    <div class="input_Register">
                      <ion-icon name="mail-outline"></ion-icon>
                      <input type="email" id="input_email" name="Email" placeholder='Email' required>
                    </div>


                    <div class="input_Register">
                      <ion-icon name="call-outline"></ion-icon>
                      <input  type="text" id="input_phonenumber" name="phone" placeholder='Phone Number' required min="10" max="10">
                    </div>

                  </div>
                  <div class="col-6">
                    <div class="input_Register">
                      <ion-icon name="key-outline"></ion-icon>
                      <input id="input_pass" name="input_pass" type="password" placeholder="Password" required min="5">
                    </div>  

                    <div class="input_Register">
                      <ion-icon name="pencil-outline"></ion-icon>
                      <input id="input_nameuser" name="input_nameuser" type="text" placeholder="Name User" required>
                    </div> 

                    <div class="input_Register">
                      <ion-icon name="home-outline"></ion-icon>
                      <input id="input_address" name="input_address" type="text" placeholder="Address" required>
                    </div>

                  </div>
            </div>
            <div class="login">
              <label for="">Already have an account? <a href="#" class="buttonlogin">Login</a> </label>
            </div>
            <!-- <label> </label> -->
            <input id="memo" value=""></input>
            <button class="btn-register" id="dangky" type="button">
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
    // đăng ký
    $('#dangky').click(function() {

      var taikhoan_dangky = document.getElementById('input_user').value;
      var email_dangky = document.getElementById('input_email').value;
      var phonenumber_dangky =document.getElementById('input_phonenumber').value;
      var pass_dangky =document.getElementById('input_pass').value;
      var address_dangky =document.getElementById('input_address').value;
      var nameuser_dangky =document.getElementById('input_nameuser').value;
      var boolean=1;
      if(taikhoan_dangky.trim()==""){
        alert("Không được để trống tài khoản");
        boolean=0;
      }
      var gmailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

      if(email_dangky.trim()==""){
        alert("Không được để trống email");
        boolean=0;
      }
      if(!gmailPattern.test(email_dangky)) {
        alert("Địa chỉ email phải là định dạng '@gmail.com'!");
        boolean=0;
      }
      if(phonenumber_dangky.trim()==""){
        alert("Không được để trống SDT");
        boolean=0;
      }else if (phonenumber_dangky.length !== 10) {
        alert("Số điện thoại phải có 10 ký tự!");
        boolean=0;
      }else if (phonenumber_dangky.charAt(0) !== "0") {
        alert("Số điện thoại phải bắt đầu bằng số 0!");
        boolean=0;
      }else if (!(/^\d+$/.test(phonenumber_dangky))) {
        alert("Số điện thoại chỉ được chứa các ký tự số!");
        boolean=0;
      }

      

    // Kiểm tra xem ký tự đầu tiên có phải là số 0 không
    

    // Kiểm tra xem giá trị có chứa ký tự không phải số không
    

      if(pass_dangky.trim()==""){
        alert("Không được để trống mật khẩu");
        boolean=0;
      }
      if(address_dangky.trim()==""){
        alert("Không được để trống địa chỉ");
        boolean=0;
      }
      if(nameuser_dangky.trim()==""){
        alert("Không được để trống tên tài khoản");
        boolean=0;
      }
      


      if(boolean==1){
        $.post("./site/controller/login_register_controller.php", {
          taikhoanDK: taikhoan_dangky,
          emailDK:email_dangky,
          passDK: pass_dangky,
          phonenumberDK:phonenumber_dangky,
          addressDK:address_dangky,
          nameuserDK:nameuser_dangky,
        },

        function(data, status) {
          if(data!=""){
            alert(data);
          }else{
            alert("Đăng ký thành công");
            window.location.href = '<?php echo $url. '/login' ?>'
          }
        });
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

