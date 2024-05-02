<?php 
class account_model
{

    private $db_config;

    public function __construct()
    {
        $this->db_config = new db_config();
    }

    public function getListTK()
    {
        $this->db_config->connect();
        $sql = "SELECT * FROM taikhoan";
        return $this->db_config->execute($sql);
    }
    public function getListKH()
    {
        $this->db_config->connect();
        $sql = "SELECT * FROM khachhang";
        return $this->db_config->execute($sql);
    }
    // public function getTaiKhoan($MaTK)
    // {
    //     $this->db_config->connect();
    //     $sql = "SELECT tk.*, q.TenQuyen 
    //         FROM taikhoan tk
    //         LEFT JOIN quyen q ON tk.MaQuyen = q.MaQuyen
    //         WHERE tk.MaTaiKhoan = '$MaTK'";
    //     return $this->db_config->execute($sql);
    // }

    public function checkTaiKhoan($MaTK)
    {
        $this->db_config->connect();
        $sql = "SELECT * FROM khachhang WHERE  khachhang.MaTK = ".$MaTK;
        $query = $this->db_config->execute($sql);
        if ( mysqli_num_rows($query) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getTaiKhoanKhachHang($MaTK)
    {
        $this->db_config->connect();
        $sql = "SELECT *, khachhang.TenKH as HoTen FROM taikhoan,khachhang, quyen WHERE taikhoan.MaTK = khachhang.MaTK AND taikhoan.MaQuyen = quyen.MaQuyen AND taikhoan.MaTK = ".$MaTK;
        return $this->db_config->execute($sql);
    }

    public function getTaiKhoanNhanVien($MaTK)
    {
        $this->db_config->connect();
        $sql = "SELECT *, nhanvien.TenNV as HoTen FROM taikhoan,nhanvien, quyen  WHERE taikhoan.MaTK = nhanvien.MaTK AND taikhoan.MaQuyen = quyen.MaQuyen AND taikhoan.MaTK = ".$MaTK;
        return $this->db_config->execute($sql);
    }

    public function updateCustomerInfo($MaTK, $TenKH, $SDT, $ThoiGian, $TenQuyen, $DiaChi) {
        $this->db_config->connect();
        $sql = "UPDATE khachhang kh
                INNER JOIN taikhoan tk ON kh.MaTK = tk.MaTK
                INNER JOIN quyen q ON tk.MaQuyen = q.MaQuyen
                SET kh.TenKhach = '$TenKH', kh.SDT = '$SDT', tk.ThoiGian = '$ThoiGian', q.TenQuyen = '$TenQuyen', kh.DiaChi = '$DiaChi'
                WHERE tk.MaTaiKhoan = '$MaTK'";
        return $this->db_config->execute($sql);
    }
    public function updateAccountInfo($MaTK, $TenTK, $Email, $MatKhau, $MatKhauConfirm) {
        // Kiểm tra xem hai trường mật khẩu mới có khớp nhau không
        if ($MatKhau != $MatKhauConfirm) {
            return false; // Trả về false nếu mật khẩu không khớp
        }
        $this->db_config->connect();
        // Nếu mật khẩu không thay đổi, sử dụng SQL để cập nhật thông tin tài khoản mà không bao gồm mật khẩu
        if ($MatKhau === '') {
            $sql = "UPDATE taikhoan SET TenTK = '$TenTK', Email = '$Email' WHERE MaTaiKhoan = '$MaTK'";
        } else {
            // Nếu mật khẩu được thay đổi, bao gồm cả mật khẩu trong câu lệnh SQL
            $hashedPassword = password_hash($MatKhau, PASSWORD_DEFAULT); // Mã hóa mật khẩu mới
            $sql = "UPDATE taikhoan SET TenTK = '$TenTK', Email = '$Email', MatKhau = '$hashedPassword' WHERE MaTaiKhoan = '$MaTK'";
        }
        return $this->db_config->execute($sql);
    }
    
    
    // public function getTenQuyenByMaQuyen($MaQuyen)
    // {
    //     $this->db_config->connect(); // Kết nối cơ sở dữ liệu
    //     // Câu lệnh truy vấn để lấy TenQuyen từ bảng quyen dựa trên MaQuyen từ bảng taikhoan
    //     $sql = "SELECT tk.*, q.TenQuyen
    //         FROM taikhoan tk
    //         LEFT JOIN quyen q ON tk.MaQuyen = q.MaQuyen
    //         WHERE tk.MaQuyen = '$MaQuyen'";
    //     // Thực thi truy vấn và trả về kết quả
    //     return $this->db_config->execute($sql);
    // }
}



