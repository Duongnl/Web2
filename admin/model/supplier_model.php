<?php
class supplier_model
{
    private $db_config;

    public function __construct()
    {
        $this->db_config = new db_config();

    }

    function getSupplierData()
    {
        $this->db_config->connect();
        $sql = "SELECT * FROM nhacungcap WHERE TrangThai =1";
        return $this->db_config->execute($sql);
    }

    function insertSupplierData($tenNCC, $trangThai)
    {

        $this->db_config->connect();
        $sql = "INSERT INTO nhacungcap (MaNCC, TenNCC, TrangThai) VALUES (null,'$tenNCC', '$trangThai') ";
        return $this->db_config->execute($sql);

    }

    function UpdateSupplierData($maNCC, $tenNCC)
    {
        $this->db_config->connect();
        $sql = "UPDATE nhacungcap SET TenNCC = '$tenNCC' WHERE MaNCC = '$maNCC' ";
        return $this->db_config->execute($sql);
    }

    // xoa du lieu 
    function DeleteSupplierData ($maNCC, $trangThai) {
        $this->db_config->connect();
        $sql = "UPDATE nhacungcap SET TrangThai = '$trangThai' WHERE MaNCC = '$maNCC' ";
        return  $this->db_config->execute($sql);
    }

}