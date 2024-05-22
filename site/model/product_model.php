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
        LEFT JOIN anhchinh ON sanpham.MaAnhChinh = anhchinh.MaAnhchinh
        WHERE sanpham.TrangThai = 1
        ;";
        return $this->db_config->execute($sql);
    }

    function getAllProductFollowName ($tenSP,$maDM) {
        $this->db_config->connect();
        $sql = "SELECT sanpham.*, khuyenmai.*, anhchinh.* 
        FROM sanpham 
        LEFT JOIN khuyenmai ON sanpham.MaKM = khuyenmai.MaKM 
        LEFT JOIN anhchinh ON sanpham.MaAnhChinh = anhchinh.MaAnhchinh 
        WHERE sanpham.TrangThai = 1 AND ";
        if ($tenSP !='') {
            $sql.= " sanpham.TenSP LIKE '%".$tenSP."%'";
        } else if ($maDM != '') {
            $sql.= " sanpham.MaDM = ".$maDM."";
        }
        return $this->db_config->execute($sql);
    }
    function getProductFollowPageName ($fromIndex,$tenSP, $maDM) {
        $this->db_config->connect();
        $sql = "SELECT sanpham.*, khuyenmai.*, anhchinh.* 
        FROM sanpham 
        LEFT  JOIN khuyenmai ON sanpham.MaKM = khuyenmai.MaKM 
        LEFT JOIN anhchinh ON sanpham.MaAnhChinh = anhchinh.MaAnhchinh
        WHERE sanpham.TrangThai = 1 AND"; 

        if ($tenSP !='') {
            $sql.= " sanpham.TenSP LIKE '%".$tenSP."%'";
        } else if ($maDM != '') {
            $sql.= " sanpham.MaDM = ".$maDM."";
        }
        $sql.= " LIMIT 12 OFFSET ".$fromIndex;
        return $this->db_config->execute($sql);
    }

    function getProductFollowPage ($fromIndex) {
        $this->db_config->connect();
        $sql = "SELECT sanpham.*, khuyenmai.*, anhchinh.* 
        FROM sanpham 
        LEFT  JOIN khuyenmai ON sanpham.MaKM = khuyenmai.MaKM 
        LEFT JOIN anhchinh ON sanpham.MaAnhChinh = anhchinh.MaAnhchinh
        WHERE sanpham.TrangThai = 1 
        LIMIT 12 OFFSET ".$fromIndex;
        return $this->db_config->execute($sql);
    }

    function filterProduct ($maDM, $startPrice, $endPrice, $gioiTinh, $maSize, $sale,$fromIndex,$tenSP) {
        $this->db_config->connect();
        $sql = "SELECT *,   CASE 
        WHEN sanpham.MaKM IS NOT NULL THEN sanpham.GiaBan - (sanpham.GiaBan * khuyenmai.PhanTramKM / 100)
        ELSE sanpham.GiaBan
        END 
        AS GiaCuoiCung
        FROM sanpham
        JOIN danhmuc ON sanpham.MaDM = danhmuc.MaDM
        JOIN size ON sanpham.MaSP = size.MaSP
        JOIN anhchinh ON sanpham.MaAnhChinh = anhchinh.MaAnhchinh
        LEFT JOIN khuyenmai ON sanpham.MaKM = khuyenmai.MaKM  
        ";
        // $sql .= " WHERE GiaCuoiCung >= '$startPrice' AND GiaCuoiCung <= '$endPrice'";
        $sql.=" WHERE sanpham.TrangThai = 1 AND 
        (CASE 
            WHEN sanpham.MaKM IS NOT NULL THEN sanpham.GiaBan - (sanpham.GiaBan * khuyenmai.PhanTramKM / 100)
            ELSE sanpham.GiaBan
        END) >= '$startPrice' 
    AND 
        (CASE 
            WHEN sanpham.MaKM IS NOT NULL THEN sanpham.GiaBan - (sanpham.GiaBan * khuyenmai.PhanTramKM / 100)
            ELSE sanpham.GiaBan
        END) <= '$endPrice'";
       
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
        }if ($tenSP != '') {
            $sql.= " AND sanpham.TenSP LIKE '%".$tenSP."%'";
        }
        $sql.= " GROUP BY sanpham.MaSP  LIMIT 12 OFFSET ".$fromIndex;
        return $this->db_config->execute($sql);
    }

    function filterAllProduct ($maDM, $startPrice, $endPrice, $gioiTinh, $maSize, $sale,$tenSP) {
        $this->db_config->connect();
        $sql = "SELECT *,
        CASE 
        WHEN sanpham.MaKM IS NOT NULL THEN sanpham.GiaBan - (sanpham.GiaBan * khuyenmai.PhanTramKM / 100)
        ELSE sanpham.GiaBan
        END 
        AS GiaCuoiCung
         FROM sanpham
        JOIN danhmuc ON sanpham.MaDM = danhmuc.MaDM
        JOIN size ON sanpham.MaSP = size.MaSP
        JOIN anhchinh ON sanpham.MaAnhChinh = anhchinh.MaAnhchinh
        LEFT JOIN khuyenmai ON sanpham.MaKM = khuyenmai.MaKM 
        ";
        
        // $sql .= " WHERE sanpham.GiaBan >= '$startPrice' AND sanpham.GiaBan <= '$endPrice'";
        $sql.=" WHERE sanpham.TrangThai = 1 AND 
        (CASE 
            WHEN sanpham.MaKM IS NOT NULL THEN sanpham.GiaBan - (sanpham.GiaBan * khuyenmai.PhanTramKM / 100)
            ELSE sanpham.GiaBan
        END) >= '$startPrice' 
    AND 
        (CASE 
            WHEN sanpham.MaKM IS NOT NULL THEN sanpham.GiaBan - (sanpham.GiaBan * khuyenmai.PhanTramKM / 100)
            ELSE sanpham.GiaBan
        END) <= '$endPrice'";
       
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
        }if ($tenSP != '') {
            $sql.= " AND sanpham.TenSP LIKE '%".$tenSP."%'";
        }
        $sql.= " GROUP BY sanpham.MaSP  ";
        return $this->db_config->execute($sql);
    }
    
    function getPhanTramKhuyenMai($maKhuyenMai) {
        $this->db_config->connect();
        $sql = "SELECT * from khuyenmai WHERE MaKM = '$maKhuyenMai' AND TrangThai = 1";
        $rs = $this->db_config->execute($sql);
        if ($rs) {
          $row = mysqli_fetch_array($rs);
          return isset($row["PhanTramKM"]) ? $row["PhanTramKM"]: null ;
        }
      }

}

