<?php 
class donHangUser_model {
    private $db_config ;

    public function __construct() {
        $this->db_config =  new db_config();

    }

     function getDonHangByMaTK ($MaTK) {
       
        $this->db_config->connect();
        $sql = "SELECT *, hoadon.TrangThai as TrangThaiHD,hoadon.ThoiGian as ThoiGianHD FROM hoadon,khachhang,taikhoan WHERE taikhoan.MaTK='$MaTK' AND hoadon.MaTK = taikhoan.MaTK  AND hoadon.MaTK = khachhang.MaTK";
        return $this->db_config->execute($sql);
    }
    
 
//update
    function UpdateTrangThaiDonHang ($MaHD,$TrangThai ) {
        $this->db_config->connect();
        $sql = "UPDATE hoadon SET TrangThai = '$TrangThai' WHERE MaHD = '$MaHD' ";
        return  $this->db_config->execute($sql);
    }

// xoa du lieu 
    function deleteDonHangData ($maHD) {
        $this->db_config->connect();
        $sql = "DELETE FROM hoadon WHERE MaHD = '$maHD'";
        return  $this->db_config->execute($sql);
    }

    function filterDonHangFollowDate ($dateStart, $dateEnd ,$MaTK) {
        $this->db_config->connect();
        $sql = "SELECT *, hoadon.TrangThai as TrangThaiHD,hoadon.ThoiGian as ThoiGianHD
        FROM hoadon,khachhang,taikhoan
        WHERE taikhoan.MaTK= '$MaTK' AND hoadon.MaTK = taikhoan.MaTK  AND hoadon.MaTK = khachhang.MaTK
        AND hoadon.ThoiGian >= '$dateStart' AND hoadon.ThoiGian <= '$dateEnd'
        ORDER BY hoadon.MaHD ASC";
        return  $this->db_config->execute($sql);
    }   


}

