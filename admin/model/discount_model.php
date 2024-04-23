<?php 
class discount_model {
    private $db_config ;

    public function __construct() {
        $this->db_config =  new db_config();

    }

     function getdiscountData () {
        $this->db_config->connect();
        $sql = "SELECT * FROM khuyenmai";
        return $this->db_config->execute($sql);
    }
    
    function insertdiscountData ( $tenKM, $phantramKM, $trangThai) {

        $this->db_config->connect();
        $sql = "INSERT INTO khuyenmai (TenKM, PhanTramKM, TrangThai) VALUES ('$tenKM', '$phantramKM', '$trangThai') ";
        return  $this->db_config->execute($sql);
       
    }

    function UpdatediscountData ($maKM,$tenKM, $phantramKM ) {
        $this->db_config->connect();
        $sql = "UPDATE khuyenmai SET TenKM = '$tenKM' AND PhanTramKM = '$phantramKM' WHERE MaKM = '$maKM' ";
        return  $this->db_config->execute($sql);
    }

    // xoa du lieu 
    function DeletediscountData ($maKM) {
        $this->db_config->connect();
        $sql = "DELETE FROM khuyenmai WHERE MaKM = '$maKM'";    
        return  $this->db_config->execute($sql);
    }

}

