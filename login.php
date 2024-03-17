<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

</head>
<body>
    <section>
        <form>
            <h1>Login</h1>
            <div class="input_login">
                <ion-icon name="mail-outline"></ion-icon>
                <input type ="email" required>
                <label for="">User</label>
            </div>
            <div class="input_login">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" required>
                <label for="">Password</label>

            </div>
            <div class="forget">
                <label for ="">
                    <input type ="checkbox"> Remember
                </label>
                <a href="#" >Forget Password</a>
            </div>
            <button class="btn-login"><p>Login</p></button>
            <button class="register">
                <p> Register</p>
            </button>
        </form>

    </section>
</body>
</html>