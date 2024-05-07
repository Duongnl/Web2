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
    public function checkTaiKhoan($MaTK)
    {
        $this->db_config->connect();
        $sql = "SELECT * FROM khachhang WHERE  khachhang.MaTK = " . $MaTK;
        $query = $this->db_config->execute($sql);
        if (mysqli_num_rows($query) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getTaiKhoanKhachHang($MaTK)
    {
        $this->db_config->connect();
        $sql = "SELECT *, khachhang.TenKH as HoTen FROM taikhoan,khachhang, quyen WHERE taikhoan.MaTK = khachhang.MaTK AND taikhoan.MaQuyen = quyen.MaQuyen AND taikhoan.MaTK = " . $MaTK;
        return $this->db_config->execute($sql);
    }

    public function getTaiKhoanNhanVien($MaTK)
    {
        $this->db_config->connect();
        $sql = "SELECT *, nhanvien.TenNV as HoTen FROM taikhoan,nhanvien, quyen  WHERE taikhoan.MaTK = nhanvien.MaTK AND taikhoan.MaQuyen = quyen.MaQuyen AND taikhoan.MaTK = " . $MaTK;
        return $this->db_config->execute($sql);
    }

    public function updateUserInfo($user_id, $user_name, $user_phone, $user_address)
    {
        $this->db_config->connect();
        if ($this->checkTaiKhoan($user_id)) {
            // Tài khoản là khách hàng
            $sql_kh = "UPDATE khachhang INNER JOIN taikhoan ON khachhang.MaTK = taikhoan.MaTK 
                       SET khachhang.TenKH = '$user_name' , taikhoan.SDT = '$user_phone', khachhang.DiaChi = '$user_address' 
                       WHERE khachhang.MaTK = '$user_id'";
            return $this->db_config->execute($sql_kh);
        } else {
            // Tài khoản là nhân viên
            $sql_nv = "UPDATE nhanvien INNER JOIN taikhoan ON nhanvien.MaTK = taikhoan.MaTK 
                        SET nhanvien.TenNV = '$user_name', taikhoan.SDT = '$user_phone', nhanvien.DiaChi = '$user_address' 
                        WHERE nhanvien.MaTK = '$user_id'";
            return $this->db_config->execute($sql_nv);
        }
    }
    public function updateAccountInfo($user_id, $username, $email, $password, $newpassword, $cf_password)
    {
        $this->db_config->connect();
        // Kiểm tra nếu mật khẩu mới và xác nhận mật khẩu không trống
        if (!empty($newpassword) && !empty($cf_password)) {
            // Kiểm tra tính hợp lệ của mật khẩu mới
            if ($newpassword !== $cf_password) {
                return false;
            }
            // Cập nhật mật khẩu mới
            $update_password_sql = "UPDATE taikhoan SET MatKhau = '$newpassword' WHERE MaTK = '$user_id'";
            $this->db_config->execute($update_password_sql);
        }
        // Cập nhật thông tin tài khoản
        $update_account_sql = "UPDATE taikhoan SET TenTK = '$username', Email = '$email' WHERE MaTK = '$user_id'";
        $this->db_config->execute($update_account_sql);
        return true;
    }
}
