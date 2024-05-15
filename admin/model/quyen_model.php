<?php 
class quyen_model {
    private $db_config ;

    public function __construct() {
        $this->db_config =  new db_config();

    }

     function getQuyenData() {
       
        $this->db_config->connect();
        $sql = "SELECT * FROM quyen WHERE TrangThai = 1 and MaQuyen != 1 and MaQuyen != 2" ;
        return $this->db_config->execute($sql);
    }

    function insertQuyenData ($tenQuyen,$trangthai)
    {
        $this->db_config->connect();
        $sql = "INSERT INTO  quyen (TenQuyen , TrangThai) VALUES ('$tenQuyen',1) ";
        return $this->db_config->execute($sql);
    }

    function UpdateQuyenData ($maQuyen , $tenQuyen,$trangThai)
    {
        $this->db_config->connect();
        $sql = "UPDATE quyen SET TenQuyen = '$tenQuyen' , TrangThai = '$trangThai'  WHERE MaQuyen = '$maQuyen'";
        return $this->db_config->execute($sql);

    }

    function DeleteQuyenData ($maQuyen) {
        $this->db_config->connect();
        $sql = "DELETE FROM quyen WHERE MaQuyen = '$maQuyen'";
        return  $this->db_config->execute($sql);
    }
}