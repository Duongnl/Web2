<?php 
class product_model {
    private $db_config ;

    public function __construct() {
        $this->db_config =  new db_config();

    }

    function getAllProduct () {
        $this->db_config->connect();
        $sql = "SELECT sanpham.*, khuyenmai.*, anhchinh.* 
        FROM sanpham 
        LEFT  JOIN khuyenmai ON sanpham.MaKM = khuyenmai.MaKM 
        LEFT JOIN anhchinh ON sanpham.MaAnhChinh = anhchinh.MaAnhchinh;";
        return $this->db_config->execute($sql);
    }

    function getProductFollowPage ($fromIndex) {
        $this->db_config->connect();
        $sql = "SELECT sanpham.*, khuyenmai.*, anhchinh.* 
        FROM sanpham 
        LEFT  JOIN khuyenmai ON sanpham.MaKM = khuyenmai.MaKM 
        LEFT JOIN anhchinh ON sanpham.MaAnhChinh = anhchinh.MaAnhchinh
        LIMIT 12 OFFSET ".$fromIndex;
        return $this->db_config->execute($sql);
    }

    function filterProduct ($maDM, $startPrice, $endPrice, $gioiTinh, $maSize, $sale,$fromIndex) {
        $this->db_config->connect();
        $sql = "SELECT * FROM sanpham
        JOIN danhmuc ON sanpham.MaDM = danhmuc.MaDM
        JOIN size ON sanpham.MaSP = size.MaSP
        JOIN anhchinh ON sanpham.MaAnhChinh = anhchinh.MaAnhchinh
        LEFT JOIN khuyenmai ON sanpham.MaKM = khuyenmai.MaKM 
        ";
        
        $sql .= " WHERE sanpham.GiaBan >= '$startPrice' AND sanpham.GiaBan <= '$endPrice'";
       
        if ($gioiTinh != 0) {
            $sql.= "AND sanpham.GioiTinh = '$gioiTinh'";
        } 
        if ($maDM != 0 ) {
            $sql.= "AND sanpham.MaDM = '$maDM'";
        } 
        if ($maSize !=0) {
            $sql.= "AND size.MaSize = '$maSize'";
        } 
        if ($sale == 'true') {
            $sql.= "AND sanpham.MaKM is not NULL";
        }
        $sql.= " GROUP BY sanpham.MaSP  LIMIT 12 OFFSET ".$fromIndex;
        return $this->db_config->execute($sql);
    }

    function filterAllProduct ($maDM, $startPrice, $endPrice, $gioiTinh, $maSize, $sale,) {
        $this->db_config->connect();
        $sql = "SELECT * FROM sanpham
        JOIN danhmuc ON sanpham.MaDM = danhmuc.MaDM
        JOIN size ON sanpham.MaSP = size.MaSP
        JOIN anhchinh ON sanpham.MaAnhChinh = anhchinh.MaAnhchinh
        LEFT JOIN khuyenmai ON sanpham.MaKM = khuyenmai.MaKM 
        ";
        
        $sql .= " WHERE sanpham.GiaBan >= '$startPrice' AND sanpham.GiaBan <= '$endPrice'";
       
        if ($gioiTinh != 0) {
            $sql.= "AND sanpham.GioiTinh = '$gioiTinh'";
        } 
        if ($maDM != 0 ) {
            $sql.= "AND sanpham.MaDM = '$maDM'";
        } 
        if ($maSize !=0) {
            $sql.= "AND size.MaSize = '$maSize'";
        } 
        if ($sale == 'true') {
            $sql.= "AND sanpham.MaKM is not NULL";
        }
        $sql.= " GROUP BY sanpham.MaSP  ";
        return $this->db_config->execute($sql);
    }
    

}

