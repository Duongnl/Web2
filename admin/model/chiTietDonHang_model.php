<?php 
class chiTietDonHang_model {
    private $db_config ;

    public function __construct() {
        $this->db_config =  new db_config();

    }

    function getChiTietDonHang ($maHD) {
        $this->db_config->connect();
        $sql = "SELECT *,cthoadon.SoLuong as ctSoLuong FROM cthoadon, sanpham WHERE cthoadon.MaSP = sanpham.MaSP AND cthoadon.MaHD =".$maHD;
        return $this->db_config->execute($sql);
    }
    function getChiTietDonHang_TaiKhoan ($maHD) {
        $this->db_config->connect();
        $sql = "SELECT *,hoadon.ThoiGian as ThoiGianHD,hoadon.ThanhToan as ThanhToan FROM taikhoan, khachhang,hoadon WHERE hoadon.MaTK = taikhoan.MaTK AND hoadon.MaTK = khachhang.MaTK AND hoadon.MaHD =".$maHD;
        return $this->db_config->execute($sql);
    }
    

    function updateSoLuong_updateTrangThai($maHD){
        $this->db_config->connect();
        $ctdn_md= new chiTietDonHang_model();
        if($ctdn_md->checkSoLuongList($maHD)){
            $sql = "SELECT * FROM cthoadon WHERE cthoadon.MaHD =".$maHD;
            $conn = $this->db_config->execute($sql);
            while ($row = mysqli_fetch_array($conn)){
                $ctdn_md->updateSoLuong($row['MaSP'], $row['SoLuong'],$row['MaSize']);
            }
            return true;
        } else {
            return false;
        }
    }
    function updateSoLuong($maSP,$soLuong,$size){
        $this->db_config->connect();
        $sql1 = "SELECT * FROM size WHERE MaSP= " . $maSP . " AND MaSize='" . $size . "'";
        $conn1 = $this->db_config->execute($sql1);
        $row1 = mysqli_fetch_array($conn1);
        $soLuongUpdate=$row1['SoLuong'] - $soLuong;

        $sql2 = "UPDATE size SET SoLuong = '$soLuongUpdate' WHERE MaSP= " . $maSP . " AND MaSize='" . $size . "' ";
        $this->db_config->execute($sql2);

    }

    function checkSoLuongList($maHD){
        $this->db_config->connect();
        $sql = "SELECT * FROM cthoadon WHERE cthoadon.MaHD =".$maHD;
        $conn = $this->db_config->execute($sql);
        $ctdn= new chiTietDonHang_model();
        while ($row = mysqli_fetch_array($conn)){
            $maSP = $row['MaSP'];
            $soLuong = $row['SoLuong'];
            $maSize = $row['MaSize'];
            if($ctdn->checkSoLuongSanPham($maSP, $soLuong,$maSize) == false){
                return false;
            }
        }
        return true;
    }


    function checkSoLuongSanPham($maSP,$soLuong,$size){
        $this->db_config->connect();
        $sql = "SELECT * FROM size WHERE MaSP= " . $maSP . " AND MaSize='" . $size . "'";
        $conn = $this->db_config->execute($sql);
        $row = mysqli_fetch_array($conn);
        if($soLuong<=$row['SoLuong']){
            return true;
        }
        return false;
    }
   
    

}

