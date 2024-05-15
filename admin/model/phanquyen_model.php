<?php 
class phanquyen_model {
    private $db_config ;

    public function __construct() {
        $this->db_config =  new db_config();

    }

    function getQuyenTheoMaTK($MaTK)
    {
        $this->db_config->connect();
        $sql = "SELECT * FROM taikhoan,phanquyen, chitietquyen WHERE taikhoan.MaQuyen = phanquyen.MaQuyen AND phanquyen.MaCTQ = chitietquyen.MaCTQ AND taikhoan.MaTK = '$MaTK'";
        return $this->db_config->execute($sql);
        
    }

    function getCTQuyen()
    {
        $this->db_config->connect();
        $sql = "SELECT ChiTietQuyen FROM chitietquyen ";
        return $this->db_config->execute($sql);
    }

     function getPhanQuyenData() {
       
        $this->db_config->connect();
        $sql = "SELECT * FROM phanquyen, chitietquyen WHERE phanquyen.MaCTQ = chitietquyen.MaCTQ";
        return $this->db_config->execute($sql);
    }

    function checked ($MaQuyen, $MaCTQ)
    {
        $this->db_config->connect();
        $sql = "SELECT * FROM phanquyen  WHERE  phanquyen.MaQuyen = '$MaQuyen' and phanquyen.MaCTQ ='$MaCTQ' ";
        $query = $this->db_config->execute($sql);
   
        while ($row = mysqli_fetch_array($query)) 
        {
            return true;
        }
        return false;
    }


    function insertPhanQuyenData ($MaQuyen , $MaCTQ)
    {
        $this->db_config->connect();
        $sql = "INSERT INTO  phanquyen (MaQuyen , MaCTQ ) VALUES ('$MaQuyen','$MaCTQ') ";
        return $this->db_config->execute($sql);
    }

    function deleteAllPhanQuyen($maQuyen) {
        $this->db_config->connect();
        $sql = "DELETE  FROM phanquyen WHERE  MaQuyen = '$maQuyen'";
        return $this->db_config->execute($sql);
    }

    // function UpdateQuyenData ($MaQuyen , $MaCTQ)
    // {
    //     $this->db_config->connect();
    //     $sql = "UPDATE phanquyen SET TenQuyen = '$tenQuyen' WHERE MaQuyen = '$maQuyen'";
    //     return $this->db_config->execute($sql);

    // }

    function checkQuyenUser ($maTK) {
        $this->db_config->connect();
        $sql = "SELECT * FROM taikhoan,phanquyen WHERE taikhoan.MaQuyen = phanquyen.MaQuyen AND taikhoan.MaTK =".$maTK." AND phanquyen.MaCTQ = 11 ";
        $query = $this->db_config->execute($sql);
   
        while ($row = mysqli_fetch_array($query)) 
        {
            return true;
        }
        return false;
    }

    function checkQuyenAdmin ($maTK) {
        $this->db_config->connect();
        $sql = "SELECT * FROM taikhoan,phanquyen WHERE taikhoan.MaQuyen = phanquyen.MaQuyen AND taikhoan.MaTK =".$maTK." ";
        $query = $this->db_config->execute($sql);
        $i =0;
        while ($row = mysqli_fetch_array($query)) 
        {
            $i+=1;
        }
        if ($i>1) {
            return true;
        } else {
            return false;
        }
    }

}