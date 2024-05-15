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

    function thongKeTinhHinhKinhDoanh ($month) {
        $this->db_config->connect();
        $monthString = date('Y') . '-' . str_pad($month, 2, '0', STR_PAD_LEFT);

        // $sql = "SELECT sanpham.MaSP ,sanpham.TenSP ,SUM(cthoadon.ThanhTien) AS TienDaBan, hoadon.ThoiGian
        // FROM cthoadon
        // JOIN hoadon ON cthoadon.MaHD = hoadon.MaHD
        // RIGHT JOIN sanpham ON cthoadon.MaSP = sanpham.MaSP
        // WHERE hoadon.TrangThai = 1 AND hoadon.ThoiGian LIKE '%".$monthString."%'
        // GROUP BY cthoadon.MaSP
        // ORDER BY hoadon.ThoiGian ASC
        //  ";

        $sql = "SELECT sanpham.MaSP, sanpham.TenSP, hoadon.ThoiGian, COALESCE(SUM(cthoadon.ThanhTien), 0) AS DoanhThu 
        FROM sanpham 
        LEFT JOIN cthoadon ON sanpham.MaSP = cthoadon.MaSP 
        LEFT JOIN hoadon ON cthoadon.MaHD = hoadon.MaHD 
        AND hoadon.TrangThai = 1 
        GROUP BY sanpham.MaSP, hoadon.ThoiGian 
        ORDER BY sanpham.TenSP ASC, 
        hoadon.ThoiGian ASC;
        ";
        return $sql;
    }

    function getAllProduct ($maDM) {
        $this->db_config->connect();
        $sql = "SELECT sanpham.MaSP, sanpham.TenSP FROM sanpham ";
        if ($maDM != 0) {
            $sql.= " , danhmuc WHERE sanpham.MaDM = danhmuc.MaDM AND danhmuc.MaDM =  '$maDM'";
        }
        return $this->db_config->execute($sql);
    }
    
    function getProductDoanhThu($maSP, $month) {
        $this->db_config->connect();
        $monthString = date('Y') . '-' . str_pad($month, 2, '0', STR_PAD_LEFT);
        $sql = "SELECT sanpham.MaSP, sanpham.TenSP, hoadon.ThoiGian AS ThoiGianHD, COALESCE(SUM(cthoadon.ThanhTien), 0) AS DoanhThu 
        FROM sanpham 
        LEFT JOIN cthoadon ON sanpham.MaSP = cthoadon.MaSP 
        LEFT JOIN hoadon ON cthoadon.MaHD = hoadon.MaHD 
        WHERE hoadon.TrangThai = 1 AND sanpham.MaSP = '$maSP' AND hoadon.ThoiGian LIKE '%".$monthString."%'
        GROUP BY sanpham.MaSP, hoadon.ThoiGian 
        ORDER BY sanpham.TenSP ASC, hoadon.ThoiGian ASC";
        return $this->db_config->execute($sql);
    }
 

}

