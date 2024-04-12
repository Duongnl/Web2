<?php 
class supplier_model {
    private $db_config ;

    public function __construct() {
        $this->db_config =  new db_config();

    }

    function getSupplierData () {
       
        $this->db_config->connect();
        $sql = "SELECT * FROM nhacungcap";
        return $this->db_config->execute($sql);
    }
    
    function insertSupplierData ( $tenNCC, $trangThai) {

        $this->db_config->connect();
        $sql = "INSERT INTO nhacungcap (MaNCC, TenNCC, TrangThai) VALUES (null,'$tenNCC', '$trangThai') ";
        return  $this->db_config->execute($sql);
       
    }

}

