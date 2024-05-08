<?php
class product_model
{
  private $db_config;

  public function __construct()
  {
    $this->db_config = new db_config();

  }
  function getProducts()
  {
    $this->db_config->connect();
    $sql = "SELECT * FROM sanpham";
    return $this->db_config->execute($sql);
  }

  function insertProduct($maAnh, $maKM, $maDM, $tenSP, $moTa, $giaBan, $gioiTinh)
  {
    $conn = $this->db_config->connect();
    $sql = "INSERT INTO sanpham (MaAnhChinh, MaKM, MaDM, TenSP, MoTa, GiaBan, TrangThai,NgayTao,SoLuong,GioiTinh) 
        VALUES ('$maAnh', '$maKM','$maDM','$tenSP','$moTa','$giaBan',1,CURRENT_DATE,0,'$gioiTinh') ";
    if ($this->db_config->execute($sql) == 1) {
      return $conn->insert_id;
    } else {
      return -1;
    }
  }

  function updateProduct($maSP, $maAnh, $maKM, $maDM, $tenSP, $moTa, $giaBan, $gioiTinh)
  {
    $this->db_config->connect();
    $sql = "UPDATE sanpham SET ";
    return $this->db_config->execute($sql);
  }

  function deleteProduct($maSP)
  {
    $this->db_config->connect();
    $sql = "UPDATE sanpham SET TrangThai = 0 WHERE MaSP = '$maSP'";
    return $this->db_config->execute($sql);
  }

  function addMainImg($url)
  {
    $conn = $this->db_config->connect();
    $sql = "INSERT INTO anhchinh (`Url`) VALUES ('$url')";
    if ($this->db_config->execute($sql) == 1) {
      return $conn->insert_id;
    }
    return -1;
  }

  function addSubImg($idMainImg, $url)
  {
    $this->db_config->connect();
    $sql = "INSERT INTO anhphu (`MaAnhChinh`,`Url`) VALUES ('$idMainImg','$url')";
    return $this->db_config->execute($sql);
  }

  function addSize($idSP, $size, $quantity)
  {
    $this->db_config->connect();
    $sql = "INSERT INTO size (`MaSP`, `MaSize`, `SoLuong`) VALUES ('$idSP','$size','$quantity')";
    return $this->db_config->execute($sql);
  }
}