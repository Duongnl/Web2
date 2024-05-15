<?php 
class ctphanquyen_model {
    private $db_config ;

    public function __construct() {
        $this->db_config =  new db_config();

    }

     function getCTphanquyenData() {
       
        $this->db_config->connect();
        $sql = "SELECT * FROM chitietquyen";
        return $this->db_config->execute($sql);
    }

    function insertCTphanquyenData ($MaCTQ , $ChiTietQuyen)
    {
        $this->db_config->connect();
        $sql = "INSERT INTO  chitietquyen (MaCTQ,ChiTietQuyen) VALUES ('$MaCTQ','$ChiTietQuyen') ";
        return $this->db_config->execute($sql);
    }

    function UpdateCTphanquyenData($maQuyen , $tenQuyen)
    {
        $this->db_config->connect();
        $sql = "UPDATE quyen SET TenQuyen = '$tenQuyen' WHERE MaQuyen = '$maQuyen'";
        return $this->db_config->execute($sql);

    }

}