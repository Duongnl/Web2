<?php 
    session_start();

    if(isset($_POST['xulylogin']))
    {
        include 'connect.php';
        $username= $_POST('input_user');
        $password= $_POST ('input_pass');

        // ma hoa pass
        $password = md5($password);

        // kiem tra user va pass co dung k

        $query = "SELECT username , password FROM  WHERE username="$username"";
        $rs = mysqli_query($connect, $query) or die (mysqli_query($connect));
        

        if (!$rs)
        {
            echo "Username or password không chính xác !";
        }
        else 
        {
            echo "Login Success";
        }
    }

?>