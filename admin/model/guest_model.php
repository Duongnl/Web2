<?php 
class guest_model {
    private $db_config ;

    public function __construct() {
        $this->db_config =  new db_config();

    }

     function getGuestData() {
        $this->db_config->connect();
        $sql = "SELECT * FROM khachhang,taikhoan WHERE khachhang.MaTK = taikhoan.MaTK AND taikhoan.TrangThai <> 2  ";
        return $this->db_config->execute($sql);
    }
    
    function insertGuestData ($maTK,$tenKH,$diaChi,$trangThai) {

        $this->db_config->connect();

        $sql = "INSERT INTO khachhang ( MaKH, MaTK ,TenKH, DiaChi,TrangThai) VALUES (null,'$maTK','$tenKH','$diaChi','$trangThai') ";
        return  $this->db_config->execute($sql);
    }

    function UpdateGuestData ( $maKH, $tenKH, $diaChi , $trangThai) {
        $this->db_config->connect();
        $sql = "UPDATE khachhang SET TenKH = '$tenKH', DiaChi ='$diaChi', TrangThai = '$trangThai'  WHERE MaKH = '$maKH' ";
        return  $this->db_config->execute($sql);
    }

    function DeleteStaffData ($maKH) {
        $this->db_config->connect();
        $sql = "DELETE FROM khachhang WHERE MaKH = '$maKH'";
        return  $this->db_config->execute($sql);
    }
    function SearchMaTK ($maKH)
    {
        $this->db_config->connect();
        $sql = "SELECT MaTK FROM khachhang WHERE khachhang.MaKH = '$maKH' ";
        return $this->db_config->execute ($sql);
    }


}



