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
        $sql = "INSERT INTO hoadon (MaTK, ThanhToan, ThoiGian, TrangThai) VALUES ('$maTK', '$thanhTien', NOW(), 0)";
       return $this->db_config->execute($sql);
    
    }

    public function addToCTHoaDon($maTK) {
        // Kết nối đến cơ sở dữ liệu
        $this->db_config->connect();
        $queryHoaDon = "SELECT MaHD FROM hoadon WHERE MaTK = '$maTK'";
        $resultHoaDon = $this->db_config->execute($queryHoaDon);
    while ($rowhoadon = $resultHoaDon->fetch_assoc()){
        $maHD = $rowhoadon['MaHD'];
        echo $maHD;
    }

        // Lấy thông tin từ bảng hoadon
    
       

        // Lấy thông tin từ bảng giohang
        $queryGioHang = "SELECT * FROM giohang WHERE MaTK = '$maTK'";
        $resultGioHang = $this->db_config->execute($queryGioHang);
    
        // Thêm dữ liệu vào bảng cthoadon
        while ($rowGioHang = $resultGioHang->fetch_assoc()) {
            $maSP = $rowGioHang['MaSP'];
            $soLuong = $rowGioHang['SoLuong'];
            $maSize = $rowGioHang['MaSize'];
    
            // Truy vấn MaKM từ bảng sản phẩm
            $queryMaKM = "SELECT MaKM FROM sanpham WHERE MaSP = '$maSP'";
            $resultMaKM = $this->db_config->execute($queryMaKM);
            $rowMaKM = $resultMaKM->fetch_assoc();
    
            // Kiểm tra nếu sản phẩm có MaKM
            if ($rowMaKM['MaKM'] != null) {
                // Truy vấn giá sau khi đã áp dụng khuyến mãi
                $queryGiaKM = "SELECT GiaBan * (1 - km.PhanTramKM/100) AS GiaBanSauKM FROM sanpham sp
                                LEFT JOIN khuyenmai km ON sp.MaKM = km.MaKM
                                WHERE sp.MaSP = '$maSP'";
                $resultGiaKM = $this->db_config->execute($queryGiaKM);
                $rowGiaKM = $resultGiaKM->fetch_assoc();
                $donGia = $rowGiaKM['GiaBanSauKM'];
            } else {
                // Truy vấn giá gốc từ bảng sản phẩm
                $queryDonGia = "SELECT GiaBan FROM sanpham WHERE MaSP = '$maSP'";
                $resultDonGia = $this->db_config->execute($queryDonGia);
                $rowDonGia = $resultDonGia->fetch_assoc();
                $donGia = $rowDonGia['GiaBan'];
            }
    
            // Tính ThanhTien
            $thanhTien = $soLuong * $donGia;

            //Thêm dữ liệu vào bảng cthoadon
            $queryInsert = "INSERT INTO cthoadon (MaHD, MaSP, SoLuong, DonGia, ThanhTien, MaSize)
                            VALUES ('$maHD', '$maSP', '$soLuong', '$donGia', '$thanhTien', '$maSize')";
             $this->db_config->execute($queryInsert);
        }
    }

    //hàm xóa tất cả sản phẩm trong giỏ hàng
    
    public function deleteAll($MaTK) {
        $sql = "DELETE FROM giohang WHERE MaTK = '$MaTK'";
        $result = $this->db_config->execute($sql);
        if ($result) {
            return true;
        }
        return false;
    }

    // add to card
    public function addToCart($MaTK,$MaSP,$MaSize,$soLuong){
        $conn = $this->db_config->connect();
        $sql = "INSERT INTO giohang (MaTK, MaSP, MaSize, SoLuong) 
            VALUES (?, ?, ?, ?) ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iisi", $MaTK, $MaSP, $MaSize, $soLuong);
    
        return $stmt->execute();
        
    
    }
}
