<?php 
class phanquyen_model {
    private $db_config ;

    public function __construct() {
        $this->db_config =  new db_config();

    }

     function getQuyenData() {
       
        $this->db_config->connect();
        $sql = "SELECT * FROM quyen";
        return $this->db_config->execute($sql);
    }

    function insertQuyenData ($tenQuyen)
    {
        $this->db_config->connect();
        $sql = "INSERT INTO  quyen (TenQuyen) VALUES ('$tenQuyen') ";
        return $this->db_config->execute($sql);
    }

    function UpdateQuyenData ($maQuyen , $tenQuyen)
    {
        $this->db_config->connect();
        $sql = "UPDATE quyen SET TenQuyen = '$tenQuyen' WHERE MaQuyen = '$maQuyen'";
        return $this->db_config->execute($sql);

    }

}