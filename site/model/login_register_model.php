<?php 
class login_register_model {
    private $db_config ;

    public function __construct() {
        $this->db_config =  new db_config();

    }

     function checkUsernamePassword ($userName, $passWord) {
        $this->db_config->connect();
        $sql = "SELECT * FROM taikhoan WHERE taikhoan.TenTK = '$userName'  AND taikhoan.MatKhau = '$passWord'";
        $query = $this->db_config->execute($sql);
        while( mysqli_fetch_array($query)) {
            return true;
        }
        return false;
    }

    function checkUsername ($userName) {
        $this->db_config->connect();
        $sql = "SELECT * FROM taikhoan WHERE taikhoan.TenTK = '$userName'";
        $query = $this->db_config->execute($sql);
        while( mysqli_fetch_array($query)) {
            return true;
        }
        return false;
    }

}

