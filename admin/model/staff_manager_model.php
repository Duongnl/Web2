<?php 
class staff_manager_model {
    private $db_config ;

    public function __construct() {
        $this->db_config =  new db_config();

    }

     function getStaffData() {
        $this->db_config->connect();
        $sql = "SELECT *, taikhoan.TrangThai as TrangThaiTK FROM nhanvien,taikhoan,quyen WHERE nhanvien.MaTK = taikhoan.MaTK AND taikhoan.MaQuyen =quyen.MaQuyen AND taikhoan.TrangThai <> 2  ";
        return $this->db_config->execute($sql);
    }
    
    function insertStaffData ($maTK,$tenNV,$diaChi,$trangThai) {

        $this->db_config->connect();
        $sql = "INSERT INTO nhanvien (  MaTK ,TenNV, DiaChi,TrangThai) VALUES ('$maTK','$tenNV','$diaChi','$trangThai') ";
        return  $this->db_config->execute($sql);
    }

    function UpdateStaffData ( $maNV , $tenNV, $diaChi , $trangThai) {
        $this->db_config->connect();
        $sql = "UPDATE nhanvien SET  TenNV = '$tenNV', DiaChi ='$diaChi', TrangThai = '$trangThai'  WHERE MaNV = '$maNV' ";
        return  $this->db_config->execute($sql);
    }

    function DeleteStaffData ($maNV) {
        $this->db_config->connect();
        $sql = "DELETE FROM nhanvien WHERE MaNV = '$maNV'";
        return  $this->db_config->execute($sql);
    }
    function SearchMaTK ($maNV)
    {
        $this->db_config->connect();
        $sql = "SELECT MaTK FROM nhanvien WHERE nhanvien.MaNV = '$maNV' ";
        return $this->db_config->execute ($sql);

    }

    

}



