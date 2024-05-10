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
        VALUES (?, ?, ?, ?, ?, ?, 1, CURRENT_DATE, 0, ?) ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiissdi", $maAnh, $maKM, $maDM, $tenSP, $moTa, $giaBan, $gioiTinh);

    $rs = $stmt->execute();

    if ($rs != null) {
      return $conn->insert_id;
    } else {
      return -1;
    }
  }

  function getListSP()
  {
    $this->db_config->connect();
    $sql = "SELECT * from sanpham join anhchinh on sanpham.MaAnhChinh = anhchinh.MaAnhChinh 
    join danhmuc on sanpham.MaDM = danhmuc.MaDM 
    left join khuyenmai on sanpham.MaKM = khuyenmai.MaKM
     WHERE sanpham.TrangThai = 1";
    return $this->db_config->execute($sql);
  }

  function getSoLuongSP($maSP)
  {
    $this->db_config->connect();
    $sql = "select SUM(SoLuong) as SL from size where MaSP = '$maSP'";
    return $this->db_config->execute($sql);
  }

  function getSP($maSP)
  {
    $this->db_config->connect();
    $sql = "select * from sanpham where MaSP = '$maSP'";
    return $this->db_config->execute($sql);
  }

  function getSizeSP($maSP)
  {
    $this->db_config->connect();
    $sql = "select * from size where MaSP = '$maSP'";
    return $this->db_config->execute($sql);
  }

  function getMainImg($maAnhChinh)
  {
    $this->db_config->connect();
    $sql = "select * from anhchinh where MaAnhChinh = '$maAnhChinh'";
    return $this->db_config->execute($sql);
  }

  function getSubImgs($maAnhChinh)
  {
    $this->db_config->connect();
    $sql = "select * from anhphu where MaAnhChinh = '$maAnhChinh'";
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