<?php 
    class db_config {
        private $hostname = 'localhost';
        private $username = 'root';
        private $pass ='';
        private $dbname = 'shopaoquan-new';

        private $conn = NULL;

        private $result = NULL;

        public function connect() {
            $this->conn = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);
            if (!$this->conn) {
                echo "Kết nối thất bại !";
                exit();
            } else {
                mysqli_set_charset($this->conn, 'utf8'); // khac phuc loi tieng viet
              
            } 
            return $this->conn;
        }

        public function disconnect () {
            $this->conn->close();
        }

        // thuc thi cau lenh truy van
        public function execute ($sql) {
            $this->result  = $this->conn->query($sql);
            return $this->result;
        }
    }

