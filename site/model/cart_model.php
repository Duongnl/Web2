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
        return $this->db_config->execute($sql);
    }

    public function updateQuantity($productId, $newQuantity)
    {
        $this->db_config->connect();
        $update_quantity_sql = "UPDATE giohang SET SoLuong = '$newQuantity' WHERE MaTK = '$productId'";
        $result = $this->db_config->execute($update_quantity_sql);
        // Kiểm tra kết quả và trả về true nếu cập nhật thành công, ngược lại trả về false
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function checkQuantityAvailable($productId, $sizeId, $quantity)
    {
        $this->db_config->connect();
        // Chuẩn bị câu lệnh SQL để kiểm tra số lượng có sẵn trong bảng size
        $check_quantity_sql = "SELECT SoLuong FROM size WHERE MaSP = '$productId' AND MaSize = '$sizeId'";
        // Thực thi câu lệnh SQL
        $result = $this->db_config->execute($check_quantity_sql);
        // Kiểm tra kết quả
        if ($result) {
            // Lấy số lượng từ kết quả truy vấn
            $row = mysqli_fetch_assoc($result);
            $availableQuantity = $row['SoLuong'];
            // So sánh số lượng có sẵn với số lượng nhập
            if ($quantity <= $availableQuantity) {
                return true; // Số lượng có sẵn đủ để thêm vào giỏ hàng
            } else {
                return false; // Số lượng không đủ
            }
        } else {
            return false; // Lỗi khi truy vấn cơ sở dữ liệu
        }
    }
}
