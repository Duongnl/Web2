<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/css/forgot.css">
    <style>
        .tieude{
            display:flex;
            justify-content: center;
            font-size:24px;
            font-weight: 600;
        }
        .forgot_pass {
            border-radius: 45px;
            width: 30%;
            height: 550px;
            background: #fff;
            box-shadow: 0 19px 38px rgba(0, 0, 0, 0.30), 0 15px 12px rgba(0, 0, 0, 0.22);
            justify-content: center;
            display: flex;
            align-items: center;
        }
        @media (max-width: 900px){
        .forgot_pass{
        width:80%;
        }
        }
    </style>
</head>
<body>
    <div class="forgot_pass">
    <section>
        <form>
            <p class="tieude"> Forgot password </p>
            <div class="input_Register">
                <ion-icon name="mail-outline"></ion-icon>
                <input id="ip_user" type = "email" value =""  placeholder="Email"  required>
                <!-- <label for ="">Email</label> -->
            </div>
            <label > </label>
            <button class="btn-register"><p>Forgot password </p></button>

        </form>
    </section>
</div>
</body>
<script>
    window.onload= function()
    {
        document.getElementsById("ip_user").value="";
    };

</script>
</html>