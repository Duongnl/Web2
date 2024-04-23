<?php 
class chiTietDonHang_model {
    private $db_config ;

    public function __construct() {
        $this->db_config =  new db_config();

    }

     function getChiTietDonHang ($maHD) {
       
        $this->db_config->connect();
        $sql = "SELECT * FROM cthoadon, sanpham,khachhang,hoadon WHERE hoadon.MaTK = khachhang.MaTK AND cthoadon.MaSP = sanpham.MaSP AND cthoadon.MaHD =".$maHD;
        return $this->db_config->execute($sql);
    }
    
    

}

