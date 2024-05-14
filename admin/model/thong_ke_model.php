<?php 
class thong_ke_model {
    private $db_config ;

    public function __construct() {
        $this->db_config =  new db_config();

    }

     function soLuongSPDaBanTrongKhoangThoiGian ($startDay, $endDay, $top) {
       
        $this->db_config->connect();
        $sql = "SELECT sanpham.TenSP,cthoadon.MaSP, SUM(cthoadon.SoLuong) AS TongSanPhamDaBan,
        SUM(cthoadon.ThanhTien) AS TienDaBan
        FROM cthoadon 
        JOIN hoadon ON cthoadon.MaHD = hoadon.MaHD 
        JOIN sanpham ON sanpham.MaSP = cthoadon.MaSP 
        WHERE";
        if ($startDay !='' && $endDay != '') {
            $sql.= " hoadon.ThoiGian >= '".$startDay."' AND hoadon.ThoiGian <= '".$endDay."' AND";
        }
        $sql.= " hoadon.TrangThai = 1
        GROUP BY cthoadon.MaSP
        ORDER BY TongSanPhamDaBan DESC
        LIMIT ".$top."
        ";

        return $this->db_config->execute($sql);
    }

    function getThongKeCTHD ($startDay, $endDay) {
        $this->db_config->connect();
        $sql = "SELECT hoadon.MaHD, sanpham.MaSP ,sanpham.TenSP, cthoadon.MaSize ,cthoadon.SoLuong, cthoadon.ThanhTien , hoadon.ThoiGian, cthoadon.DonGia FROM cthoadon  
        JOIN hoadon ON cthoadon.MaHD = hoadon.MaHD
        JOIN sanpham ON cthoadon.MaSP = sanpham.MaSP
        WHERE";
         if ($startDay !='' && $endDay != '') {
            $sql.= " hoadon.ThoiGian >= '".$startDay."' AND hoadon.ThoiGian <= '".$endDay."' AND";
        } 
        
        $sql.= " hoadon.TrangThai = 1 
        ORDER BY sanpham.MaSP ASC";
        
        
        return $this->db_config->execute($sql);
    }
    
 

}

