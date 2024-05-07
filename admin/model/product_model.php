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
    $this->db_config->connect();
    $sql = "INSERT INTO sanpham (MaAnhChinh, MaKM, MaDM, TenSP, MoTa, GiaBan, TrangThai,NgayTao,SoLuong,GioiTinh) 
        VALUES ('$maAnh', '$maKM','$maDM','$tenSP','$moTa','$giaBan',1,CURRENT_DATE,0,'$gioiTinh') ";
    return $this->db_config->execute($sql);
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

}