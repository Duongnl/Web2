<?php 
class account_manager_model
{
    private $db_config;
    public function __construct()
    {
        $this->db_config = new db_config();
    }
    function getAccountData()
    {
        $this->db_config->connect();
        $sql = 'SELECT * FROM taikhoan';
        return  $this->db_config->execute($sql); 
    }

    function getAccountDataEnd()
    {
        $this->db_config->connect();
        $sql = 'SELECT * FROM taikhoan ORDER BY MaTK DESC LIMIT 1';
        return  $this->db_config->execute($sql); 
    }

    function insertAccountData( $tenTK, $Email, $SDT, $matKhau, $maQuyen, $trangThai)
    {
        $this->db_config->connect();
        $time = date("Y-m-d H:i:s");
        $sql = "INSERT INTO taikhoan (  TenTK, Email, SDT, MatKhau ,MaQuyen,ThoiGian ,TrangThai ) VALUES ( '$tenTK','$Email','$SDT','$matKhau', '$maQuyen', '$time','$trangThai') ";
        return  $this->db_config->execute($sql);
    }
    function updateAccountData ($maTK,$tenTK,$Email, $SDT, $matKhau, $maQuyen , $trangThai)
    {
        $this->db_config->connect();
        $sql = "UPDATE taikhoan SET TenTK = '$tenTK' , Email = '$Email',SDT ='$SDT', MatKhau = '$matKhau', MaQuyen = '$maQuyen', TrangThai = '$trangThai' WHERE MaTK = '$maTK' ";
        return $this->db_config->execute($sql);
    }



    function deleteAccountData ($maTK){
        $this->db_config->connect();
        $sql = "UPDATE taikhoan   SET TrangThai = 2 WHERE MaTK = '$maTK'";
        return $this->db_config->execute($sql);
    }
    function FilterTenTK()
    {
        $this->db_config->connect();
        $sql = "SELECT TenTK, MaTK FROM taikhoan ";
        return $this->db_config->execute($sql);
    }
    function FilterEmail()
    {
        $this->db_config->connect();
        $sql = "SELECT Email FROM taikhoan ";
        return $this->db_config->execute($sql);
    }

    function FilterSDT()
    {
        $this->db_config->connect();
        $sql = "SELECT SDT FROM taikhoan ";
        return $this->db_config->execute($sql);
    }


}

?>