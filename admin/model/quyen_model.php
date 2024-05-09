<?php 
class quyen_model {
    private $db_config ;

    public function __construct() {
        $this->db_config =  new db_config();

    }

     function getQuyenData() {
       
        $this->db_config->connect();
        $sql = "SELECT * FROM quyen";
        return $this->db_config->execute($sql);
    }
}