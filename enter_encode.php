<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .tieude{
            display:flex;
            justify-content: center;
            font-size:24px;
            font-weight: 600;
        }

        .enter_code {
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
        .enter_code{
        width:80%;
        }
        }
    </style>
</head>
<body>
    <div class="enter_code">
    <section>
        <form>
            <p class="tieude"> Enter Code  </p>
            <div class="input_Register">
                <ion-icon name="mail-outline"></ion-icon>
                <input type = "text" required placeholder="Code">
                <!-- <label for ="">Code</label> -->
            </div>
            <label > </label>
            <button class="btn-register"><p>Send </p></button>

        </form>
    </section>
</div>
</body>
</html>