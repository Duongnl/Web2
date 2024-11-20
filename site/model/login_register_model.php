<?php 
class login_register_model {
    private $db_config ;

    public function __construct() {
        $this->db_config =  new db_config();

    }

     function checkUsernamePassword ($userName, $passWord) {
        $this->db_config->connect();
        $sql = "SELECT * FROM taikhoan WHERE taikhoan.TenTK = '$userName'  AND taikhoan.MatKhau = '$passWord' AND taikhoan.TrangThai =1";
        $query = $this->db_config->execute($sql);
        while( mysqli_fetch_array($query)) {
            return true;
        }
        return false;
    }

    function getTaiKhoan ($userName) {
        $this->db_config->connect();
        $sql = "SELECT * FROM taikhoan WHERE taikhoan.TenTK = '$userName'";
        return $this->db_config->execute($sql);
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

    function checkUsernameDangKy ($userName) {
            $this->db_config->connect();
            $sql = "SELECT * FROM taikhoan WHERE taikhoan.TenTK = '$userName'";
            $query = $this->db_config->execute($sql);
            while( mysqli_fetch_array($query)) {
                return false;
            }
            return true;
    }
    function checkEmailDangKy ($emailDK) {
        $this->db_config->connect();
        $sql = "SELECT * FROM taikhoan WHERE taikhoan.Email = '$emailDK'";
        $query = $this->db_config->execute($sql);
        while( mysqli_fetch_array($query)) {
            return false;
        }
        return true;
    }

    function checkPositionUserAdmin ($maTK) {
        $this->db_config->connect();
        $sql = "SELECT * FROM taikhoan, quyen WHERE taikhoan.MaQuyen = quyen.MaQuyen AND  quyen.TenQuyen = 'User' AND taikhoan.MaTK = '$maTK'";
        $query = $this->db_config->execute($sql);
        while( mysqli_fetch_array($query)) {
            return 'user';
        }
        return 'admin';
    }
    function addTaiKhoan($taikhoanDK,$emailDK,$passDK,$phonenumberDK,$addressDK){
        $this->db_config->connect();
        $thoiGian = date("Y-m-d");        
        $sql = "INSERT INTO taikhoan (MaTK, MaQuyen, TenTK,Email,SDT,MatKhau,ThoiGian,TrangThai) VALUES (null,1, '$taikhoanDK', '$emailDK', '$phonenumberDK', '$passDK', '$thoiGian', 1) ";
        
        return  $this->db_config->execute($sql);   
    
    }
    function addKhachHangTheoTaiKhoan($taikhoanDK,$nameuserDK,$address){
        $this->db_config->connect();
        $sql = "INSERT INTO khachhang (MaKH, MaTK, TenKH,DiaChi,TrangThai) VALUES (null,'$taikhoanDK', '$nameuserDK', '$address',1) ";
        return  $this->db_config->execute($sql); 
    }
    
}

