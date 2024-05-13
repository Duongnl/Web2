<?php
class cart_model
{
    private $db_config;

    public function __construct()
    {
        $this->db_config = new db_config();
    }

    public function getCart()
    {
        $this->db_config->connect();
        $sql = "SELECT * FROM giohang";
        return $this->db_config->execute($sql);
    }

    public function getCartDetails($MaTK)
    {
        $this->db_config->connect();
        $sql = "SELECT giohang.MaTK, giohang.MaSP, giohang.SoLuong, giohang.MaSize, sanpham.TenSP, sanpham.GiaBan, anhchinh.Url, size.SoLuong AS SoLuongSize
                FROM giohang
                JOIN sanpham ON giohang.MaSP = sanpham.MaSP
                JOIN anhchinh ON sanpham.MaAnhChinh = anhchinh.MaAnhChinh
                JOIN size ON giohang.MaSize = size.MaSize AND giohang.MaSP = size.MaSP
                WHERE giohang.MaTK = '$MaTK'";

        $data = null;
        if ($result = $this->db_config->execute($sql)) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            mysqli_free_result($result);
        }
        return $data;
        // return $this->db_config->execute($sql);
    }

    public function updateQuantity($userId, $productId, $newQuantity, $size)
    {
        $this->db_config->connect();
        // Sử dụng điều kiện MaSize trong truy vấn SQL
        $update_quantity_sql = "UPDATE giohang SET SoLuong = '$newQuantity' WHERE MaTK = '$userId' AND MaSP = '$productId' AND MaSize = '$size'";
        $result = $this->db_config->execute($update_quantity_sql);
        // Kiểm tra kết quả và trả về true nếu cập nhật thành công, ngược lại trả về false
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteProduct($MaTK, $MaSP, $MaSize)
    {
        $this->db_config->connect();
        $sql = "DELETE FROM giohang WHERE MaTK = '$MaTK' AND MaSP = '$MaSP' AND MaSize = '$MaSize'";
        $result = $this->db_config->execute($sql);
        if ($result) {
            return true;
        }
        return false;
    }

    public function getDiscountedPrice($MaSP)
    {
        $this->db_config->connect();
        $sql = "SELECT sp.GiaBan * (1 - km.PhanTramKM/100) AS GiaBanSauKM
            FROM sanpham sp
            LEFT JOIN khuyenmai km ON sp.MaKM = km.MaKM
            WHERE sp.MaSP = '$MaSP'";

       return $this->db_config->execute($sql);
    
    }
    public function insertToHoadon($maTK, $thanhTien)
    { 
        $this->db_config->connect();
        $sql = "INSERT INTO hoadon (MaTK, ThanhToan, ThoiGian, TrangThai) VALUES ('$maTK', '$thanhTien', NOW(), 1)";
       return $this->db_config->execute($sql);
    
    }

    public function addToCTHoaDon($maTK, $GiaBanSauKM) {
        // Kết nối đến cơ sở dữ liệu
        $this->db_config->connect();
    
        // Lấy thông tin từ bảng hoadon
        $queryHoaDon = "SELECT MaHD FROM hoadon WHERE MaTK = '$maTK'";
        $resultHoaDon = $this->db_config->execute($queryHoaDon);
        $rowHoaDon = $resultHoaDon->fetch_assoc();
        $maHD = $rowHoaDon['MaHD'];
    
        // Lấy thông tin từ bảng giohang
        $queryGioHang = "SELECT * FROM giohang WHERE MaTK = '$maTK'";
        $resultGioHang = $this->db_config->execute($queryGioHang);
    
        // Thêm dữ liệu vào bảng cthoadon
        while ($rowGioHang = $resultGioHang->fetch_assoc()) {
            $maSP = $rowGioHang['MaSP'];
            $soLuong = $rowGioHang['SoLuong'];
            $maSize = $rowGioHang['MaSize'];
            
            // Tính ThanhTien
            $thanhTien = $soLuong * $GiaBanSauKM;
    
            // Thêm dữ liệu vào bảng cthoadon
            $queryInsert = "INSERT INTO cthoadon (MaHD, MaSP, SoLuong, DonGia, ThanhTien, MaSize)
                            VALUES ('$maHD', '$maSP', '$soLuong', '$GiaBanSauKM', '$thanhTien', '$maSize')";
            return $this->db_config->execute($queryInsert);
        }
    
    }
    
    
    
    
}
