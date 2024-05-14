<?php
class cart_model
{
    private $db_config;

    public function __construct()
    {
        $this->db_config = new db_config();
    }

}
