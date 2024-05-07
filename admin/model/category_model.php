<?php
class category_model
{
    private $db_config;

    public function __construct()
    {
        $this->db_config = new db_config();

    }

    function getcategoryData()
    {
        $this->db_config->connect();
        $sql = "SELECT * FROM danhmuc WHERE TrangThai = 1";
        return $this->db_config->execute($sql);
    }

    function insertcategoryData($tenDM, $trangThai)
    {

        $this->db_config->connect();
        $sql = "INSERT INTO danhmuc (MaDM, TenDM, TrangThai) VALUES (null,'$tenDM', '$trangThai') ";
        return $this->db_config->execute($sql);

    }

    function UpdatecategoryData($maDM, $tenDM)
    {
        $this->db_config->connect();
        $sql = "UPDATE danhmuc SET TenDM = '$tenDM' WHERE MaDM = '$maDM' ";
        return $this->db_config->execute($sql);
    }

    // xoa du lieu 
    function DeletecategoryData($maDM)
    {
        $this->db_config->connect();
        $sql = "UPDATE danhmuc SET TrangThai = 0 WHERE MaDM = '$maDM'";
        return $this->db_config->execute($sql);
    }

}